<?php
// pas besoin
// session_start();

if (empty($_POST) == false) {

    include 'bdd_connection.php';

    $query = $pdo->prepare
        (
            'INSERT INTO
            Comment
            (NickName, Contents, Post_Id, CreationTimestamp)
        VALUES
            (?, ?, ?, NOW())'
        );

    $query->execute([$_POST['nickName'], $_POST['contents'], $_POST['postId']]);

}

header('Location: show_post.php?id='.$_POST['postId']);
exit();

?>
