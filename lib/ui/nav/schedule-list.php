<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:nav:schedule-list extends :x:element {
  attribute
    User user @required,
    Schedule schedule;

  protected function render() {
    $user = $this->getAttribute('user');
    $current_schedule = $this->getAttribute('schedule');

    $list = <div class="pull-left btn-group"></div>;
    $schedule_ids = $user->getScheduleIDs();
    
    foreach($schedule_ids as $i => $schedule_id) {
      $name = "Schedule #".($i+1);
      $url = "/schedule/$schedule_id";
      $item = <a class="btn" href={$url}>{$name}</a>;
      if($current_schedule && $current_schedule->getID() == $schedule_id)
        $item->addClass("btn-info");
      $list->appendChild($item);
    }
    $list->appendChild(<a class="btn" href="/schedule/new">New</a>);

    return $list;
  }
}
