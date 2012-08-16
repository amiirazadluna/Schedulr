<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:schedule:share-form extends :x:element {
  attribute
    Schedule schedule @required,
    User user @required;

  protected function render() {
    $schedule = $this->getAttribute('schedule');
    $user = $this->getAttribute('user');

    $url = "/share/".$user->getID()."/".$schedule->getID();
    // creating token to prevent csrf attacks
    $token = md5(uniqid());
    $_SESSION['img_token'] = $token;
    session_write_close();

    return 
      <form id="share_form" action={$url} method="post">
        <input type="hidden" name="img_data" id="img_data" />
        <input type="hidden" name="img_token" value={$token} />
      </form>;
  }
}
