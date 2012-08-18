<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/schedule/calendar.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/search/search-area.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

?>
 
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <script 
      type="text/javascript" 
      src="http://code.jquery.com/jquery-latest.min.js">
    </script>
    <script type="text/javascript" src="/assets/js/schedule.js"></script>
    <script type="text/javascript" src="/assets/js/calendar.js"></script>
    <script type="text/javascript">
      var trial = true;
    </script>
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
        <h1>schedulr</h1>
      </div>

      <div class="row">
        <div class="span10">
          <h3>Sign up to be able to save your schedule, or plan out multiple schedules.</h3>
        </div>
        <div class="span2">
          <a href="/login" class="pull-right btn btn-primary">Sign Up</a>
        </div>
      </div>

      <br/>
      <?php
        echo
          <div class="row">
            <div class="span8">
              <sc:schedule:calendar />
            </div>
            <div class="span4">
              <sc:search:search-area />
            </div>
          </div>;
      ?> 
    </div>
  </body>
</html>
