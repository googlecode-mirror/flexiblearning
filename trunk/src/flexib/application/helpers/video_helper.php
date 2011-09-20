<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('convert_to_flv')) {
	function convert_to_flv($videoFile) {
		if (file_exists($videoFile)) {
			$ext = substr($videoFile, strrpos($videoFile, '.') + 1);
			if (strtolower($ext) != 'flv') {
				$fileNameWithoutExt = substr($videoFile, 0, strrpos($videoFile, "."));
				$outputFile = $fileNameWithoutExt . '.flv';
				
				$i = 0;
				while (file_exists($outputFile)) {
					$outputFile = $fileNameWithoutExt . $i . '.flv';	
				}
				$CI =& get_instance();
				$strCmd = sprintf(BASEPATH . $CI->config->item('convert_command'), $videoFile, $outputFile);
				exec($strCmd);
				
				return $outputFile;
			} else {
				return $videoFile;
			}
		} else {
			return FALSE;
		}
	}
}

if ( ! function_exists('create_thumbnail')) {
	function create_thumbnail($videoFile, $width, $height, $thumbnailPath) {
		if (file_exists($videoFile)) {
			$fileNameWithoutExt = substr($videoFile, 0, strrpos($videoFile, "."));
			$outputFile = $thumbnailPath . substr($fileNameWithoutExt, strrpos($videoFile, "/")) . '.jpg';
			$CI =& get_instance();
			$strCmd = sprintf(BASEPATH . $CI->config->item('create_thumbnail_command'), 
				$videoFile, $width, $height, $outputFile);
			exec($strCmd);

			return $outputFile;
		} else {
			return FALSE;
		}
	}
}