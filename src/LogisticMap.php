<?php
namespace Maalls;

class LogisticMap {


	public function generate($rStart = 2, $rMax = 4, $step = 0.01)
	{

		$width = 220;
		$height = 700;

		$max = 200;



		$r = $rStart;
		$logisticMap = [];

		
		//$dir = __DIR__ . '/../data/mapsv2' ;


		//$this->deleteDirectory($dir);
		//mkdir($dir);


		$yScale = 500;
		$xScale = 1;

		$frames = [];
		$durations = [];

		$minX = 100000000;
		$maxX = 0;

		do {

			$x = 0.2;
			$asymptoticValues = [];
			for($i = 0; $i < $max; $i++) {


				$x = $r * $x * (1 - $x);
				$minX = min($x, $minX);
				$maxX = max($x, $maxX);

				if($i > 100) {

					if(!in_array($x, $asymptoticValues)) {
						$asymptoticValues[] = $x;
					}

				}

			}

			$logisticMap[] = [$r, $asymptoticValues];
			$r += $step;

		}
		while($r <= $rMax);

		$gd = imagecreatetruecolor(($rMax - $rStart) / $step, $height);
		$red = imagecolorallocate($gd, 255, 0, 0); 
		$white = imagecolorallocate($gd, 255, 255, 255);
		imagefill($gd, 0, 0, $white);
		$xRange = $maxX - $minX;
		$heightPixelRatio = floor($height / $xRange);

		foreach($logisticMap as $i => $x) {

			foreach($x[1] as $x) {

				imagesetpixel($gd, $i, round($height - ($x - $minX) * $heightPixelRatio), $red);


			}

		}

		$path = __DIR__ . '/../data/logistic_maps_' . $rStart . '-' . $rMax . '-' . $step . '.jpg' ;

		imagejpeg($gd, $path);

		return $path;

	}

	function deleteDirectory($dir) {
	    if (!file_exists($dir)) {
	        return true;
	    }

	    if (!is_dir($dir)) {
	        return unlink($dir);
	    }

	    foreach (scandir($dir) as $item) {
	        if ($item == '.' || $item == '..') {
	            continue;
	        }

	        if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
	            return false;
	        }

	    }

	    return rmdir($dir);
	}


}