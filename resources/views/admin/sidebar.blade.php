<ul class="metismenu" id="side-menu">

    <!--<li class="menu-title">Navigation</li>-->

    <li>
        <a href="{{route('home')}}">
            <i class="fi-air-play"></i><span> Dashboard </span>
        </a>
    </li>
    @if (auth()->user()->role == '2')
        <li>
            <a href="{{ route('emailoffer') }}">
                <i class="fi-mail"></i><span> Email Offer </span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Category </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('category.index')}}">Add Category</a></li>
                <li><a href="{{ route('category.create')}}">List Category</a></li>

            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Vendor </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('vendor.index')}}">Add Vendor</a></li>
                <li><a href="{{ route('vendor.create')}}">List Vendor</a></li>

            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="fi-layers"></i> <span>  Cupon </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('cupon.index')}}">Add Cupon</a></li>
                <li><a href="{{ route('cupon.create')}}">List Cupon</a></li>

            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="fi-layers"></i> <span>  Location </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('location') }}">Add Location</a></li>
                <li><a href="">List Cupon</a></li>

            </ul>
        </li>
    @elseif (auth()->user()->role == '3')
    <li>
        <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Product </span> <span class="menu-arrow"></span></a>
        <ul class="nav-second-level" aria-expanded="false">
            <li><a href="{{ route('product.index')}}">Add Product</a></li>
            <li><a href="{{ route('product.create')}}">List Product</a></li>

        </ul>
    </li>
    @endif







</ul>
