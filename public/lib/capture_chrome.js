(function(){
  var mediaOptions = { audio: false, video: true };
  var video = document.querySelector("#video");
  video.autoplay="true";
  if (!navigator.getUserMedia) {
      navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
  }
 
  if (!navigator.getUserMedia){
    return alert('getUserMedia not supported in this browser.');
  }
 
  navigator.getUserMedia(mediaOptions, success, function(e) {
    console.log(e);
  });
 
  function success(stream){
    
    video.src = window.URL.createObjectURL(stream);
  }
})();