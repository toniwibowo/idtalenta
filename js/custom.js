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
  $('#loginForm button[name="login"]').click(function(){
    var identity = $('#loginForm input[name="identity"]').val();
    var password = $('#loginForm input[name="password"]').val();

    if (identity == '' || password == '') {
      // $('#loginForm').prepend('<div class="alert alert-warning">Field email or password is required</div>')
      alertify.set('notifier','position', 'top-right');
      alertify.error('Field email or password is required', 5);
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

  // OPEN REGISTER
  $('#btnRegister').click(function(e){
    e.preventDefault();
    $('div#registerField, button[name="login"], button[name="register"], #rememberMe, #forgotPassword').toggleClass('d-none');
    $('input[name="identity"]').attr('placeholder','Email');
  });

  // REGISTER VALIDATION
  $('#loginForm button[name="register"]').click(function(){

    alertify.set('notifier','position', 'top-right');

    var fullName  = $('#loginForm input[name="full_name"]');
    var identity  = $('#loginForm input[name="identity"]');
    var password  = $('#loginForm input[name="password"]');
    var cpassword = $('#loginForm input[name="cpassword"]');

    if (fullName.val() == '') {
      alertify.error('Full name field is required', 5);
      fullName.focus();
      return false;
    }

    if (identity.val() == '') {
      alertify.error('Email field is required', 5);
      identity.focus();
      return false;
    }

    if (password.val() == '') {
      alertify.error('Password field is required', 5);
      password.focus();
      return false;
    }

    if (password.val().length < 6) {
      alertify.error('Password length minimum 8 character', 5);
      cpassword.focus();
      return false;
    }

    if (cpassword.val() == '') {
      alertify.error('Confirm Password field is required', 5);
      cpassword.focus();
      return false;
    }

    if (password.val() !== cpassword.val()) {
      alertify.error('Password and confirm password doesn\'t match', 5);
      return false;
    }

    $(this).text('proccessing...');

    $.post(baseUrl +'member/doregister', {full_name: fullName.val(), identity: identity.val(), password: password.val()})
    .done(function(data){
      if (data == 1) {
        alertify.set('notifier','position', 'top-center');
        alertify.success('Your register has successfully, please validate your email to login', 5);

        $('#loginForm')[0].reset();

        $('#loginForm button[name="register"]').text('Daftar');

        setTimeout(function(){
          $('#defaultModal').modal('hide');
        }, 3000)

      }else {
        alertify.set('notifier','position', 'top-center');
        alertify.error('Your register is failed, please try again.', 5);
        $('#loginForm button[name="register"]').text('Daftar');
        $('#loginForm')[0].reset();
      }
    })
    .fail(function(err){
      console.log(err);
    })

  })

})
