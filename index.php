<?php
include 'db.php';

$obj = new query();
$condition_arr= array('id'=>10, 'name'=>'Bhaavit');
$obj->getData('user', '*',$condition_arr);




?>