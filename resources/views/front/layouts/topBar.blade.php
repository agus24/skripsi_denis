@if(Auth::guard('customer')->guest())
 <li>
    <a data-rel="loginModal" href="#">
        <i class="fa fa-user"></i> Login
    </a>
</li>
<li>
    <a data-rel="registerModal" href="#">
        <i class="fa fa-user"></i> Register
    </a>
</li>
@else
<li>
    <a href="#" class="dropdown-hover sf-with-ul">
        <i class="fa fa-user"></i>
        {{ Auth::guard('customer')->user()->nama }}
        <ul class="dropdown-menu">
            <li><a href="{{ url('user/compare') }}"><i class="fa fa-refresh"></i> Compare</a></li>
            <li><a href="{{ url('user/transaction') }}"><i class="fa fa-exchange"></i> Transaction</a></li>
            <li><a href="{{ url('user/profile') }}"><i class="fa fa-user"></i> Profile</a></li>
            <div class="divider"></div>
            <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
    </a>
</li>
@endif
