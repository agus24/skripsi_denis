<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="../../html/dashboards/dashboard.html">
                <span class="text-lg text-bold text-primary ">{{ Config::get('app.name') }}</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">
        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">
            <!-- BEGIN UI -->
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-cube fa-fw"></i></div>
                    <span class="title">Products</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ url('/brands') }}" ><span class="title">Merk</span></a></li>
                    <li><a href="{{ url('/produk') }}" ><span class="title">Products</span></a></li>
                </ul><!--end /submenu -->
            </li>
            <li>
                <a href="{{ url('/order') }}" >
                    <div class="gui-icon"><i class="md md-settings-ethernet"></i></div>
                    <span class="title">Order</span>
                </a>
            </li>

            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="md md-settings"></i></div>
                    <span class="title">Settings</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ url('/user') }}" ><span class="title">User Manager</span></a></li>
                    <li><a href="{{ url('/company') }}" ><span class="title">Company</span></a></li>
                    <li><a href="{{ url('/discount') }}" ><span class="title">Discount</span></a></li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        {{-- <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2017</span> <strong>Gustiawan Ouwawi</strong>
            </small>
        </div> --}}
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
