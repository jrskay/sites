<?php

class Ellipse extends Circle {

	public $ry;

	public function __construct($x, $y, $rx, $ry, $fill, $opacity)
	{
		parent::__construct($x, $y, $rx, '', $fill, $opacity);
		$this->ry = $ry;

	}


}


?>
