// Check if new user
$(document).ready(function() {
  if(trial)
    return;
  $("#nux1").hide();
  if(newuser && schedule) {
    $("#nux1").delay(300).fadeIn(500); 
    $("#query").focus(function() {
      $("#nux1").fadeOut(500); 
    });
  }
});

document.onkeydown=keyPressed;
function keyPressed(e) {
  if(!e) e=window.event;
  if(e.keyCode == 13) {
    search();
  }
}

function addEventHandlers() {
  $(".courseInfo").bind({
    click: function(event) {
      var id = $(this).attr("data-id");
      addCourse(id);
    },
    mouseenter: function(event) {
      if(event.target === this) {
        var id = $(this).attr("data-id");
        ghostCourse(id);
      }
    },
    mouseleave: function(event) {
      if(event.target === this) {
        unghostCourse();
      }
    }
  });
}

function showAdvancedSearch() {
  $("#basic-search").addClass("hidden");
  $("#advanced-search").removeClass("hidden");
  $("#search-type").val("advanced");
}
function closeAdvancedSearch() {
  $("#advanced-search").addClass("hidden");
  $("#basic-search").removeClass("hidden");
  $("#search-type").val("basic");
}

function search() {
  $(results).html("");
  if($("#search-type").val() == "basic") {
    var query = $("#query").val();
    $.ajax({
      url: "/lib/ajax/search.php",
      data: { query: query }
    }).done(function(data) {
      if (data != "") {
        $(results).append(data);
        addEventHandlers();
      }
    });
  } else {
    $("#basic-search").removeClass("hidden");
    $("#advanced-search").addClass("hidden");
    $("#search-type").val("basic");
    
    var dept = $("#in_dept").val();
    var num_select = $("#num_select").val();
    var num = $("#in_num").val();
    var dist = $("#in_dist").val();
    var credits = $("#in_credits").val();
    var prof = $("#in_prof").val();
   
    $.ajax({
      url: "/lib/ajax/searchadvanced.php",
      data: {
        dept: dept, 
        num_select: num_select, 
        num: num, 
        dist: dist,
        credits: credits, 
        prof: prof
      },
    }).done(function(data) {
      if (data != "") {
        $(results).append(data);
        addEventHandlers();
      }
    });
  }
}

function addCourse(id) {
  for(i in calendar.ghosts) {
    if(calendar.ghosts[i].id == id)
      calendar.courses.push(calendar.ghosts[i]);
  } 

  if(trial) {
    calendar.redraw();
    return;
  }

  $.ajax({
    url: "/lib/ajax/addclass.php",
    data: {id:id, schedule:schedule},
  }).done(function() {
    calendar.init();
  });

  // No longer a new user!
  if(newuser) {
    $.ajax("/lib/ajax/removenewuser.php");
    newuser = 0;
  }
}

function ghostCourse(id) {
  calendar.redraw();
  $.ajax({
    url: "/lib/ajax/ghostclass.php",
    data: {id: id},
    dataType: "json"
  }).done(function(data) {
    for(i in data) {
      calendar.drawCourse(data[i], true);
      calendar.ghosts = data;
    }
  });
}

function unghostCourse(e) {
  calendar.redraw();
}

function removeCourse(id) {
  var newCourses = new Array();
  for(i in calendar.courses) {
    if(calendar.courses[i].id != id)
      newCourses.push(calendar.courses[i]);
  }
  calendar.courses = newCourses;
  calendar.redraw();

  if(trial)
    return;

  $.ajax({
    url: "/lib/ajax/removeclass.php",
    data: {id: id, schedule: schedule}
  }).fail(function() {
    console.log("Something went wrong");
    calendar.init();
  })
}
