<?php
// abstract class est une class qui peut que etre hérité donc cela empeche de vouloir instancier
abstract class Shape {

	public $x;
    public $y;
    public $fill;
    public $opacity;


     public function __construct($x, $y, $fill, $opacity)
	{
    $this->x = $x;
		$this->y = $y;
    $this->fill = $fill;
		$this->opacity = $opacity;
    }


    public function setPosition($x, $y) {
		$this->x = $x;
		$this->x = $x;
	}

	public function setColor($fill) {
		$this->fill = $fill;
	}

}



?>
