(function() {
  // The width and height of the captured photo. We will set the
  // width to the value defined here, but the height will be
  // calculated based on the aspect ratio of the input stream.

  var width = 320;    // We will scale the photo width to this
     // This will be computed based on the input stream
  var height = 240;
  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  var streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  var video = null;
  var canvas = null;
  var photo = null;
  var sourceImg = null;
  var startbutton = null;
  var mediaOptions = null;

  var hdConstraints = {
    video: {
      mandatory: {
        minWidth: 1280,
        minHeight: 720
      }
    }
  };

  var vgaConstraints = {
    video: {
      mandatory: {
        maxWidth: 640,
        maxHeight: 360
      }
    }
  };
  var imgStore = '';

  function startup() {
    video = document.getElementById('video') || document.querySelector("#video");;
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
  
    sourceImg = document.getElementById('sourceImg');
    startbutton = document.getElementById('startbutton');
    mediaOptions = { audio: false, video: true };
    width = $(window).width();

    navigator.getMedia = ( navigator.getUserMedia ||
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);

    if (!navigator.getMedia){
      return alert('getUserMedia not supported in this browser.');
    }
    navigator.getMedia(mediaOptions,streamingV,
      function(err) {
        console.log("An error occured! " + err);
        console.log(err);
      }
    );

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
      
        // Firefox currently has a bug where the height can't be read from
        // the video, so we will make assumptions if this happens.
      
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        //canvas.setAttribute('width', width);
        //canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startbutton.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);
    
    clearphoto();


  }

  // Fill the photo with an indication that none has been
  // captured.

  function streamingV(stream) {
      video.media="(orientation:portrait)";
      if (navigator.mozGetUserMedia) {
          video.mozSrcObject = stream;
      }else if(navigator.webkitGetUserMedia){
          video.autoplay="true";
          video.src = window.URL.createObjectURL(stream);
      } else {
          video.autoplay="true";
          var vendorURL = window.URL || window.webkitURL;
          video.src = vendorURL.createObjectURL(stream);
      }
      video.play();
  }

  function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }
  
  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    var context = canvas.getContext('2d');
    var img='';
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
      sourceImg.setAttribute('value', data);
      var tablename = $('input[name=tablename]').val();
      var ts =tablename.split('|');

        $.ajax({
            url: 'imagestring',
            type: "post",
            data: {'data':data, '_token': $('input[name=_token]').val()},
            success: function(data){
              console.log(data);
              $.ajax({
                  url: 'editGeotagFoto',
                  type: "post",
                  data: {
                    'objectid': $('input[name=objectid]').val(),
                    'foto': data,
                    '_token': $('input[name=_token]').val()
                  },
                  beforeSend: function (xhr) {
                      var token = $('meta[name="csrf_token"]').attr('content');

                      if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                      }
                  },
                  success: function (argument) {
                      console.log(argument);
                      window.close();
                      
                  }
              });
            }
        });
      
    } else {
      clearphoto();
    }
  }

  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
  



})();
