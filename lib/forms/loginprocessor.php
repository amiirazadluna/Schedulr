<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/util/db.php');

$uniqname = mysql_real_escape_string($_POST['uniqname']);
$password = mysql_real_escape_string($_POST['password']);

// signing up
if($_POST['submit_type'] == "signup") {
  DBQuery("insert into users values ('$uniqname', '".sha1($password)."', 1);");
  session_start();
  $_SESSION['user'] = $uniqname;
  header("Location: /");
} 

// logging in
else {
  if(!$uniqname || !$password)
    header("Location: /login");

  $results = DBSelectUsers("uniqname='$uniqname' AND password='".sha1($password)."';");
  if(mysql_num_rows($results)) {
    $row = mysql_fetch_assoc($results);
    session_start();
    $_SESSION['user'] = $row['uniqname'];
    header("Location: /");
  } else {
    header("Location: /login");
  }
}
