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

  var video   = videojs(document.querySelector('.video-js'), {
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

  //var video = videojs('my-video');


  var dots          = document.getElementsByClassName('btn-indicator');
  var videoSource   = [];


  for (i = 0; i < dots.length; i++) {

    dots[i].className = dots[i].className.replace(" active", "");

    videoSource[i]   = dots[i].getAttribute("data-video");

    //console.log('jumlah dot: '+ i);
    //console.log('Data Video: '+ videoSource[i]);

  }

  //slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  video.src({type: 'video/mp4', src: 'http://www.greatindonesia.com/idtalentademo/assets/uploads/videos/'+ videoSource[slideIndex-1]});
  //console.log('Data Video: '+ dots[slideIndex-1].dataVideo);
}


videojs('my-video', null, function(){
  this.addClass('dilihat')
});
