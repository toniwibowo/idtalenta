var baseUrl = window.location.protocol+ "//" +window.location.host+"/idtalenta/";

$(document).ready(function(){
  $('input[type="button"][name="subscribe"]').click(function(){
    var email = $('#mc-embedded-subscribe-form input[name="email"]').val();

    if (email == '') {
      alert('Email Field is required')
    }else {
      $.post(baseUrl +'subscribe', {email: email})
      .done(function(val){
        if (val == 1) {
          alert('Subscribe success');
        }else if(val == 2) {
          alert('Email already exist')
        }else if (val == 3) {
          alert('Email Field is required')
        }else {
          alert('Email Field to insert')
        }
      })
      .fail(function(err){
        console.log(err);
      })
    }
  })
})
