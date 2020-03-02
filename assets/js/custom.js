var baseUrl = window.location.protocol +'//'+ window.location.host;
var urisegment = window.location.pathname.split('/');

// console.log(urisegment);

$(document).ready(function(){
  $('.admin-list-video i').addClass('fa fa-youtube-play');

  $('#video-editor .btn-action .btn-edit').click(function(e){
    e.preventDefault();
    var countvideo = $('#video-editor .video-edit').length;
    var id = $(this).data('id');

    for (var i = 0; i < countvideo; i++) {
      if (id == i) {
        $(this).parent().parent().find('.video-edit').toggleClass('d-none');

        $(this).html('<i class="fa fa-minus-square"></i> Minimize');

        if ($(this).parent().parent().find('.video-edit').hasClass('d-none')) {
          $(this).html('<i class="fa fa-edit"></i> Edit');
        }

      }
    }
  });

  //UPLOAD VIDEO
  $('#formUploadVideo input[name="videomentor"]').on('change',function(){
    var thisdiv           = $(this);
    var file              = $(this)[0].files[0];
    var video_id          = $('#videoID').val();

    console.log('video-id', video_id);

    var formData = new FormData();
    formData.append('videomentor',file);
    formData.append('videoid', video_id);

    $.ajax({
      url: baseUrl + '/artademidemo/admin/mentor/uploadvideo',
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

        $.get( baseUrl + "/artademidemo/admin/mentor/preview/"+ video_id, function( data ) {
          thisdiv.parent().parent().parent().parent().parent().parent().find('#preview').addClass('mb-3').html( data );
        });

        window.location.reload();
        //console.log("selesai");
      }
    });

    return false;

    //console.log(file);
  });

  //DELETE VIDEO
  $('a#btnDelete').click(function(e){
    e.preventDefault();

    if (confirm('Do you want to delete this video?')) {
      var id = $(this).data('id');

      $.post(baseUrl+'/artademidemo/admin/mentor/delete',{id: id})
      .done(function(data){
        if (data == 1) {
          window.location.reload();
        }else {
          alert('Data gagal di hapus');
        }
      })
    }

    return false;
  });

  //UPDATE VIDEO DESCRIPTION

  $('#video-edit textarea#video_description').on('change',function(){
    var description = $(this).val();
    var id = $(this).parent().find('#videoID').val();

    //alert(description+'-'+id);

    $.post(baseUrl + '/artademidemo/admin/mentor/uploadvideo',{id : id, videodescription : description})
    .done(function(data){
      if(data == 1){
        alert('Deskripsi video terupdate'+ data);
      }else {
        alert('Deskripsi video gagal terupdate'+ data);
      }
    })
  })

})
