var urisegment = window.location.pathname.split('/');
var baseUrl = window.location.protocol+ "//" +window.location.host+"/"+ urisegment[1] +"/";

// console.log('ini uri '+ urisegment +'pisah'+ urisegment[0] +' - '+ urisegment[1] );

$(document).ready(function(){

  //TEXTAREA
  $('textarea').each(function(index){

    $(this).html($(this).html().trim());

    //console.log($(this).val());
  });

  $('.dropdown-item.text-warning').click(function(e){
    e.preventDefault();
  });

  // RATTING STAR
  $('.star-box-wrap .single-ratting-star').click(function(e){
    e.preventDefault();
    var star = $(this).children().length;

    $('.star-box-wrap .single-ratting-star').removeClass('active');
    $(this).addClass('active');

    $('input[name="star"]').val(star);

    console.log('Bintang saya adalah '+ star);
  })

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

    var text = $(this).text();
    $(this).text(text == 'Belum punya akun? Daftar disini.' ? 'Sudah punya akun?, silahkan login disini' : 'Belum punya akun? Daftar disini.')



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

    console.log(fullName.val());
    console.log(identity.val());
    console.log(password.val());

    $(this).text('proccessing...');

    $.post(baseUrl +'member/doregister', {full_name: fullName.val(), identity: identity.val(), password: password.val()})
    .done(function(data){
      console.log(data);
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
        console.log(data);
      }
    })
    .fail(function(err){
      console.log(err);
    })

  })

  $('a#addtocart').click(function(e){

    e.preventDefault();

    var product_id = $(this).data('product');

    $.post(baseUrl +'cart/addtocart', {product_id: product_id, qty: 1})
    .done(function(){
      alertify.set('notifier','position', 'top-center');
      alertify.success('Item success add to cart', 3);
      setTimeout(function(){
        window.location.reload()
      }, 1500)

    })

  })

  //GET CITY
  $('select#province').on('change',function(){
    var id = this.value;
    $.get(baseUrl + 'member/city/'+ id, function(data){
      $('select#city').html(data);
    })
  });

  // UPLOAD PHOTO PROFILE

  $('#uploadPhoto #file').on('change',function(){
    var dataUpload = new FormData();
    var files = $('#file')[0].files[0];
    var user_id = $('#uploadPhoto input[name="user_id"]').val();
    dataUpload.append('photo',files);
    dataUpload.append('user_id',user_id);

    console.log('photo: '+files);

    $.ajax({
      url: baseUrl + '/mentor/uploadPhoto',
      type:'post',
      data: dataUpload,
      contentType: false,
      processData: false,
      success: function(val){
        if (val == 'uploaded') {
          //window.location.reload();
          alertify.success('Your photo successfully updated', 5);
        }else {
          alert(val);
        }
      }
    })

  });

  // GET SUBCATEGORY MENTOR REGISTRATION
  $('select[name="classcategory"]#classcategory').on('change', function(){
    var id = this.value;
    $.get(baseUrl + '/member/subcategory/'+ id, function(data){
      $('select#subcategory').html(data);
    })
  })

  //VALIDATE PASSWORD MATCH CONFIRM PASSWORD
  $('#myAccount input[name="password"]').on('blur', () => {
    const password = $('#myAccount input[name="password"]').val();
    $('#myAccount input[value="Save"]').attr('type','button');
  });

  $('#myAccount input[value="Save"]').click(() => {

    const attr = $('#myAccount input[value="Save"]').attr('type');
    const password = $('#myAccount input[name="password"]').val();
    const cpassword = $('#myAccount input[name="cpassword"]').val();

    alertify.set('notifier','position', 'top-right');

    if (attr == 'button') {

      if (cpassword == '') {
        alertify.error('Confirmation Password is required', 5);
      }else if (cpassword != '' && cpassword != password) {
        alertify.error('Your confirmation Password doesn\'t matches with password field.', 5);
      }else {
        $('#myAccount').submit();
      }
    }
  })

  // CHECKOUT HEADER
  $('#checkoutsubmit').click(function(e){
    e.preventDefault();
    $('#checkout').submit();
  });

  // LATEST VIEW VIDEO CAROUSEL
  $('#latestViewVideo.owl-carousel').owlCarousel({
    loop: false,
    dots: true,
    responsiveClass:true,
    margin: 10,
    responsive: {
      0:{
        items: 1
      },
      768: {
        items: 3
      }
    }

  });

  // WISHLIST START
  $('a#btn-wishlist').click(function(e){

    e.preventDefault();

    var class_id = $(this).data('class'),
    user_id = $(this).data('user');

    $.post(baseUrl +'wishlist/add',{user_id: user_id, mentor_class_id: class_id})

    .done(function(val){

      alertify.set('notifier','position', 'top-center');

      if (val == 'exist') {

        alertify.success('Item already exist in your wishlist', 3);

      }else {

        alertify.success('Item successfully added to wishlist', 3);

      }
    })
  })
  // WISHLIST END

  // UPDATE YOUTUBE LINK FROM MENTOR DASHBOARD
  $('#youtubeLink').on('change', function(){
    var classID = $(this).data('id');
    var videoID = $(this).data('video_id');
    var userID = $(this).data('user');
    var link = this.value;
    console.log('DATA YOUTUBE '+ classID +' - '+link+' - '+videoID);
    alertify.set('notifier','position', 'top-center');

    $.post(baseUrl+ 'mentor/updatevideo', {class_id: classID, user_id: userID, video_id: videoID, youtube_link: link})
    .done(function(val){
      if (val == 1) {
        alertify.success('Link video successfully update', 3);
        window.location.reload();
      }else {
        alertify.error('Your link video failed to update', 3);
      }
    })
    .fail(function(err){
      console.log(err);
    })
  });

  // UPDATE TITLE YOUTUBE VIDEO
  $('input[name="youtube-title"]').on('change', function(){
    var link  = $(this).data('link');
    var title = this.value;

    $.post(baseUrl+ 'mentor/updatevideo', {link: link, title: title})
    .done(function(val){
      if (val == 1) {

        alertify.success('Title video successfully update', 3);

      }else {

        alertify.error('Title video failed to update', 3);

      }
    })
    .fail(function(err){
      console.log(err);
    })

  })

  // UPDATE THRILLER YOUTUBE

  // UPDATE TITLE YOUTUBE VIDEO
  $('input[name="thriller-youtube"]').on('change', function(){
    var classID   = $(this).data('id');
    var link      = this.value;

    $.post(baseUrl+ 'mentor/updatevideo', {thriller_youtube: link, class_id: classID})
    .done(function(val){
      if (val == 1) {

        alertify.success('Thriller video successfully update', 3);
        window.location.reload();

      }else {

        alertify.error('Thriller video failed to update', 3);

      }
    })
    .fail(function(err){
      console.log(err);
    })

  });

  // STICKY HEADER MENU
  const header = $('.header-bottom');
  const sticky = header.offset().top;
  
  $(window).scroll(function() {



    console.log(sticky);

    header.myfunction();


  });



  (function( $ ){
   $.fn.myfunction = function() {
     if (window.pageYOffset > sticky) {
       header.addClass('sticky')
     }else {
       header.removeClass('sticky')
     }
      return this;
   };
  })( jQuery );


})
