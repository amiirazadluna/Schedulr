function removeSignup() {
  $(signup_message).addClass("hidden");
  $(password2).addClass("hidden");
  $(password2).val("");
  $(submit_type).val("login");
  $(".login-form-large").addClass("login-form-small");
  $(".login-form-small").removeClass("login-form-large");
  $(signup_instructions).addClass("hidden");
  $(login_instructions).removeClass("hidden");
}

function addSignup() {
  $(password2).removeClass("hidden");
  $(password2).val("");
  $(submit_type).val("signup");
  $(".login-form-small").addClass("login-form-large");
  $(".login-form-large").removeClass("login-form-small");
  $(signup_instructions).removeClass("hidden");
  $(login_instructions).addClass("hidden");
}

function submitLogin() {
  if($(submit_type).val() == "signup") {
    if($(password).val() != $(password2).val()) {
      alert("passwords don't match");
      return false;
    }
  } else {
    // Check if uniqname currently exists
    $.ajax({
      async: false,
      url: "/lib/ajax/checkuniqname.php",
      data: { uniqname: $(uniqname).val() }
    }).done(function(data) {
      if(data == 0) {
        $(signup_message).removeClass("hidden");
        addSignup();
      }
    });
  }
}
