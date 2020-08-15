<?php

/*
 *  Загрузка, обновление, удаление файлов с диска
 * */

namespace App\Http\classes;

use App\Http\Interfaces\Files;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class Images implements Files
{
    const DIR_IMAGE = 'images';
    const CUR_DISK = 'public';

    /**
     * @param $upload
     * @return mixed
     */
    public static function saveInFolder($upload)
    {
        $path = Storage::disk(self::CUR_DISK)->putFile(self::DIR_IMAGE, new File($upload->path()));
        return Storage::url($path);
    }

    /**
     * @param string $upload
     * @param string $currentPath
     * @return mixed
     */
    public static function changeCurrentFile(string $upload, string $currentPath)
    {
        if(!empty($currentPath)) {
            
            $pathDir = Storage::disk(self::CUR_DISK)->files(self::DIR_IMAGE);
            foreach($pathDir as $item) {
                if(strpos($currentPath, $item) !== false) {
                    $name = str_replace(self::DIR_IMAGE . "/", '', $item);
                }
            }

            $path = Storage::disk(self::CUR_DISK)->putFileAs(self::DIR_IMAGE, new File($upload->path()), $name);
            return Storage::url($path);
        }

        return self::saveInFolder($upload);
    }

    /**
     * @param string $path
     * @return bool|mixed
     */
    public static function removeRecord(string $path)
    {
        $name = '';

        $pathDir = Storage::disk(self::CUR_DISK)->files(self::DIR_IMAGE);
        foreach($pathDir as $item) {
            if(strpos($path, $item) !== false) {
                $name = $item;
            }
        }

        return Storage::disk(self::CUR_DISK)->delete($name);
    }
}