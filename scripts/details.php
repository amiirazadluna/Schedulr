<?php
  require_once('../util/db.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

  $select = "
    SELECT dept, catalognum, section
    FROM courses
    GROUP BY dept, catalognum;
  ";
  $result = DBQuery($select);
  while($row = mysql_fetch_assoc($result)) {
    $dept = $row['dept'];
    $num = $row['catalognum'];
    $section = str_pad($row['section'], 3, "0", STR_PAD_LEFT);
    $filename = 'http://www.lsa.umich.edu/cg/cg_detail.aspx?content=1920';

    $file = file_get_contents($filename.$dept.$num.$section);

    $startpos = strpos($file, "lblDist");
    if($startpos === false) {
      $req = "";
    } else {
      $startpos = strpos($file, ">", $startpos) + 1;
      $endpos = strpos($file, "</span>", $startpos);
      $length = $endpos - $startpos;
      $req = substr($file, $startpos, $length);
      $write = "UPDATE courses SET req='".$req."' WHERE dept='".$dept."' AND catalognum='".$num."'";
      DBQueryIgnoreError($write);
    }

    $startpos = strpos($file, "ctl00_MainContent_lblDescr");
    if($startpos === false) {
      $desc = "";
    } else {
      $startpos = strpos($file, ">", $startpos) + 1;
      $endpos = strpos($file, "</span>", $startpos);
      $length = $endpos - $startpos;
      $desc = mysql_real_escape_string(substr($file, $startpos, $length));

      $write = "UPDATE courses SET `desc`='".$desc."' WHERE dept='".$dept."' AND catalognum='".$num."'";
      DBQueryIgnoreError($write);
    }
  }

  echo "I'm Done";
?>
  
