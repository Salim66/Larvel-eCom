<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('front/assets/dist/img/ecom.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/home') }}">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
              @if(Auth::check())
                <a class="dropdown-item" href="#">{{ Auth::user()->name; }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
              @else
                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
              @endif

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?php  $cats = DB::table('categories')->get(); ?>
                     @foreach($cats as $cat)
                  <a class="dropdown-item" href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a>

                   @endforeach

                </div>
              </li>
          </div>
        </li>
      </ul>
      <li class="list-unstyled list-inline-item"><a class="text-decoration-none mr-3" href="{{ route('cart') }}"><i class="fab fa-shopping-cart">View Cart</i>({{ Cart::count() }}) ({{ Cart::total() }})</a></li>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
