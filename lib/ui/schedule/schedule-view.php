<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/schedule.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/register/class-signup.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/schedule/calendar.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/schedule/share-form.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/search/search-area.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:schedule:schedule-view extends :x:element {
  attribute
    Schedule schedule,
    User user @required;


  protected function render() {
    $schedule = $this->getAttribute('schedule');
    $user = $this->getAttribute('user');

    if (!$schedule) {
      return <x:frag />;
    }
    
    return
      <x:frag>
        <sc:register:class-signup schedule={$schedule} />
        <sc:schedule:share-form user={$user} schedule={$schedule} />
        <div class="row">
          <div class="span8">
            <sc:schedule:calendar />
          </div>
          <div class="span4">
            <sc:search:search-area />
          </div>
        </div>
      </x:frag>;
  }
}
