<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
	/*body {
    margin: 0;
    background: #000; 
  }*/
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
    background: url('{{ url("images/bg_poster_video.png") }}') no-repeat;
    background-size: cover;
    transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}

#polina { 
  /*font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;*/
  font-weight:100; 
  background: rgba(0,0,0,0.3);
  color: yellow;
  padding: 2rem;
  width: 40%;
  margin:2rem;
  float: right;
  font-size: 1.2rem;
}
#polina button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: yellow;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
   text-decoration:none;
}

#polina p.narasiputih{ 
  /*font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;*/
  color:white;
}

#polina p.develop{ 
  /*font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;*/
  color:white;
  font-size: 7pt;
}


/*-----------------------------------------*/
.account a {
  color: #D1D1D1;
  font-size: 14px;
}
.account a:hover {
  color: #ffffff;
  text-decoration: none;
}
.account .backstretch:before {
  background-color: rgba(15, 15, 15, 0.6);
  content: "";
  height: 100%;
  position: absolute;
  width: 100%;
}
.account .form-signin {
  margin: 0 auto;
  max-width: 330px;
}
.account .form-signin .form-control:focus {
  z-index: 2;
}
.account .form-signin input[type="text"] {
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
  margin-bottom: -1px;
}
.account .form-signin input[type="password"] {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  margin-bottom: 10px;
}
.account .account-wall {
  margin-top: 40%;
  padding: 20px 20px 10px;
  position: relative;
}
.account .login-title {
  color: #555555;
  display: block;
  font-size: 22px;
  font-weight: 400;
}
.account .profile-img {
  display: block;
  height: 96px;
  margin: 0 auto 10px;
  width: 96px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.account .select-img {
  display: block;
  height: 75px;
  margin: 0 30px 10px;
  width: 75px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.account .select-name {
  display: block;
  margin: 30px 10px 10px;
}
.account .logo-img {
  display: block;
  height: 96px;
  margin: 0 auto 10px;
  width: 96px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.account .btn.btn-lg {
  font-size: 15px;
  padding: 8px 48px 6px;
}
.account .btn.btn-lg.btn-fb {
  font-size: 15px;
  padding: 8px 48px 0px;
}
.account .user-img {
  color: #ffffff;
  display: block;
  font-size: 75px;
  left: 0;
  margin-bottom: 5px;
  margin-left: auto;
  margin-right: auto;
  position: absolute;
  right: 0;
  text-align: center;
  top: -80px;
}
.account .social-btn {
  padding-top: 50px;
}
.account .btn-block i {
  margin-top: .1em;
}
.account .form-signup {
  margin: 0 auto;
  max-width: none;
}
.account .form-signup .form-control:focus {
  z-index: 2;
}
.account .form-signup input[type="text"] {
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
  margin-bottom: -1px;
}
.account .form-signup input[type="password"] {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  margin-bottom: 10px;
}
.account .form-signup #submit-form {
  display: block;
  margin: auto;
}
.account .form-signup .social-btn .btn {
  font-size: 15px;
  height: 35px;
  padding: 8px 20px;
}
.account .form-signup .terms {
  color: #ffffff;
  margin-bottom: 10px;
  overflow: hidden;
  padding-top: 5px;
}
.account .form-password {
  display: none;
}
.account #lockscreen-block .account-wall {
  margin-top: 240px;
  width: 1100px;
}
.account #lockscreen-block .user-image {
  float: left;
  position: relative;
  width: 25%;
}
.account #lockscreen-block .user-image img {
  border: 3px solid rgba(255, 255, 255, 0.2);
  display: block;
  float: right;
  margin-top: -10px;
  max-width: 132px;
}
.account #lockscreen-block .form-signin {
  float: left;
  padding-left: 30px;
  position: relative;
  width: 75%;
}
.account #lockscreen-block h2 {
  color: #ffffff;
  font-family: 'Lato', arial;
  font-weight: 100;
  margin-top: 0;
}
.account #lockscreen-block p {
  color: #CFCFCF;
  color: #ffffff;
}
.account #lockscreen-block .input-group .form-control {
  -webkit-border-radius: 17px 0 0 17px;
  -moz-border-radius: 17px 0 0 17px;
  border-radius: 17px 0 0 17px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
