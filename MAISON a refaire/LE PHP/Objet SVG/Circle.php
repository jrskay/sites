<?php

class Circle extends Shape {

	public $r;
	public $height;

	public function __construct($x, $y, $r, $height, $fill, $opacity)
	{
		parent::__construct($x, $y, $fill, $opacity);

        $this->r = $r;
		    $this->height = $height ;

	}
}



?>
