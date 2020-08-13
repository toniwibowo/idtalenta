var urisegment = window.location.pathname.split('/');
var siteUrl = window.location.protocol+ "//" +window.location.host+"/"+ urisegment[1] +"/";

console.log(urisegment);

if (urisegment[3] != 'upload') {
  //sessionStorage.removeItem('video_id');
  //alert('test '+ urisegment[3]);
}

if (urisegment[2] == "") {
  // location.hash = "graphic-design";
  // window.location = location.hash;
}

$(document).ready(function(){
  $('.section-mentor .owl-carousel').owlCarousel({
    margin:10,
    loop:true,
    nav:true,
    responsive:{
      0:{
        items:1,
      },
      992: {
        items:3,
      }
    }
  });

  //END MENTOR CAROUSEL

  //LOGIN
  // $('#loginForm button').click(function(){
  //   var identity = $('#loginForm input[name="identity"]').val();
  //   var password = $('#loginForm input[name="password"]').val();
  //
  //   if (identity == '' || password == '') {
  //     $('#loginForm').prepend('<div class="alert alert-warning">Field email or password is required</div>')
  //   }else {
  //     var dataLogin = $('#loginForm').serialize();
  //     $.post(siteUrl + 'member/dologin', dataLogin)
  //     .done(function(val){
  //       if (val == 1) {
  //         window.location.reload();
  //       }else {
  //         $('#loginForm').prepend('<div class="alert alert-warning">Login gagal, email atau password salah</div>')
  //       }
  //     })
  //   }
  // });

  //UPLOAD PHOTO MENTOR

  // $('#uploadPhoto #file').on('change',function(){
  //   var dataUpload = new FormData();
  //   var files = $('#file')[0].files[0];
  //   var user_id = $('#uploadPhoto input[name="user_id"]').val();
  //   dataUpload.append('photo',files);
  //   dataUpload.append('user_id',user_id);
  //
  //   console.log('photo: '+files);
  //
  //   $.ajax({
  //     url: siteUrl + 'mentor/uploadPhoto',
  //     type:'post',
  //     data: dataUpload,
  //     contentType: false,
  //     processData: false,
  //     success: function(val){
  //       if (val == 'uploaded') {
  //         window.location.reload();
  //       }else {
  //         alert(val);
  //       }
  //     }
  //   })
  //
  // });

  //GET CITY
  $('select#province').on('change',function(){
    var id = this.value;
    $.get(siteUrl + 'member/city/'+ id, function(data){
      $('select#city').html(data);
    })
  })

  //SUBSCRIBE
  $('#subscribeForm').each(function(event){
    $('#subscribeForm button[type="button"]').click(function(){
      var dataSubscribe = $('#subscribeForm').serialize();
      $.post(siteUrl +'subscribe/sendEmail', dataSubscribe)
      .done(function(val){
        if (val == 1) {
          alert('working')
        }
        else if (val == 2) {
          alert('exist')
        }
        else {
          alert('failed')
        }
      })
      .fail(function() {
        alert( "error" );
      })

    })

  })
  // END SUBSCRIBE

  //TEXTAREA
  $('textarea').each(function(index){

    $(this).html($(this).html().trim());

    //console.log($(this).val());
  });

  var ajaxFunction = function(url, data, progress, success){
    $.ajax({
      url: url,
      type:'POST',
      contentType: false,
      cache: false,
      processData: false,
      data: data,
      xhr: function()
      {
        var jqXHR = null;
        if (window.ActiveXObject) {
          jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
          jqXHR = new XMLHttpRequest();
        }

        //var jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");

        //Upload progress
        jqXHR.upload.addEventListener("progress",function(evt){
          if(evt.lengthComputable){
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something upload progress
            progress.parent().parent().find('.progress').find('.progress-bar').attr('style','width:'+ percentComplete +'%' );
            //console.log('Upload percent', percentComplete);
          }
        }, false);

        //Download Progress
        jqXHR.addEventListener( "progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something Download progress
            console.log('Download percent', percentComplete);
          }
        }, false);

        return jqXHR;
      },
      success : success
    });
    return false;
  }

  $('form#updateMentorProfile').each(function(){

    $('input[name="videomentor"]').on('change',function(){

      var thisInput = $(this);

      var file    = $(this)[0].files[0];
      var id      = $(this).data('id');
      var update  = $(this).data('update');

      var formData = new FormData();
      formData.append('videomentor',file);
      formData.append('mentor_id',id);
      formData.append('update',update);

      var url = siteUrl + 'mentor/updatevideo';

      var success = function(val){
        thisInput.parent().parent().find('.progress').find('.progress-bar').hide();
        thisInput.parent().parent().find('.progress').css('height','auto').html('<div class="alert alert-success w-100" role="alert">'+ val +'</div>');

        setTimeout(function(){ window.location.reload(); }, 3000);
      }

      ajaxFunction(url, formData, thisInput, success);

    })
  })



  //MENTOR UPLOAD VIDEO

  $('#formUploadVideo').each(function(){

    //POST VIDEO

    for (var i = 1; i < 16; i++) {
      $('#mainVideo').clone().prependTo('.additional-video').attr('data-id', i).addClass('d-none').find('.form-control-file').attr('id','video-mentor-' + i)
      .parent().parent().find('.upload-box-description textarea').attr('id','video_description'+i);
      $('.additional-video .upload-box').addClass('mt-3');
    }

    $('#formUploadVideo button[name="addvideo"]').click(function(){

      var amountVideo = $('.additional-video .upload-box.d-none').length;

      if (amountVideo > 0) {
        $('.additional-video .upload-box[data-id="'+ amountVideo +'"]').removeClass('d-none').find('.progress').find('.progress-bar').attr('style','width:0%');
        $('input[name="submitVideo"]').attr('type','button').click(function() {
          var emptytextarea = $('#mainVideo:not(".d-none") textarea');
          if (emptytextarea.val() == '') {
            emptytextarea.not('.is-valid').addClass('is-invalid');
            //alert('tambah class atas');
          }
        });
      }else {
        alert("Video tidak bisa ditambahkan lagi")
      }

    });

    // UPLOAD POSTER VIDEO

    $('#formUploadVideo input[name="posterUpload"]').on('change',function(){
      var thisdiv           = $(this);
      var file              = $(this)[0].files[0];
      var user_id           = $('#formUploadVideo input[name="user_id"]').val();
      var video_id          = $('#videoID').val();

      console.log('video-id', video_id);

      var url = siteUrl + 'mentor/uploadvideo';

      var formData = new FormData();
      formData.append('posterUpload', file);
      formData.append('user_id', user_id);
      formData.append('video_id', video_id);

      var success = function(val){
        //alert(data);
        thisdiv.parent().parent().find('.progress').find('.progress-bar').hide();
        thisdiv.parent().parent().find('.progress').css('height','auto').html('<div class="alert alert-success w-100" role="alert">'+ val +'</div>');

        var html = '<img src="'+siteUrl+'assets/uploads/files/'+val+'" alt="" />'

        thisdiv.parent().parent().find('#previewPoster').addClass('mb-3').html( html );
        //console.log("selesai");
      }

      ajaxFunction(url, formData, thisdiv, success);

      console.log(file);
    });

    $('#formUploadVideo input[name="videomentor"]').on('change',function(){
      var thisdiv           = $(this);
      var file              = $(this)[0].files[0];
      var user_id           = $('#formUploadVideo input[name="user_id"]').val();
      var video_id          = $('#videoID').val();
      var video_description = $(this).parent().parent().find('#video_description').val();
      var data_id           = $(this).parent().parent().data('id');
      //var progress          = thisdiv.parent().parent().find('.progress').find('.progress-bar').attr('style','width:'+ percentComplete +'%' );

      console.log('video-id', video_id);

      var url = siteUrl + 'mentor/uploadvideo';

      var formData = new FormData();
      formData.append('videomentor',file);
      formData.append('user_id', user_id);
      formData.append('video_id', video_id);

      var success = function(val){
        //alert(data);
        thisdiv.parent().parent().find('.progress').find('.progress-bar').hide();
        thisdiv.parent().parent().find('.progress').css('height','auto').html('<div class="alert alert-success w-100" role="alert">'+ val +'</div>');

        $.get( siteUrl + "mentor/preview", function( val ) {
          thisdiv.parent().parent().find('#preview').addClass('mb-3').html( val );
        });
        //console.log("selesai");
      }

      ajaxFunction(url, formData, thisdiv, success);

      console.log(file);
    });

    //button submit

    $('.additional-video').each(function(e){
      if ($('.additional-video #mainVideo:not(".d-none")')) {
        var textarea = $('.additional-video #mainVideo .upload-box-description textarea').val();

        if (textarea == '') {
          $('input[name="submitVideo"]').attr('type','button').click(function() {
            var emptytextarea = $('#mainVideo:not(".d-none") textarea');
            if (emptytextarea.val() == '') {
              emptytextarea.not('is-valid').addClass('is-invalid');
              //alert('tambah class bawah');
            }
          });
          $('textarea[name="video_description[]"]').on('change',function(){
            $('input[name="submitVideo"]').attr('type','submit');
          })
        }
      }
    });

    $('input#filemateri').on('change',function(){
      var thisfield = $(this);
      var x         = document.getElementById("filemateri");
      var files     = x.files;
      var videoID   = $('input#videoID').val();
      var userID    = $('input[name="user_id"]').val();

      var formData = new FormData();
      formData.append('video_id', videoID);
      formData.append('user_id', userID);

      for (var i = 0; i < files.length; i++) {
        formData.append('filemateri[]',files[i]);
      }

      var url       = siteUrl +'mentor/uploadvideo';
      var data      = formData;
      var progress  = $(this);
      var success   = function(val){
        thisfield.parent().parent().find('.progress').find('.progress-bar').hide();
        thisfield.parent().parent().find('#preview').find('.row').prepend(val);
        console.log(val);
      }

      ajaxFunction(url, data, progress, success);


      console.log('data id saya: '+ userID);
    })

  });

  //START MENTOR UPDATE VIDEO

  $('#video-editor .btn-action .btn-edit').click(function(e){
    e.preventDefault();
    var countvideo = $('#video-editor .video-edit').length;
    var id = $(this).data('id');

    for (var i = 0; i < countvideo; i++) {
      if (id == i) {
        $(this).parent().parent().parent().find('.video-edit').toggleClass('d-none');

        $(this).html('<i class="fa fa-minus-square"></i> Minimize');

        if ($(this).parent().parent().parent().find('.video-edit').hasClass('d-none')) {
          $(this).html('<i class="fa fa-edit"></i> Edit');
        }

      }
    }
  });

  $('#listVideoParent').each(function(){

    var textarea = $('textarea#video_description').length;

    for (var i = 0; i <= textarea; i++) {

      var text2 = $('#listVideoParent #video-editor:nth-child('+ i +') textarea').data('string');

      $('#listVideoParent #video-editor:nth-child('+ i +') textarea').text(text2);

    };

    $('textarea#video_description').on('change',function(){
      var value = $(this).val();
      var id    = $(this).data('id');

      $.post(siteUrl + 'mentor/updatevideo',{video_description : value, mentor_video_id: id})
      .done(function(val){
        if (val == 1) {
          alert('Deskripsi berhasil update');
        }else {
          alert('Deskripsi gagal update');
        }
      })
    })
  });

  $('#updateVideoClass').each(function(){

    var textarea = $('#updateVideoClass textarea').length;

    for (var i = 0; i <= textarea; i++) {

      var text2 = $('#updateVideoClass .textarea textarea').data('string');

      $('#updateVideoClass .textarea textarea').text(text2);

    }

    //console.log('cek textarea '+ textarea);

  })

  $('a#btnDeleteListVideo').click(function(e){
    e.preventDefault();

    if (confirm('Apakah anda yakin akan menghapus video ini?')) {
      var id    = $(this).data('id');
      var pid    = $(this).data('parent');
      var slug  = $(this).data('slug');

      window.location.href = siteUrl + 'mentor/deletelistvideo/'+ pid +'/'+ id +'/'+ slug;
    }
  })


  $('#mentorClassUpdate').click(function(){
    $('#updateVideoClass').submit();
  })

  $('input[name="poster"]').on('change',function(){

    var thisInput = $(this);

    var file  = $(this)[0].files[0];
    var id    = thisInput.data('id');

    var formData = new FormData();
    formData.append('poster',file);
    formData.append('mentor_class_id', id);

    $.ajax({
      url: siteUrl + 'mentor/updatevideo',
      type:'POST',
      contentType: false,
      cache: false,
      processData: false,
      data: formData,
      success: function(data){
        if (data == 1) {
          window.location.reload()
        }else {
          alert(data);
        }
      }
    });

    return false;

  });

  // UPLOAD LIST VIDEO
  $('input#uploadlistVideo[name="videolist"]').on('change',function(){
    var thisInput = $(this);
    var file  = $(this)[0].files[0];
    var id    = $(this).data('id');
    var uid   = $(this).data('user');

    var formData = new FormData();
    formData.append('videomentor',file);
    formData.append('video_id', id);
    formData.append('user_id', uid);

    $.ajax({
      url: siteUrl + 'mentor/uploadvideo',
      type:'POST',
      contentType: false,
      cache: false,
      processData: false,
      data: formData,
      xhr: function()
      {
        var jqXHR = null;
        if (window.ActiveXObject) {
          jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
          jqXHR = new XMLHttpRequest();
        }

        //var jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");

        //Upload progress
        jqXHR.upload.addEventListener("progress",function(evt){
          if(evt.lengthComputable){
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something upload progress
            thisInput.parent().parent().find('.progress').find('.progress-bar').attr('style','width:'+ percentComplete +'%' );
            console.log('Upload percent', percentComplete);
          }
        }, false);

        //Download Progress
        jqXHR.addEventListener( "progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something Download progress
            console.log('Download percent', percentComplete);
          }
        }, false);

        return jqXHR;
      },
      success : function(data){
        //alert(data);
        thisInput.parent().parent().find('.progress').find('.progress-bar').hide();
        thisInput.parent().parent().find('.progress').css('height','auto').html('<div class="alert alert-success w-100" role="alert">'+ data +'</div>');

        setTimeout(function(){ window.location.reload(); }, 3000);



        //console.log("selesai");
      }
    })

  })



  // UPDATE THRILLER
  $('input#thrillerUpdate').on('change',function(){

    var thisInput = $(this);

    var file  = $(this)[0].files[0];
    var id    = $('input[name="thrillerID"]').val();

    var formData = new FormData();
    formData.append('thriller',file);
    formData.append('mentor_class_id', id);

    $.ajax({
      url: siteUrl + 'mentor/updatevideo',
      type:'POST',
      contentType: false,
      cache: false,
      processData: false,
      data: formData,
      xhr: function()
      {
        var jqXHR = null;
        if (window.ActiveXObject) {
          jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
          jqXHR = new XMLHttpRequest();
        }

        //var jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");

        //Upload progress
        jqXHR.upload.addEventListener("progress",function(evt){
          if(evt.lengthComputable){
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something upload progress
            thisInput.parent().parent().find('.progress').find('.progress-bar').attr('style','width:'+ percentComplete +'%' );
            console.log('Upload percent', percentComplete);
          }
        }, false);

        //Download Progress
        jqXHR.addEventListener( "progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something Download progress
            console.log('Download percent', percentComplete);
          }
        }, false);

        return jqXHR;
      },
      success : function(data){
        //alert(data);
        //thisdiv.parent().parent().find('.progress').find('.progress-bar').hide();
        //thisdiv.parent().parent().find('.progress').css('height','auto').html('<div class="alert alert-success w-100" role="alert">'+ data +'</div>');
        if (data == 1) {
          window.location.reload();
        }else {
          alert(data);
          window.location.reload();
        }

        //console.log("selesai");
      }
    })

  });

  //UPDATE LIST VIDEO
  $('#formUploadVideo input[name="videolist"]').on('change',function(){
    var thisdiv           = $(this);
    var file              = $(this)[0].files[0];
    var video_id          = thisdiv.data('id');
    var oldvideo          = thisdiv.data('oldvideo');

    console.log('video-id', video_id);

    var formData = new FormData();
    formData.append('video_list',file);
    formData.append('mentor_video_id', video_id);
    formData.append('old_video', oldvideo);

    $.ajax({
      url: siteUrl + 'mentor/updatevideo',
      type:'POST',
      contentType: false,
      cache: false,
      processData: false,
      data: formData,
      xhr: function()
      {
        var jqXHR = null;
        if (window.ActiveXObject) {
          jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");
        }
        else
        {
          jqXHR = new XMLHttpRequest();
        }

        //var jqXHR = new window.ActiveXObject("Microsoft.XMLHTTP");

        //Upload progress
        jqXHR.upload.addEventListener("progress",function(evt){
          if(evt.lengthComputable){
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something upload progress
            thisdiv.parent().parent().find('.progress').find('.progress-bar').attr('style','width:'+ percentComplete +'%' );
            console.log('Upload percent', percentComplete);
          }
        }, false);

        //Download Progress
        jqXHR.addEventListener( "progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
            //Do something Download progress
            //console.log('Download percent', percentComplete);
          }
        }, false);

        return jqXHR;
      },
      success : function(data){
        //alert(data);
        thisdiv.parent().parent().find('.progress').find('.progress-bar').hide();
        thisdiv.parent().parent().find('.progress').css('height','auto').html('<div class="alert alert-success w-100" role="alert">'+ data +'</div>');

        // $.get( siteUrl + "admin/mentor/preview/"+ video_id, function( data ) {
        //   thisdiv.parent().parent().parent().parent().parent().parent().find('#preview').addClass('mb-3').html( data );
        // });

        //alert(data);

        window.location.reload();
        //console.log("selesai");
      }
    });

    return false;

    //console.log(file);
  });

  //END MENTOR UPDATE VIDEO

  //FORGOT PASSWORD
  $('#forgotPassword').click(function(e){
    e.preventDefault();

    $('#loginBox').addClass('d-none');
    $('#forgotPasswordBox').removeClass('d-none');

  });

  $('#forgotPasswordBox button[name="buttonBack"]').click(function(e){
    e.preventDefault();

    $('#loginBox').removeClass('d-none');
    $('#forgotPasswordBox').addClass('d-none');

  });

})
