<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/course.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');

$id = $_GET['id'];

$schedule = new Schedule($_GET['schedule']);
$schedule->addCourse($id);

?>
