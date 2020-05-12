var baseUrl = window.location.protocol+ "//" +window.location.host+"/idtalenta/";

$(document).ready(function(){

  // SUBSCRIBE
  $('input[type="button"][name="subscribe"]').click(function(){
    var email = $('#mc-embedded-subscribe-form input[name="email"]').val();
    alertify.set('notifier','position', 'top-right');

    if (email == '') {
      alertify.error('Email field is required', 5);
    }else {
      $.post(baseUrl +'subscribe', {email: email})
      .done(function(val){
        if (val == 1) {
          alertify.success('Subscribe success', 5);
        }else if(val == 2) {
          alertify.error('Email already exist', 5);
        }else if (val == 3) {
          alertify.error('Email field is required', 5);
        }else {
          alertify.error('Subscribe failed to insert', 5);
        }
      })
      .fail(function(err){
        console.log(err);
      })
    }
  });

})
