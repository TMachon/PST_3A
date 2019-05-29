<?php include('../model/bd.php');
    include('../model/membre.php');
    include('../model/answer_tutoriel.php');
$id_for = $_GET['id_for'];
$url = 'Location:../view/pageTutoriel.php?id_for=' . $id_for;
header($url);
$newAnswerTutoriel = new Answer_Tutoriel($_POST['addComment'], $_SESSION['id_SURFER'], $id_for);
$newAnswerTutoriel->insert_answer($_SESSION);
?>