<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:class-signup extends :x:element {
  attribute
    Schedule schedule @required;

  protected function render() {
    $schedule = $this->getAttribute('schedule');
    $courses = $schedule->getCourses();
    $course_signups = <ul />;
    foreach($courses as $course) {
      $course_signups->appendChild(
        <li>
          {$course->getDept().' '.$course->getNum().': '.$course->getID()}
        </li>
      );
    }

    return 
      <div class="modal hide" id="signupModal">
        <div class="modal-header">
          <h3>Register for Classes</h3>
        </div>
        <div class="modal-body">
          <h4>
            This is a list of your course IDs. Enter these into
            <a href="http://wolverineaccess.umich.edu">Wolverine Access</a>
          </h4>
          <br />
          {$course_signups}
        </div>
      </div>;
  }
}
