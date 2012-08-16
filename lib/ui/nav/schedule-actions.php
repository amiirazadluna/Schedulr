<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:nav:schedule-actions extends :x:element {
  attribute
    Schedule schedule;

  protected function render() {
    $schedule = $this->getAttribute('schedule');
    if(!$schedule) {
      return <x:frag />;
    }
    
    $url = "/delete/".$schedule->getID();
    return 
      <div class="pull-right">
        <div class="btn-group">
          <a onclick="shareSchedule()" class="btn">
            Share
          </a>
        </div>
        <div class="btn-group">
          <a class="btn" data-toggle="modal" href="#signupModal">
            Register
          </a>
        </div>
        <div class="btn-group">
          <a href={$url} class="btn btn-danger">
            Delete
          </a>
        </div>
      </div>;
  }
}
