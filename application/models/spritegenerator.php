<?php

/**
* Class: SpriteGenerator
*	Purpose: For generating a CSS sprite according to specific options
*/
class SpriteGenerator extends CI_Model {
	
	/**
	* Path to look for images in
	*
	* @var string
	*/
	protected $path;
	
	/**
	* An array of paths to images to combine into a CSS sprite
	*	
	* @var array
	*/
	protected $images = array();
	
	/**
	* The path to output the resulting sprite to (including filename)
	*
	* @var string
	*/
	protected $output_path;
	
	/**
	* The format to output the resulting CSS sprite in 
	*	(i.e. png, gif, etc)
	*
	* @var string
	*/
	protected $output_format;
	
	/**
	* The style (or orientation) to output the CSS sprite in 
	*	(i.e. vertical or horizontal)
	*
	* @var string
	*/
	protected $style;
	
	/**
	* The # of spaces between images (i.e. 3)
	*
	* @var int
	*/
	protected $spacing;
	
	/**
	* Width Constraint of the resulting sprite
	*	min - use image with smallest width
	*	max - use image with largest width
	*
	* @var string 
	*/
	protected $constraint_width = 'max';
	
	/**
	* Height constraint of the resulting sprite
	* 	min - use image with smallest height
	*	max - use image with largest height
	*
	* @var string
	*/
	protected $constraint_height = 'max';
	
	/**
	* An array containing errors when generating the sprite
	*
	* @var array
	*/
	protected $errors = array();
	
	/**
	* Constructor
	*/
	public function __construct() {
		parent::__construct();
	}
	
	/**
	* Initialize Sprite Generator
	*
	*	@param string path
	*	@param string output_path
	*	@param string output_format
	*	@param string style
	*	@param string spacing
	*/
	public function init($path, $output_path, $output_format = 'png', $style = 'vertical', $spacing = 2) {
		$this->path = $path;
		$this->images = $this->readFiles($path, array(), 'gif,jpg,png');
		$this->images = $this->getImageInfo($this->images);
		$this->output_path = $output_path;
		$this->output_format = $output_format;
		$this->style = $style;
		$this->spacing = $spacing;
	}
	
	/**
	* Method: readFiles
	*	Purpose: Recursively read files in a directory
	*
	* @param $root - the Root Directory Path
	* @param $array - an array containing the currently read files
	* @param $filter - filter files of type (i.e. '.gif,.css' - only finds
	*		GIF or CSS files)
	* @param $not_these - an array of file names that should not be read
	*
	* @return an array of files
	*/
	public function readFiles($root, $array = array(), $filter = null, $not_these = array()) {
		if (! is_array($filter) && ! is_null($filter)) $filter = explode(',', $filter);
		
		if ($handle = opendir($root)) {
			while(false !== ($file = readdir($handle))) {
				if ($file == "." || $file == "..") continue;
				if (! is_dir($root . '/' . $file)) {
					$ext = $this->getFileExt($file);
					
					if ($filter) {
						if (! in_array($ext, $filter)) continue;
					}
					
					if (! in_array($file, $not_these)) {
						array_push($array ,$root . '/' . $file);
					}
				}
			}
		}
		
		return $array;
	}
	
	/**
	* Method: generator
	*	Generates a CSS sprite
	*/
	public function generate() {
		if (count($this->images) == 0) {
			return array();	
		}
		//get min/max/total width/height dimensions
		$dims = $this->getDimensions();
		
		$width = $dims[$this->constraint_width]['width'];
		$height = $dims[$this->constraint_height]['height'];
 
		//create empty image with appropriate dimensions		
		if ($this->style == 'vertical') {
			$sprite = imagecreatetruecolor($width, $dims['total']['height']);
			$sort_by = 'width';
		} else {
			$sprite = imagecreatetruecolor($dims['total']['width'], $height);
			$sort_by = 'height';
		}
		
		//sort images according to style (orientation)
		$images = $this->sortImages($sort_by);
		
		//make the background transparent
		$bg = imagecolorallocatealpha($sprite, 255, 255, 255, 127);
		imagefill($sprite, 0, 0, $bg);
		
		$width_so_far = 0;
		$height_so_far = 0;
		
		//make the sprite
		for($i = 0; $i < count($images); $i++) {
			$img = $images[$i];
			
			if ($this->style == 'vertical') {
				$images[$i]['x'] = 0;
				$images[$i]['y'] = ($height_so_far == 0) ? "0" : "-$height_so_far";
				
				imagecopy($sprite, $img['src'], 0, $height_so_far, 0, 0, $img['width'], $img['height']);
				$height_so_far += $img['height'] + $this->spacing;
			} else {
				$new_images[$i]['x'] = ($width_so_far == 0) ? "0" : "-$width_so_far";
				$new_images[$i]['y'] = 0;
			
				imagecopy($sprite, $img['src'], $width_so_far, 0, 0, 0, $img['width'], $img['height']);
				$width_so_far += $img['width'] + $this->spacing;
			}
		}
		
		imagealphablending($sprite, false);
		imagesavealpha($sprite, true);
		
		//output sprite
		$func = 'image' . $this->output_format;
		$func($sprite, $this->output_path . '.' . $this->output_format);
		
		return $images;
	}
	
