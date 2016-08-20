
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="_token" content="{!! csrf_token() !!}"/>
	<title>Tata Ruang Kabupaten Bogor</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/capture.css" type="text/css" media="all">
	
</head>
<body>
  <div class="camera">
    <video id="video">Video stream not available.</video>
    <button id="startbutton"><i class="fa fa-camera"></i> Take Photo</button> 
  </div>
  <canvas id="canvas"></canvas>
  <input type="hidden" id="sourceImg">
  
  <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <div class="output" style="display:none">
    <img id="photo" alt="The screen capture will appear in this box."> 
  </div>
  <!--<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>-->
  <script>
  if(!window.jQuery){
     var script = document.createElement('script');
     script.type = "text/javascript";
     script.src = "vendor/jquery/jquery.min.js";
     document.getElementsByTagName('head')[0].appendChild(script);
  }
  </script>
  <script src="lib/capture.js"></script>
  <!--<script src="js/capture_chrome.js"></script>-->

  
</body>
</html>


