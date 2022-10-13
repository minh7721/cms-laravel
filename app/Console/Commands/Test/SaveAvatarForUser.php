<?php

namespace App\Console\Commands\Test;

use App\Libs\DiskPathInfo;
use App\Libs\IdToPath;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class SaveAvatarForUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:save_avatar';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::first();

        $image_content = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get("https://laravelnews.imgix.net/images/laravel9-1645586911.jpg")
            ->getBody()->getContents();


        $this->updateOrCreateAvatar($user, $image_content);

        dd($user->avatar->url());

        return Command::SUCCESS;
    }

    /**
     * @param User $user
     * @param array|string $content
     * @param bool $force
     *
     * @return bool
     */
    protected function updateOrCreateAvatar(User $user, array|string $content, bool $force = true) {
        if (!empty($user->avatar)) {
            if (!$force) return true;
            $path_info = $user->avatar;
            $new_file = false;
        } else {
            $disk = 'public'; //sử dụng config
            $path = 'users/' . IdToPath::makePathFromDate($user->id, 'jpg');
            $path_info = new DiskPathInfo($disk, $path);
            $new_file = true;
        }

        $content = is_array($content) ? json_encode($content) : $content;
        if ($path_info->put($content)) {
            if ($new_file) {
                $user->avatar = $path_info;
                return $user->save();
            }
            return true;
        } else {
            \Log::error("Can't not update Avatar for user [$user->id] : ");
            return false;
        }
    }
}
