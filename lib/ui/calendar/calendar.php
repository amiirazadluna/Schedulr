<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/course.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/calendar/course.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:calendar extends :x:element {
  attribute
    Schedule schedule;

  protected function render() {
    $header = 
      <thead>
        <tr>
          <th style="width: 25px;"></th>
          <th>M</th>
          <th>Tu</th>
          <th>W</th>
          <th>Th</th>
          <th>F</th>
        </tr>
      </thead>;

    $body = <tbody></tbody>;
    for($i = 8; $i < 19; $i++) {
      $time = ($i == 12) ? $i : $i % 12;
      $row = 
        <tr>
          <th>{$time}</th>
        </tr>;
      for($j = 0; $j < 5; $j++) {
        $cell = <th></th>;
        $row->appendChild($cell);
      }
      $body->appendChild($row);
    }
    $ret = <div id="calendarBackground" style="position: relative;"></div>;
    $ret->appendChild(
      <table class="table table-bordered">
        {$header}
        {$body}
      </table>
    );


    // display classes
    if($this->getAttribute("schedule")) {
      $schedule = $this->getAttribute("schedule");
      foreach ($schedule->getCourses() as $course) {
        $ret->appendChild(
          <sc:calendar:course course={$course} />
        );
      }
    }

    return $ret;
  }
}
