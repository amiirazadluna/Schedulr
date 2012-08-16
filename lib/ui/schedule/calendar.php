<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:schedule:calendar extends :x:element {

  protected function render() {
    return
      <x:frag>
        <div id="div-calendar" style="position: absolute"></div>
        <canvas id="canvas-calendar" width="620px"></canvas>
      </x:frag>;
  }
}

