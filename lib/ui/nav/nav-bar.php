<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/nav/schedule-list.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/nav/schedule-actions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:nav:nav-bar extends :x:element {
  attribute
    User user @required,
    Schedule schedule;

  protected function render() {
    $user = $this->getAttribute('user');
    $schedule = $this->getAttribute('schedule');

    return 
      <div class="row">
        <div class="span12">
          <div class="btn-toolbar">
            <sc:nav:schedule-list user={$user} schedule={$schedule} />
            <sc:nav:schedule-actions schedule={$schedule} />
          </div>
        </div>
      </div>;
  }
}
