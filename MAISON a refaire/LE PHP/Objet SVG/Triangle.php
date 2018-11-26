<?php

class Triangle extends Shape {
// methode avec 3 variables ou on peut mettre ça dans un tableau
// methode tableau
	public $point;
// methode 3 variables
	public $fill;
  public $opacity;

// methode tableau public function __construct($pos1, $pos2, $pos3 , $fill, $opacity)
  public function __construct($point, $fill, $opacity)
	{
  // methode tableau parent::__construct('', '', $fill, $opacity);
		parent::__construct('', '', $point, $fill, $opacity);
    //methode tableau $this->points = array($pos1, $pos2, $pos3);
        $this->point = $point;
		    $this->fill = $fill ;
        $this->opacity = $opacity;
	  }


}


 ?>
