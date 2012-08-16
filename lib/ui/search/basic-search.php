<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:search:basic-search extends :x:element {

  protected function render() {
    return
      <div id="basic-search"> 
        <input id="query" type="text" class="input-medium search-query" />
        <span class="pull-right btn-group">
          <button class="btn" onclick="search()">Search</button>
          <button class="btn" onclick="showAdvancedSearch()">Advanced</button>
        </span>
      </div>;
  }
}

