<?php

namespace App\Http\Interfaces;

interface Files
{

    /**
     * @param $upload
     * @return mixed
     */
    public static function saveInFolder($upload);

    /**
     * @param string $upload
     * @param string $currentPath
     * @return mixed
     */
    public static function changeCurrentFile(string $upload, string $currentPath);

    /**
     * @param string $path
     * @return mixed
     */
    public static function removeRecord(string $path);
}