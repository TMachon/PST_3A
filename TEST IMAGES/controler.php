<?php
	//var_dump($_FILES['avatar']['tmp_name']);

	foreach($_FILES['avatar']['tmp_name'] as $key=>$val){
        //$fileName = basename($_FILES['files']['name'][$key]);
        echo $val.'<br>';
    }

?>