<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">{{ Config::get('app.name') }}</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#shop">Shop</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <div id="users"></div>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <span id="userName">ASDF</span></a></li>
    </ul>
  </div>
</nav>
<div class="parallax">
  <div class="parallax image"></div>
  <div class="parallax-content text-center">
    <center>PT. {{ Config::get('app.name') }} Indonesia</center>
  </div>
</div>
<div class="clearfix"></div>
