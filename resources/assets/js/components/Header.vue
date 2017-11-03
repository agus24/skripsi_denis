<template>
  <header class="default">
    <nav class="navbar navbar-default navbar-sticky bootsnav">
      <div class="container">
        <div class="side_item">
          <ul class="cols selection">
            <li><a class="login_toggle" href="#">Login</a></li>
          </ul>
          <div class="cols">
            <ul class="empr_nav">
              <li><a href="#."><i class="icon-heart3"></i></a></li>
              <li class="search_btn"><i class="icon-icons185"></i></li>
              <li><a href="#."><i class="icon-icons9"></i></a></li>
              <li><a href="javascript:void(0)" class="hamburger is-closed" data-toggle="offcanvas"><i class="icon-icons102"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Start Header Navigation -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                  <i class="fa fa-bars"></i>
              </button>
          <a class="navbar-brand" href="index.html">King Tire</a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="nav navbar-nav navbar-left" data-in="fadeIn" data-out="fadeOut">
            <li><a href="#">Home</a></li>
            <li><a href="#">Demos</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    </nav>
  </header>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