	/**
	* Method: getDimensions
	*	Retrieves the min/max/total width/height dimensions
	*
	*	@return array containing the dimensions
	*/
	private function getDimensions() {
		$total_width = 0;
		$total_height = 0;
		$max_width = 0;
		$min_width = 0;
		$max_height = 0;
		$min_height = 0;
		
		foreach($this->images as $image) {
			$total_width += $image['width'] + $this->spacing;
			$total_height += $image['height'] + $this->spacing;
			$max_width = ($image['width'] >= $max_width) ? $image['width'] : $max_width;
			$min_width = ($image['width'] <= $min_width) ? $image['width'] : $min_width;
			$max_height = ($image['height'] >= $max_height) ? $image['height'] : $max_height;
			$min_height = ($image['height'] <= $min_height) ? $image['height'] : $min_height;
		}
		
		$dims = array();
		$dims['total']['width'] = $total_width;
		$dims['total']['height'] = $total_height;
		$dims['max']['width'] = $max_width;
		$dims['max']['height'] = $max_height;
		$dims['min']['width'] = $min_width;
		$dims['min']['height'] = $min_height;
		
		return $dims;
	}
	
	/**
	* Method: getImageInfo
	*	Returns information about each image in the $images array
	*	
	*	@param array images - an array of paths to images
	*	
	*	@return an array containing image information
	*/
	private function getImageInfo($images) {
		$info = array();
		
		for($i = 0; $i < count($images); $i++) {
			$path = $images[$i];
			$size = getimagesize($path);
			$type = $this->getFileExt($path);
			$width = $size[0];
			$height = $size[1];
			$func = ($type === 'jpg') ? 'imagecreatefromjpeg' : "imagecreatefrom$type";
			
			if (! function_exists($func)) {
				array_push($this->errors, basename($path) . ': unrecognized image type, image not included.');
				continue;
			}
			
			$info[$i]['path'] = $path;
			$info[$i]['size'] = $size;
			$info[$i]['type'] = $type;
			$info[$i]['width'] = $width;
			$info[$i]['height'] = $height;
			$info[$i]['src'] = $func($path);
			$info[$i]['name'] = str_replace(".$type", "", basename($path));
			$info[$i]['ext'] = $type;
		}
		
		return $info;
	}
	
	/**
	* Method: getFileExt
	*
	*	@param string filename (or path) - the filename
	*
	*	@return the extension of the specified filename
	*/
	private function getFileExt($filename) {
		return end(explode('.', $filename));
	}
	
	/**
	* Method: setConstraints
	*	Sets the resulting sprite's max width to the width of the smallest
	*		image (by width)
	*	Sets the resulting sprite's max height to the height of the largest 
	*		image (in height)
	*
	* @param string width - use either 'max' or 'min'
	* @param string height - use either 'max' or 'min'
	*/
	public function setConstraints($width = 'max', $height = 'max') {
		$this->constrain_width = $width;
		$this->constrain_height = $height;
	}
	
	/**
	* Method: sortImages
	*	To sort the images array by width or height
	*
	* @param string sort_by - either 'width' or 'height'
	* 
	* @return the images array sorted by either 'width' or 'height'
	*/
	private function sortImages($sort_by = 'width') {
		$images = $this->images;
		$new_images = array();
		
		for($i = 0; $i < count($images); $i++) {
			for($j = 0; $j < count($new_images); $j++) {
				if ($images[$i][$sort_by] >= $new_images[$j][$sort_by]) {
					//insert before $j
					$front = array_slice($new_images, 0, $j);
					$back = array_splice($new_images, $j);
					$new_images = array_merge($front, array($images[$i]), $back);
					continue 2;
				}
			}
			
			//tack image onto the end
			array_push($new_images, $images[$i]);
		}
		
		return $new_images;
	}
}
