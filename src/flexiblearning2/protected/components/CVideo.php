<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CVideo
 *
 * @author haidang
 */
class CVideo {

    //put your code here
    public function convertVideo($fileName) {
        $outputFile = $this->convert_to_flv($fileName);
        if (strtolower($fileName) != strtolower($outputFile)) {
            unlink($fileName);
        }
        return $outputFile;
    }

    public function convert_to_flv($videoFile) {
        if (file_exists($videoFile)) {
            $ext = substr($videoFile, strrpos($videoFile, '.') + 1);
            if (strtolower($ext) != 'flv') {
                $fileNameWithoutExt = substr($videoFile, 0, strrpos($videoFile, "."));
                $outputFile = $fileNameWithoutExt . '.flv';

                $i = 0;
                while (file_exists($outputFile)) {
                    $outputFile = $fileNameWithoutExt . $i . '.flv';
                }
                $strCmd = sprintf(Yii::app()->params['convert_command'], $videoFile, $outputFile);
                exec($strCmd);
                return $outputFile;
            } else {
                return $videoFile;
            }
        } else {
            return FALSE;
        }
    }

    function create_thumbnail($videoFile, $width, $height, $thumbnailPath) {
        if (file_exists($videoFile)) {
            $fileNameWithoutExt = substr($videoFile, 0, strrpos($videoFile, "."));
            $outputFile = $thumbnailPath . substr($fileNameWithoutExt, strrpos($videoFile, "/")) . '.jpg';
            $strCmd = sprintf(Yii::app()->params['create_thumbnail_command'], $videoFile, $width, $height, $outputFile);
            exec($strCmd);

            return $outputFile;
        } else {
            return FALSE;
        }
    }
}
?>