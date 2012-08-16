<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/search/basic-search.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/search/advanced-search.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/ui/search/search-nux.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:search:search-area extends :x:element {

  protected function render() {
    return
      <x:frag>
        <input id="search-type" type="hidden" value="basic" />
        <sc:search:basic-search />
        <sc:search:advanced-search />
        <sc:search:search-nux />
        <div id="results" />
      </x:frag>;
  }
}
