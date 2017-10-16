<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Empor | About</title>
<!-- Bootstrap -->
<link href="{{ asset('cosmetic/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/empor-icon.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/animate.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/bootstrap-slider.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/cubeportfolio.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/settings.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/bootsnav.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cosmetic/css/style.css') }}">
<link rel="icon" href="images/favicon.png">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="boxed">


<!--Pre LOADER-->
<div class="loader">
  <div id="cssload-wrapper">
    <div class="cssload-loader">
      <div class="cssload-line"></div>
      <div class="cssload-line"></div>
      <div class="cssload-line"></div>
      <div class="cssload-line"></div>
      <div class="cssload-line"></div>
      <div class="cssload-line"></div>
      <div class="cssload-subline"></div>
      <div class="cssload-subline"></div>
      <div class="cssload-subline"></div>
      <div class="cssload-subline"></div>
      <div class="cssload-subline"></div>
      <div class="cssload-loader-circle-1"><div class="cssload-loader-circle-2"></div></div>
      <div class="cssload-needle"></div>
      <div class="cssload-loading">loading</div>
    </div>
  </div>
</div>
<!--Pre LOader Ends-->

<div id="app">
  <router-view></router-view>
</div>
<!--HEADER STARTS-->

<!--HEADER ENDS-->


<!--Shopping Cart-->
<div id="sidebar-wrapper">
   <ul class="nav sidebar-nav">
      <li class="tablecart">
         <div class="photo">
            <a href="#">
               <img src="images/tablecart1.jpg" alt="">
            </a>
         </div>
         <div class="cartbody">
            <h5>Little Barrel in White</h5>
            <span>1 × $1,288.00</span>
            <i class="fa fa-close cross"></i>
         </div>
      </li>
      <li class="tablecart">
         <div class="photo">
            <a href="#">
               <img src="images/tablecart1.jpg" alt="">
            </a>
         </div>
         <div class="cartbody">
            <h5>Little Barrel in White</h5>
            <span>1 × $1,288.00</span>
            <i class="fa fa-close cross"></i>
         </div>
      </li>
      <li class="tablecart">
         <div class="photo">
            <a href="#">
               <img src="images/tablecart1.jpg" alt="">
            </a>
         </div>
         <div class="cartbody">
            <h5>Little Barrel in White</h5>
            <span>1 × $1,288.00</span>
            <i class="fa fa-close cross"></i>
         </div>
      </li>
      <li class="text-center margin40 top40">
         <div class="image-cart bottom10">
            <img src="images/shopping-cart.png" alt="">
         </div>
         <h4 class="text-uppercase">no products in the cart.</h4>
      </li>
   </ul>
   <div class="cart-bottom clearfix">
      <h5 class="pull-left top10 bottom10">SUBTOTAL</h5>
      <h5 class="pull-right top10 bottom10">$1,798.00</h5>
      <div class="clearfix"></div>
      <a class="btn btn_dark button_moema">view cart</a>
      <a class="btn btn_colored button_moema">Checkout</a>
   </div>
</div>
<!--Shopping Cart ends-->


<!-- Login starts -->
<div class="login_container fullscreen">
  <button class="close_login"><i class="fa fa-close"></i></button>
  <div class="row">
    <div class="col-sm-6">
       <div class="image"><img src="images/login-container.jpg" alt=""></div>
    </div>
    <div class="col-sm-6">
      <div class="contentform">
    <ol class="breadcrumb_simple text-center heading_space">
      <li><a href="#">My Account</a></li>
      <li><a href="#">My Wishlist</a></li>
      <li class="active">My Cart</li>
      <li><a href="#">Checkout</a></li>
    </ol>
    <div class="logintabbed bottom30">
      <ul class="nav nav-tabs nav-justified heading_space" role="tablist">
        <li role="presentation" class="active"><a href="#registered" aria-controls="registered" role="tab" data-toggle="tab">Already Registered</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">New to empor ?</a></li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="registered">
          <form class="callus">
            <div class="form-group">
              <label>EMAIL ADDRESS</label>
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label>PASSWORD </label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="checkbox" name="check-box">
                  <span>Remember Me</span>
                </div>
              </div>
              <div class="col-sm-6 text-right">
                <a href="#" class="lost-pass">Lost your password?</a>
              </div>
            </div>
            <button type="submit" class="btn btn_dark btn_full">login</button>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="profile">
          <form class="callus">
            <div class="form-group">
              <label>Name </label>
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <label>EMAIL ADDRESS</label>
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label>PASSWORD </label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn_dark btn_full">Register</button>
          </form>
        </div>
      </div>
    </div>
    <div class="hr_head"><span>OR</span></div>
    <div class="share_with text-center top30">
      <h5 class="bottom20">SIGN IN WITH...</h5>
      <a href="#." class="facebook"><i class="icon-facebook-1"></i> Facebook </a>
      <a href="#." class="twitter"><i class="icon-twitter-1"></i> twitter</a>
      <a href="#." class="google"><i class="icon-google4"></i> google +</a>
    </div>
  </div>
    </div>
  </div>
</div>
<!-- Login end -->


<!--Search-->
<div id="search">
  <button type="button" class="close">×</button>
  <form class="centered clearfix">
    <input type="search" value="" placeholder="Search here...."  required/>
    <button type="submit" class="btn-search"><i class="icon-icons185"></i></button>
  </form>
</div>

<!--Footer Starts-->

<!--Footer Ends-->


<script src="{{ asset('cosmetic/jquery.2.2.3.min.js')}}"></script>
<script src="{{ asset('cosmetic/bootstrap.min.js')}}"></script>
<script src="{{ asset('cosmetic/bootsnav.js')}}"></script>
<script src="{{ asset('cosmetic/jquery.appear.js')}}"></script>
<script src="{{ asset('cosmetic/jquery-countTo.js')}}"></script>
<script src="{{ asset('cosmetic/jquery.cubeportfolio.min.js')}}"></script>
<script src="{{ asset('cosmetic/footer-reveal.min.js')}}"></script>
<script src="{{ asset('cosmetic/jquery.matchHeight-min.js')}}"></script>
<script src="{{ asset('cosmetic/owl.carousel.min.js')}}"></script>
<script src="{{ asset('cosmetic/viedobox_video.js')}}"></script>
<script src="{{ asset('cosmetic/bootstrap-slider.min.js')}}"></script>
<script src="{{ asset('cosmetic/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('cosmetic/select.js')}}"></script>
<script src="{{ asset('cosmetic/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('cosmetic/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('cosmetic/revolution.extension.actions.min.js')}}"></script>
<script src="{{ asset('cosmetic/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('cosmetic/revolution.extension.navigation.min.js')}}"></script>
<script src="{{ asset('cosmetic/revolution.extension.parallax.min.js')}}"></script>
<script src="{{ asset('cosmetic/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('cosmetic/revolution.extension.video.min.js')}}"></script>
<script src="{{ asset('cosmetic/functions.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
