<?php
namespace Maalls;

class LogisticMap {

	public $step;
	public $rMin;
	public $rEnd;
	public $filename;

	public function __construct($rMin = 2, $rMax = 4, $xMin = null, $xMax = null, $step = null)
	{

		$this->imageWidth = 1000;
		$this->imageHeight = 1000;

		$this->xMin = $xMin;
		$this->xMax = $xMax;



		

		
		if(!$step) {

			$range = $rMax - $rMin;
			$this->step = $range / $this->imageWidth;

		}
		else {
			$this->step = $step;
		}
		$this->rMin = $rMin;
		$this->rMax = $rMax;

	}
	public function generate()
	{

		$path = __DIR__ . '/../public/data/logistic_maps_' . $this->rMin . '-' . $this->xMin . '-' . $this->step . '.jpg' ;

		$this->filename = $path; 

		

		$width = 220;
		$r = $this->rMin;
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

		$max = 50000;
		/*$scale = 14;
		bcscale($scale);*/
		do {

			//echo 'r ' . $r . PHP_EOL;
			$x = '0.2';
			$asymptoticValues = [];
			for($i = 0; $i < $max; $i++) {
				
				/*$x = bcmul($r, bcmul($x, bcsub('1', $x)));
				$minX = bccomp($x, $minX) > 0 ? $minX : $x;
				$maxX = bccomp($x, $maxX) > 0 ? $x : $maxX;*/
				$x = $r * $x * (1 - $x);
				$minX = min($x, $minX);
				$maxX = max($x, $maxX);

				if($maxX == 0) exit;

				if($i > 48000) {

					if(!in_array($x, $asymptoticValues)) {
						$asymptoticValues[] = $x;
					}

				}

			}

			$logisticMap[] = [$r, $asymptoticValues];
			$r += $this->step;

		}
		while($r <= $this->rMax);

		if(!$this->xMin && !$this->xMax) {
		
			$this->xMin = $minX;
			$this->xMax = $maxX;
		
		}
		

		$gd = imagecreatetruecolor($this->imageWidth, $this->imageHeight);
		$red = imagecolorallocate($gd, 255, 0, 0); 
		$white = imagecolorallocate($gd, 255, 255, 255);
		imagefill($gd, 0, 0, $white);
		
		$xRange = $this->xMax - $this->xMin;
		$heightPixelRatio = floor($this->imageHeight / $xRange);

		foreach($logisticMap as $i => $x) {

			foreach($x[1] as $x) {

				imagesetpixel($gd, $i, round($this->imageHeight - ($x - $this->xMin) * $heightPixelRatio), $red);


			}

		}

		

		imagejpeg($gd, $path);

		$this->filename = $path;
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