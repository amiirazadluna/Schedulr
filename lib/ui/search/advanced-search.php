<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/xhp/init.php');

class :sc:search:advanced-search extends :x:element {

  protected function render() {
    return
      <div class="form-horizontal hidden" id="advanced-search" >
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="in_dept">Department:</label>
            <div class="controls">
              <input 
                id="in_dept" 
                type="text" 
                class="input-medium" 
                placeholder="department" 
              />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="in_num">Course Number:</label>
            <div class="controls">
              <select id="num_select" style="width: 50px; margin-right: 10px">
                <option>{'<'}</option>
                <option selected={true}>{'='}</option>
                <option>{'>'}</option>
              </select>
              <input 
                id="in_num" 
                type="text" 
                class="input-small" 
                placeholder="num" 
              />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="in_dist">Distributions:</label>
            <div class="controls">
              <select style="width: 150px" multiple="multiple" id="in_dist">
                <option>CE</option>
                <option>HU</option>
                <option>SS</option>
                <option>ID</option>
                <option>MSA</option>
                <option>NS</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="in_credits">Credits:</label>
            <div class="controls">
              <select style="width: 150px" multiple="multiple" id="in_credits">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5+</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="in_prof">Professor:</label>
            <div class="controls">
              <input 
                id="in_prof" 
                type="text" 
                class="input-medium" 
                placeholder="professor" 
              />
            </div>
          </div>
          <div class="form-actions">
            <span class="btn-group">
              <button class="btn" onclick="closeAdvancedSearch()">Back</button>
              <button class="btn" onclick="search()">Search</button>
            </span>
          </div>
        </fieldset>
      </div>;
  }
}
