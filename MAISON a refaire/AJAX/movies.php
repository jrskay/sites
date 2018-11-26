
<?php
// déclaration d'une variable à tableau associatif avec des clés et leurs valeurs en plusieurs index
$movies =
[
    [ 'title' => 'X-Men: Days of Future Past',           'duration' => 124, 'cover' => 'xmen.jpg'              ],
    [ 'title' => 'Grace de Monaco',                      'duration' => 96,  'cover' => 'grace.jpg'             ],
    [ 'title' => 'Captain America 2',                    'duration' => 136, 'cover' => 'captain-america-2.jpg' ],
    [ 'title' => 'Les yeux jaunes des crocodiles',       'duration' => 121, 'cover' => 'yeux-jaunes.jpg'       ],
    [ 'title' => 'Rio 2',                                'duration' => 88,  'cover' => 'rio-2.jpg'             ],
    [ 'title' => 'Spiderman',                            'duration' => 145, 'cover' => 'spiderman.jpg'         ],
    [ 'title' => "Qu'est ce qu'on a fait au bon Dieu ?", 'duration' => 114, 'cover' => 'bon-dieu.jpg'          ],
    [ 'title' => 'Grand Budapest Hotel',                 'duration' => 128, 'cover' => 'budapest-hotel.jpg'    ]
];
?>

<!-- Affichage d'un template contenant la liste des films -->
<ul>
  <?php foreach ($movies as $key => $value) { ?>

    <li> <img src="<?= $value['cover'] ?>"> <p> <?= $value['title'] ?> - <?= $value['duration'] ?> </p> </li>

  <?php } ?>
</ul>
