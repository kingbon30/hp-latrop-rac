@extends('user/layouts/app')

@section('head')
    <style type="text/css">
      .carousel-item {
        height: 65vh;
        min-height: 300px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
    </style>
@endsection

@section('header')
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('{{ asset('asset-user/images/banner.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset('asset-user/images/banner-2.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset('asset-user/images/banner-3.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
@endsection

@section('container')
    <!-- Page Content -->
    <div class="container">
      
      <div class="row">
        <div class="col-lg-8 my-4">
            <div class="card h-100">
              <h6 class="card-header">Search</h6>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <input class="form-control" name="Search" placeholder="Search for brands, models, year, etc.." type="text">
                  </div>
                  <div class="form-group">
                    <div class="form-row align-items-center">
                      <div class="col-auto">
                        <div class="input-group mb-5">
                          <div class="input-group-prepend">
                            <div class="input-group-text">₱</div>
                          </div>
                          <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="PHP">
                          <div class="input-group-prepend">
                            <div class="input-group-text">.00</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="form-check mb-2">
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="input-group mb-5">
                          <div class="input-group-prepend">
                            <div class="input-group-text">₱</div>
                          </div>
                          <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="To PHP">
                          <div class="input-group-prepend">
                            <div class="input-group-text">.00</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" >Apply</button>
                  </div>
                </form>
              </div>
            </div>
        </div>        
        <div class="col-lg-4 my-4">
            <div class="card h-100">
              <h6 class="card-header">Login</h6>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                  </div>
                    <small id="fileHelp" class="form-text text-muted">Don't have account? <a href="register" style="text-decoration: none">Register</a><div></div></small>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
        </div>
      </div> 
      

      <hr>
      <!-- Featured Section -->
      <h2 style=""><i class="fa fa-car "></i> Featured Cars</h2>
      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Kia Carnival</a>
              </h4>
              <p class="card-text car-portal-ph-card">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Two</a>
              </h4>
              <p class="card-text car-portal-ph-card">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text car-portal-ph-card">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text car-portal-ph-card">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text car-portal-ph-card">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title ">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text car-portal-ph-card">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      
      <hr>
      <h2 class="my-4"><i class="fas fa-newspaper "></i> News</h2>
      <!-- News Section -->
      <div class="row">
        @foreach($latest_posts as $blog_post)
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
            <h5>{{ $blog_post->blog_post_title}}</h5>
              <p class="card-text">{!! htmlspecialchars_decode(str_limit($blog_post->blog_post_body, $limit = 100, $end = '...'),ENT_NOQUOTES) !!}</p>
            </div>
            <div class="card-footer">
              <a href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- /.row -->


      <!-- Offered Section -->
      <hr>
      <h2 class="my-4"><li class="fas fa-handshake"></li> Want To Sale Your Car ?</h2>
      <div class="row">
        <div class="col-lg-6">
          <h5>Are you looking for a car?</h5>
          <p>Search your car in our Inventory and request a quote on the vehicle of your choosing.</p>
          <img class="img-fluid rounded" src="{{ asset('asset-user/images/sell.png')}}" alt="">
        </div>
        <div class="col-lg-6">
          <h5>Do you want to sell your car?</h5>
          <p>Request search your car in our Inventory and a quote on the vehicle of your choosing.</p>
          <img class="img-fluid rounded" src="{{ asset('asset-user/images/sell-1.png')}}" alt="">
        </div>
      </div>
      <!-- /.row -->

      <!-- Services Section -->
      <hr>
      <h2 class="my-4"><i class="fa fa-cog"></i> Our Services</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur saepe soluta quos repellendus vero, consectetur recusandae debitis. Rerum nesciunt repellat architecto iusto sunt quidem perspiciatis nisi quisquam reprehenderit alias, id.</p>
      <div class="row">
        <div class="col-lg-4">
            <h4><i class="fa fa-tachometer"></i> Engine Upgrades</h4>
            <p class="card-text">We have the right caring, experience and dedicated professional for you.</p>
            <h4><i class="fa fa-cog"></i> Car Inspection</h4>
            <p class="card-text">We have the right caring, experience and dedicated professional for you.</p>
            
        </div>
        <div class="col-lg-4">
          <img class="img-fluid rounded" src="{{ asset('asset-user/images/service-car.png')}}" alt="">
        </div>
        <div class="col-lg-4">
          <h4 ><i class="fas fa-oil-can"></i> Car Oil Change</h4>
            <p class="card-text">We have the right caring, experience and dedicated professional for you.</p>
            <h4><i class="fas fa-charging-station"></i> Power steering</h4>
            <p class="card-text">We have the right caring, experience and dedicated professional for you.</p>
        </div>
      </div>
      <!-- /.row -->

      <hr>
      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-success btn-block " href="#"><i class="fab fa-android"></i> Download App</a>
        </div>
      </div>
    </div>
    <!-- /.container -->
@endsection
