<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 2019-10-10
 * Time: 03:40
 *
 * Example dir structure
 *
 * 000/000/1.ext
 * 000/000/2.ext
 * 000/001/1230.ext
 * 000/099/99230.ext
 * 002/134/2134256.ext
 * 1232/134/1232134256.ext
 * 21342562/134/21342562134256.ext
 *
 */

namespace App\Libs;


use Symfony\Component\Finder\Finder;

class IdToPath {
    
    protected const MAX_DIR_DEPTH = 2;
    
    public static function make(int $id, $ext = 'ext'){
        $multiplier = ( self::MAX_DIR_DEPTH + 1 ) * 3 - strlen( (string) $id );
        if($multiplier >= 0){
            $full = str_repeat( "0", $multiplier) . $id;
        }else{
            $full = (string)$id;
        }
        $full = substr( $full, 0, -3);
        $path_partials = [];
        for($i = 1; $i < self::MAX_DIR_DEPTH; $i++){
            $path_partials[] = substr( $full, -3*$i, 3);
        }
        $path_partials[] = substr( $full, 0, strlen( $full ) - 3*(self::MAX_DIR_DEPTH-1) );
        $path_partials = array_reverse( $path_partials );
        return implode( "/", $path_partials ) . "/" . $id . ($ext ? "." . $ext : "");
    }
    
    public static function maxId($root, $depth = self::MAX_DIR_DEPTH){
        $finder = new Finder();
        $finder->depth('<1')->sortByName()->reverseSorting();
        if($depth == 0){
            $finder->files()->in( $root );
        }else{
            $finder->directories()->in( $root );
        }
        /** @var \SplFileInfo $directory */
        foreach ($finder->getIterator() as $directory){
            if($depth == 0){
                return intval( $directory->getBasename() );
            }
            $max_id_in_sub_dir = self::maxId( $directory->getPathname(), $depth - 1);
            if($max_id_in_sub_dir > 0){
                return $max_id_in_sub_dir;
            }
        }
        if($depth == 0){
            return false;
        }else{
            return 0;
        }
    }

    public static function makePathFromDate(int $id, $ext = 'ext') {
        $now = now()->toArray();

        $path_partials = [
            $now['year'] . '_' . $now['month'],
            $now['day'],
        ];

        return implode( "/", $path_partials ) . "/" . $id . ($ext ? "." . $ext : "");
    }
    
}