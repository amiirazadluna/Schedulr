<?php

session_start();
if (!$_SESSION['user'])
  header("Location: /login");

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/nav/nav-bar.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/schedule/schedule-view.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

$user = new User($_SESSION['user']);

// Create a new schedule
if(isset($_GET['new'])) {
  header("Location: /schedule/".$user->newSchedule());
  exit;
}

$schedule = null;
if(isset($_GET['schedule'])) {
  $schedule = new Schedule($_GET['schedule']);

  if($schedule->getOwnerID() != $user->getID() && $user->getID() != 'kgaurav') {
    // Not correct owner, go to home
    header("Location: /"); 
    exit;
  }
}

?>
 
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <script type="text/javascript">
      var trial = false;
      <?php
        echo "var user = '".$user->getID()."';"; 
        echo "var newuser = ".$user->isNewUser().";";
        if($schedule)
          echo "var schedule = ".$schedule->getID().";"; 
      ?>
    </script>
    <script 
      type="text/javascript" 
      src="http://code.jquery.com/jquery-latest.min.js">
    </script>
    <script type="text/javascript" src="/assets/js/schedule.js"></script>
    <script type="text/javascript" src="/assets/js/calendar.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-modal.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/master.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">

    <!-- Google Analytics Code -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-18888523-4']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>
          schedulr
          <a class="btn pull-right" href="/logout">Logout</a>
        </h1>
      </div>
      <?php 
        if(isset($_GET['from']) && $_GET['from'] == "fb")
          echo <h3>Successfully posted to Facebook!</h3>;

        echo <sc:nav:nav-bar user={$user} schedule={$schedule} />;
        echo <sc:schedule:schedule-view user={$user} schedule={$schedule} />;
      ?>
    </div>
  </body>
</html>
