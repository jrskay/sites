

<?php

class Program {

	private $rectangle;
	private $carre;
	private $circle;
	private $triangle;
	private $ellipse;

    public function __construct(Rectangle $rectangle, Carre $carre, Circle $circle, Triangle $triangle, Ellipse $ellipse )
	{

		$this->rectangle = $rectangle;
		$this->carre = $carre;
		$this->circle = $circle;
		$this->triangle = $triangle;
		$this->ellipse = $ellipse;

	}

    public function drawRectangle() {
      return '<rect x="'.$this->rectangle->x.'" y="'.$this->rectangle->y.'" width="'.$this->rectangle->width.'" height="'.$this->rectangle->height.'" fill="'.$this->rectangle->fill.'" opacity="'.$this->rectangle->opacity.'"></rect>';
    }

		public function drawCarre() {
			return '<rect x="'.$this->carre->x.'" y="'.$this->carre->y.'" width="'.$this->carre->width.'" height="'.$this->carre->height.'" fill="'.$this->carre->fill.'" opacity="'.$this->carre->opacity.'"></rect>';
		}

		public function drawCircle() {
			return '<circle cx="'.$this->circle->x.'" cy="'.$this->circle->y.'" r="'.$this->circle->r.'" height="'.$this->circle->height.'" fill="'.$this->circle->fill.'" opacity="'.$this->circle->opacity.'"></circle>';
		}

// methodez 3 var
		public function drawTriangle(){
			return '<polygon points="'.$this->triangle->point.'" fill="'.$this->triangle->fill.'" opacity="'.$this->triangle->opacity.'"></polygon>';
		}

		public function drawEllipse() {
			return '<ellipse cx="'.$this->ellipse->x.'" cy="'.$this->ellipse->y.'" rx="'.$this->ellipse->r.'" ry="'.$this->ellipse->ry.'" fill="'.$this->ellipse->fill.'" opacity="'.$this->ellipse->opacity.'"></ellipse>';
		}

// 		methode tableau
// 		public function drawTriangle() {
//
// 	return '<polygon points="'.$this->triangle->points[0].', '.$this->triangle->points[1].', '.$this->triangle->points[2].'" fill="'.$this->triangle->fill.'" opacity="'.$this->triangle->fill.'"></polygon>';
//
// }


    public function drawAll() {
      $result = [];
			array_push( $result, $this->drawRectangle() );
			array_push( $result, $this->drawCarre() );
			array_push( $result, $this->drawCircle() );
			array_push( $result, $this->drawTriangle() );
			array_push( $result, $this->drawEllipse() );
      return $result;

    }


}


?>
