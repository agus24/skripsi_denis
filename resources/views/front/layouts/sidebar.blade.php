<li class="current-menu-item menu-item-has-children dropdown">
    <a href="{{ url('/') }}" class="dropdown-hover">
        <span class="underline">Home</span></span>
    </a>
</li>
{{-- <li class="menu-item-has-children dropdown">
    <a href="{{ url('product/all') }}" class="dropdown-hover">
        <span class="underline">Products</span> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        @foreach($brands as $key => $brand)
        <li><a href="{{ $brand->name }}"> {{ $brand->name }} </a></li>
        @endforeach
    </ul>
</li> --}}
<li><a href="{{ url('about-us') }}"><span class="underline">About Us</span></a></li>
<li><a href="{{ url('termcondition') }}"><span class="underline">Term & Condition</span></a></li>
