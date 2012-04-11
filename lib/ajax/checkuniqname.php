<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/util/db.php');

echo mysql_num_rows(DBSelectUsers("uniqname='".mysql_real_escape_string($_GET['uniqname'])."'"));

?>
