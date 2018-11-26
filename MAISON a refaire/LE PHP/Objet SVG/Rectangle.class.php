<?php

class Rectangle extends Shape {

	public $width;
	public $height;



  public function __construct($x, $y,$width, $height, $fill, $opacity)
{

      parent::__construct($x, $y, $fill, $opacity);

		$this->width = $width;
		$this->height = $height ;


	}


	public function setSize($width, $height) {
		$this->width = $width;
		$this->height = $height ;
	}



}



?>
