<?php 

/**
 * Class mergeImages.
 *
 * @license MIT
 * @package cabenitez\mergeImages
 * @author  Carlos Alberto Benitez <cabenitez83@gmail.com>
 *
 * @method  process(Array $images, Boolean $show, Boolean $save, String $path, String $filename);
 * @method  setItems(Array $images);
 * @method  getItems();
 * @method  mergeItems();
 * @method  saveImage(String $path, String $filename);
 * @method  showImage();
 */

class MergeImages
{
	
	var $top_width;
	var $top_height;
	var $final_width;
	var $final_height;
	var $files;
	var $base_image;
	var $base_path;
	var $base_filename;

	function __construct()
	{
		$this->top_width = 0;
		$this->top_height = 0;
		$this->final_width = 0;
		$this->final_height = 0;
		$this->files = [];
		$this->base_image = '';
		$this->base_path = './';
		$this->base_filename = 'merged_image.png';

	}
	
	public function process($images = [], $show = false, $save = false, $path = null, $filename = null)
	{
		// set Items
		$this->setItems($images);

		// merge Items
		$this->mergeItems();

		// save merged image
		if($save){
			$this->saveImage($path, $filename);
		}

		// show merged image
		if($show){
			$this->showImage();
		}
		
	}

	// add images
	public function setItems($images = [])
	{
		if (count($images)) {

			$this->files = $images;
			
		}else{

			throw new InvalidArgumentException('Missing files');
		}
	}

	// return images
	public function getItems()
	{
		
		return $this->files;
			
	}

	// merge images
	public function mergeItems()
	{

		if (count($this->files)) {

			// 
			foreach ($this->files as $image) {

				// get current width/height
				list($width, $height) = getimagesizefromstring(file_get_contents($image));

				// compute new width/height
				$this->final_width = ($width > $this->final_width) ? $width : $this->final_width;
				$this->final_height = $height + $this->final_height;

				// create new image and merge
				$this->base_image = imagecreatetruecolor($this->final_width, $this->final_height);

				// Fill the image with transparent color 
				$color = imagecolorallocatealpha($this->base_image, 0, 0, 0, 127); //fill transparent back
				imagefill($this->base_image, 0, 0, $color);
				imagesavealpha($this->base_image, true);

			}

			foreach ($this->files as $image) {

				// create image
				// $current_image = imagecreatefromjpeg($image);
				$current_image = imagecreatefromstring(file_get_contents($image));

				// get current width/height
				list($width, $height) = getimagesizefromstring(file_get_contents($image));

				// copy image
				imagecopy($this->base_image, $current_image, 0, $this->top_height, 0, 0, $width, $height);

				$this->top_height = $this->top_height + $height;
				// $top_width = $width;
			
			}
		
		}else{

			throw new InvalidArgumentException('Missing files, First add Items');
		}			
	}

	// save image to file
	public function saveImage($path = null, $filename = null)
	{
		$path 	  = is_null($path) ? $this->base_path : $path;
		$filename = is_null($filename) ? $this->base_filename : $filename.'.png';
		
		if ($path != '.' && $path != '..') {

			if (!is_dir($path)) {
			    mkdir($path, 0777, true);
			}

			imagepng($this->base_image, $path .'/'. $filename);
		
		}else{

			throw new InvalidArgumentException('Incorrect path');
		}			
	}

	// show image to browser
	public function showImage()
	{
		header("Content-Type: image/png");
		imagepng($this->base_image);
	}

}