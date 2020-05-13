var urisegment = window.location.pathname.split('/');
var baseUrl = window.location.protocol+ "//" +window.location.host+"/"+ urisegment[1] +"/";

// console.log('ini uri '+ urisegment +'pisah'+ urisegment[0] +' - '+ urisegment[1] );

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

  //LOGIN
  $('#loginForm button').click(function(){
    var identity = $('#loginForm input[name="identity"]').val();
    var password = $('#loginForm input[name="password"]').val();

    if (identity == '' || password == '') {
      $('#loginForm').prepend('<div class="alert alert-warning">Field email or password is required</div>')
    }else {
      var dataLogin = $('#loginForm').serialize();
      $.post(baseUrl + 'member/dologin', dataLogin)
      .done(function(val){
        if (val == 1) {
          window.location.reload();
        }else {
          $('#loginForm').prepend('<div class="alert alert-warning">Login gagal, email atau password salah</div>')
        }
      })
    }
  });

  //FORGOT PASSWORD
  $('#forgotPassword').click(function(e){
    e.preventDefault();

    $('#loginBox').addClass('d-none');
    $('#forgotPasswordBox').removeClass('d-none');

  });

  //FORGOT PASSWORD BUTTON BACK
  $('#forgotPasswordBox button[name="buttonBack"]').click(function(e){
    e.preventDefault();

    $('#loginBox').removeClass('d-none');
    $('#forgotPasswordBox').addClass('d-none');

  });

})