.account #lockscreen-block .input-group .btn {
  -webkit-border-radius: 0 17px 17px 0;
  -moz-border-radius: 0 17px 17px 0;
  border-radius: 0 17px 17px 0;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
}
.account #lockscreen-block #loader {
  left: auto;
  margin: auto;
  position: absolute;
  right: -1px;
  top: -11px;
  width: 133px;
}

.navbar-default {
    background-color: #000000;
    border-color: #e7e7e7;
}

.navbar-default .navbar-nav>li>a {
    color: #fff;
}

.img-center{
  margin: 0 auto;
}
/*h1 {
  font-size: 3rem;
  text-transform: uppercase;
  margin-top: 0;
  letter-spacing: .3rem;
}
#polina button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: #fff;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
}

a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  background:rgba(0,0,0,0.5);
  padding: .5rem;
  transition: .6s background; 
}
a:hover{
  background:rgba(0,0,0,0.9);
}
@media screen and (max-width: 500px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 800px) {
  html { background: url(//demosthenes.info/assets/images/polina.jpg) #000 no-repeat center center fixed; }
  #bgvid { display: none; }
}*/
</style>

<nav role="navigation" class="navbar navbar-default navbar-fixed-top topnav">
    <div class="container topnav">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                      <li>
                          <a href="#services">Pemerintah Kota Bogor - 2016</a>
                      </li>
                      
                  </ul>
              </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
</nav>
<video autoplay  poster="{{ url('images/bg_poster_video.png') }}" id="bgvid" loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
  <!--<source src="//demosthenes.info/assets/videos/polina.webm" type="video/webm">-->
  <source src="{{ url('video/TUGU_KUJANG_SSA.mp4')}}" type="video/mp4">

</video>
<div class="account">
<div class="container">
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
            <i class="user-img icons-faces-users-03"></i>
            <img src="{{ asset('images/logo.png') }}"  class="img-responsive img-center" alt="Kabupaten Bogor">
              <form class="form-signin" role="form" role="form" method="POST" action="{{ url('/login/proses') }}">            
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="append-icon">
                      <input type="text" name="username" id="name" class="form-control form-white username" placeholder="Username" value="{{ old('username') }}" required>
                      <i class="icon-user"></i>
                  </div>
                  <div class="append-icon m-b-20">
                      <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                      <i class="icon-lock"></i>
                  </div>
                  <button type="submit" id="submit-form" class="btn btn-lg btn-simtaru btn-block ladda-button" data-style="expand-left">Sign In</button>
                             
                  <div class="clearfix">
                      <p class="pull-right m-t-20"><a><input type="checkbox" name="remember"> Remember Me</a></p>
                  </div> 
              </form>
        </div>
    </div>
</div>
</div>
</div>
<!--<div id="polina">
  <h3>BOGOR TRANSPORTATION MAP – BTM</h3>
  <div class="col-md-2"><img class="img-responsive" src="{{ asset('images/kotabogor.png') }}"></div>
  
  
  <div class="col-md-10">
    <p class="narasiputih">Aplikasi yang dikembangkan untuk memudahkan para pengguna jasa transportasi publik 
    memperoleh informasi  rute transportasi publik di Kota Bogor yang telah disesuaikan dengan 
    pelaksanaan SISTEM SATU ARAH (SSA) oleh Pemerintah Kota Bogor.<br>
    Dalam aplikasi ini terdapat informasi rute pelayanan angkutan umum , sebaran fasilitas 
    publik, dan pemilihan rute tercepat bagi pengguna jalan di Kota Bogor. Pembaharuan 
    informasi akan terus dilakukan oleh Pemerintah Kota Bogor dan para pihak yang terkait.</p>
  </div>

  <p align="right" class="develop">Developed @RSMM2016</p>
  
  <a class="" href="{{ url('map') }}"><button>Masuk</button></a>
</div>-->

<!-- Main vendor Scripts-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
	
	var vid = document.getElementById("bgvid");
	var pauseButton = document.querySelector("#polina button");

	function vidFade() {
	  vid.classList.add("stopfade");
	}

	vid.addEventListener('ended', function()
	{
	// only functional if "loop" is removed 
	vid.pause();
	// to capture IE10
	vidFade();
	}); 


	/*pauseButton.addEventListener("click", function() {
	  vid.classList.toggle("stopfade");
	  if (vid.paused) {
	    vid.play();
	    pauseButton.innerHTML = "Pause";
	  } else {
	    vid.pause();
	    pauseButton.innerHTML = "Paused";
	  }
	})*/


</script>