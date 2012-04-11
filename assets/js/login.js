function removeSignup() {
  $(signup_message).addClass("hidden");
  $(password2).addClass("hidden");
  $(password2).val("");
  $(submit_type).val("login");
  $(".login-form-large").addClass("login-form-small");
  $(".login-form-small").removeClass("login-form-large");
}

function submitLogin() {
  if($(submit_type).val() == "signup") {
    if($(password).val() != $(password2).val()) {
      alert("passwords don't match");
      return false;
    }
  } else {
    var error = false;
    // Check if uniqname currently exists
    $.ajax({
      url: "/lib/ajax/checkuniqname.php",
      data: { uniqname: $(uniqname).val() }
    }).done(function(data) {
      if(data == 0) {
        $(".login-form-small").addClass("login-form-large");
        $(".login-form-large").removeClass("login-form-small");
        $(submit_type).val("signup");
        $(signup_message).removeClass("hidden");
        $(password2).removeClass("hidden");
        error = true;
      }    
    });
  }
  if(error)
    return false;
}
