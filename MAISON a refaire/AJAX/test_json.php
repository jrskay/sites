
<?php
// déclaration d'une variable à tableau associatif avec des clés et leurs valeurs en plusieurs index
$contactList =
[
    [ 'firstName' => 'Tom',       'phone' => '0102030405' ],
    [ 'firstName' => 'Joana',     'phone' => '0102233445' ],
    [ 'firstName' => 'Catherine', 'phone' => '0605455548' ]
];
// echo json_encode() Retourne la représentation JSON d'une valeur
echo json_encode($contactList);

?>
