<?php include('../model/bd.php');
    include('../model/membre.php');
    include('../model/answer_forum.php');
$id_for = $_GET['id_for'];
$url = 'Location:../view/pageForum.php?id_for=' . $id_for;
header($url);
$newAnswerForum = new Answer_Forum($_POST['addComment'], $_SESSION['id_SURFER'], $id_for);
$newAnswerForum->insert_answer($_SESSION);
?>