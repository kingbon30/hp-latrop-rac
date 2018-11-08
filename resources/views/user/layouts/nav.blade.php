    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="{{asset('asset-user/images/logo.png')}}" width="150" height="30" alt="">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link "  href="/">Home</a>
            </li>
            <li class="nav-item {{ Request::is('vehicles') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/vehicles') }}">Vehicles</a>
            </li>
            <li class="nav-item {{ Request::is('car-parts') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/car-parts') }}">Car Parts</a>
            </li>
            <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
            </li>
            <li class="nav-item {{ Request::is('dealer') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/dealer') }}">Dealer</a>
            </li>
            
            
          </ul>
        </div>
      </div>
    </nav>