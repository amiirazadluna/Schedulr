<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/course.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');

$id = mysql_real_escape_string($_GET['id']);

$result = DBQuery("SELECT count(courseid) FROM courses WHERE courseid=".$id);

$courseid = mysql_fetch_row($result);
$count = $courseid[0];

$courses = array();

for($i = 0; $i < $count; $i++) {
  $course = new Course($id, $i);
  $courses[] = $course->getArray();
}
echo json_encode($courses);

?>
