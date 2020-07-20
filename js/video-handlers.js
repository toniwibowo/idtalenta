var slideIndex = 1;
showSlides(slideIndex);

// Next/Previous Controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail Controls
function currentSlide(n) {

  showSlides(slideIndex = n)
}

function showSlides(n) {
  var i;

  var dots          = document.getElementsByClassName('btn-indicator');
  var videoSource   = [];


  for (i = 0; i < dots.length; i++) {

    dots[i].className = dots[i].className.replace(" active", "");

    videoSource[i]   = dots[i].getAttribute("data-video");

    //console.log('jumlah dot: '+ i);
    //console.log('Data Video: '+ videoSource[i]);

  }

  if (videoSource[slideIndex-1].split('.').pop() != 'mp4') {

    

    var video = videojs('my-video', {
      controls: true,
      autoplay: true,
      preload: 'auto',
      playbackRates: [0.5, 1, 1.5, 2],
      aspectRatio: '16:9',
      breakpoints: {
        tiny: 300,
        xsmall: 400,
        small: 500,
        medium: 600,
        large: 700,
        xlarge: 800,
        huge: 900
      },
      techOrder: ["youtube"],

    });

    console.log('DATA VIDEO '+ video);

    video.src({type: 'video/youtube', src: 'https://www.youtube.com/watch?v='+ videoSource[slideIndex-1]});



  }else {
    var video = videojs(document.querySelector('.video-js'), {
      controls: true,
      autoplay: true,
      preload: 'auto',
      playbackRates: [0.5, 1, 1.5, 2],
      aspectRatio: '16:9',
      breakpoints: {
        tiny: 300,
        xsmall: 400,
        small: 500,
        medium: 600,
        large: 700,
        xlarge: 800,
        huge: 900
      }
    });

    console.log('DATA VIDEO '+ JSON.stringify(video));

    video.src({type: 'video/mp4', src: 'http://www.greatindonesia.com/idtalentademo/assets/uploads/videos/'+ videoSource[slideIndex-1]});
  }



  //slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";

  //console.log('Data Video: '+ dots[slideIndex-1].dataVideo);
  console.log('PATHINFO_EXTENSION '+ videoSource[slideIndex-1].split('.').pop());
}


videojs('my-video', null, function(){
  this.addClass('dilihat')
});
