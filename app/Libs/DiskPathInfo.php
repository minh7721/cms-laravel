<?php
namespace App\Libs;

use Illuminate\Support\Arr;
use InvalidArgumentException;
use Storage;

class DiskPathInfo {
    
    public const INFO_SEPARATE = ':';
    public const ARRAY_SEPARATE = ',';
    
    /** @var array */
    protected $disks = [];
    
    /** @var string */
    protected $path;
    
    /** @var int */
    protected $size = 0;
    
    /** @var array */
    protected $other_info = [];
    
    /** @var array */
    protected $disks_priority = [];
    
    /**
     * @param string $string
     *
     * @return DiskPathInfo
     */
    public static function parse(string $string)
    {
        if (!str_contains($string, self::INFO_SEPARATE)) {
            throw new InvalidArgumentException("Can't parse '$string' to " . DiskPathInfo::class);
        }
        $options = [];
        $infos = explode( self::INFO_SEPARATE, $string);
        
        $disks = explode( self::ARRAY_SEPARATE, array_shift($infos) );
        $path  = array_shift( $infos );
        $size  = intval(array_shift( $infos ));
        
        return new DiskPathInfo( $disks, $path, $size, $options);
    }
    
    /**
     * DiskPathInfo constructor.
     * @param array|string $disks
     * @param string $path
     * @param int $size
     * @param array $other_info
     */
    public function __construct(array|string $disks, string $path, int $size = 0, array $other_info = [] )
    {
        if (!$disks) throw new InvalidArgumentException('No disk');
        
        if(!is_array( $disks )) {
            $disks = explode(self::ARRAY_SEPARATE, (string) $disks);
        }
        
        $this->disks = $disks;
        $this->path  = $path;
        $this->size  = $size;
        
        $this->info($other_info);
    }
    
    /**
     * Get or Set info
     * @param null $key
     * @param null $value
     *
     * @return array|void
     */
    public function info($key = null, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->info($k, $v);
            }
        } elseif ($key == null) {
            return $this->other_info;
        } elseif ($value !== null) {
            return Arr::get($this->other_info, $key);
        } else {
            Arr::set($this->other_info, $key, $value);
        }
    }
    
    public function url() {
        return Storage::disk($this->bestDisk())
            ->url($this->path());
    }

    /**
     * @param \DateTimeInterface|null $expiration
     * @param array $options
     *
     * @return string
     */
    public function tempUrl(\DateTimeInterface $expiration = null, array $options = []) {
        if(!$expiration) {
            $expiration = now()->addMinutes(10);
        }
        return Storage::disk($this->bestDisk())
            ->temporaryUrl($this->path(), $expiration, $options);
    }
    
    /**
     * Get disks
     * @return mixed
     */
    public function disks(): array
    {
        return $this->disks;
    }
    
    /**
     * Get the best disk name
     * @return mixed
     */
    public function bestDisk(): string
    {
        return $this->disks()[0];
    }
    
    /**
     * Check has disks
     * @param mixed ...$disks
     * @return bool
     */
    public function hasDisk(...$disks): bool
    {
        foreach ($disks as $disk) {
            if (!in_array($disk, $this->disks))
                return false;
        }
        return true;
    }
    
    /**
     * @param array $disks
     * @param bool $check
     * @param bool $replace
     *
     * @return $this
     */
    public function addDisks(array $disks, bool $check = false, bool $replace = false): DiskPathInfo
    {
        if ($replace) {
            $this->disks = [];
        }
        
        if ($check) {
            foreach ($disks as $disk) {
                if (!$this->hasDisk($disk)
                    && Storage::disk($disk)->exists($this->path)) {
                    $this->disks[] = $disk;
                }
            }
        } else {
            $this->disks = array_merge($this->disks, $disks);
        }
        return $this;
    }

    public function setDisks(...$disks) {
        if (is_array($disks[0])) {
            $this->disks = $disks[0];
        } else {
            $this->disks = $disks;
        }
    }
    
    /**
     * Get path
     * @return string
     */
    public function path(): string
    {
        return $this->path;
    }
    
    /**
     * Get the contents of a file.
     * @param bool $stream
     *
     * @return resource|string|null
     */
    public function file(bool $stream = false)
    {
        if ($stream) {
            return Storage::disk($this->bestDisk())->readStream($this->path);
        }
        return Storage::disk($this->bestDisk())->get($this->path);
    }
    
    /**
     * Read content
     * @param bool $steam
     *
     * @return resource|string|null
     */
    public function read(bool $steam = false) {
        
        return $this->file($steam);
    }
    
    /**
     * Write the contents of a file.
     * @param string $contents
     * @param mixed $options
     * @return bool
     */
    public function put(string $contents, mixed $options = [])
    {
        $saved = Storage::disk($this->bestDisk())->put($this->path, $contents, $options);
        if (!$saved) return false;
        
        $this->size(true);
        return true;
    }
    
    /**
     * Delete the file
     *
     * @return bool
     */
    public function delete()
    {
        return Storage::disk($this->bestDisk())->delete($this->path);
    }
    
    /**
     * Determine if a file exists.
     *
     * @return bool
     */
    public function exists()
    {
        return Storage::disk($this->bestDisk())->exists($this->path);
    }
    
    /**
     * Get size
     *
     * @param bool $force
     *
     * @return int|null
     */
    public function size(bool $force = false): ?int
    {
        if (!$this->size || $force) {
            $this->size = Storage::disk($this->bestDisk())->size($this->path);
        }
        return $this->size;
    }
    
    public function __toString()
    {
        $data['disks'] = implode(self::ARRAY_SEPARATE, $this->disks);
        $data['path'] = $this->path;
        $data['size'] = $this->size;
        
        return implode(self::INFO_SEPARATE, $data);
    }
    
}