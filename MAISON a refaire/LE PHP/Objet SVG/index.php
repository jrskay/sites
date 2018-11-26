<!-- https://www.youtube.com/watch?v=oqbV9rrQ0gk -->
<?php

include 'Shape.class.php';

include 'Rectangle.class.php';

include 'Carre.class.php';

include 'Circle.php';

include 'Triangle.php';

include 'ellipse.php';

include 'Program.class.php';

$rectangle = new Rectangle('50', '20', '200', '100', 'firebrick', '1');

$carre = new Carre('400', '200', '100', 'deepskyblue', '0.5');

$circle = new Circle('300', '250', '180', '100', 'gold', '0.33');

// methode 3 var
$triangle = new Triangle('50 15, 100 100, 0 100' , 'blue', '0.33');

// methode tableau
 // $triangle = new Triangle('50 15', '100 100', '0 100' , 'blue', '0.33');

 $ellipse = new Ellipse('600', '250', '40', '80', 'blue', '0.75');

$circle->setColor('red');

$program = new Program($rectangle, $carre, $circle, $triangle, $ellipse);



$results = $program->drawAll();



include 'index.phtml';

?>
