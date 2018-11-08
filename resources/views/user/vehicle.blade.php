@extends('user/layouts/app')

@section('container')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio Item</li>
      </ol>

      <div class="row">
        <div class="col-sm-8">
          <h3>Vehicle Name asfdasdasdsa 2018</h3>
        </div>
        <div class="col-sm-4"> 
          <h3>P 10000 <small>Negotiable</small></h3>    
        </div>
      </div>
      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x550" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x550" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x550" alt="Third slide">
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
          

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <img class="img-fluid" width="30" src="{{asset('asset-user/images/mileage.png')}}" >
                  <small class="text-truncate">Mileage</small>
                  <br>
                  <span class="font-weight-bold">43,961 Km</span>
                </div>
                <div class="col">
                  <img class="img-fluid" width="30" src="{{asset('asset-user/images/transmission.png')}}" >
                  <small class="text-truncate">Transmission</small>
                  <br>
                  <span class="font-weight-bold">Automatic</span>
                </div>
                <div class="col">
                    <img class="img-fluid" width="30" src="{{asset('asset-user/images/fuel-type.png')}}" >
                    <small class="text-truncate">Fuel type</small>
                    <br>
                    <span class="font-weight-bold">Gasoline</span> 
                </div>
                <div class="col">
                  <img class="img-fluid" width="30" src="{{asset('asset-user/images/engine-size.png')}}" >
                  <small class="text-truncate">Engine size</small>
                  <br>
                  <span class="font-weight-bold">3.0 L</span>
                </div>
              </div>
            </div>
          </div>
          
          <br>
              <div class="list-group">
                <!-- Details -->
                <a href="#details" data-toggle="collapse" class="list-group-item list-group-item-action d-flex justify-content-between" aria-expanded="false">
                  Specefic Details
                  <i class="fa fa-arrow-right"></i>
                </a>
                <div id="details" class="collapse" style="">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Color Family
                      <span class="">Brown</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Condition
                      <span class="">New</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Drive Type
                      <span class="">asd </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Doors
                      <span class="">asd</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Seats
                      <span class="">ad</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Edition
                      <span class=""></span>
                    </li>
                  </ul>
                </div>


                <a href="#features" data-toggle="collapse" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center collapsed" aria-expanded="false">
                  Features
                  <i class="fa fa-arrow-right"></i>
                </a>
                <div id="features" class="collapse" style="">
                    <li class="list-group-item d-flex justify-content-between align-items-center ">
                    </li>
                </div>
  
                <a href="#description" data-toggle="collapse" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center collapsed" aria-expanded="false">
                  Description
                  <i class="fa fa-arrow-right"></i>
                </a>
                <div id="description" class="collapse" style="text-align: justify;">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus porro minus eaque fuga earum explicabo, cupiditate autem quaerat eveniet nesciunt facere, atque! Esse in vero quae iure laudantium dolorum tempora?</p>
                  </li>
                </div>

          </div>

        </div>

        <div class="col-md-4 my-4">
          <div class="card">
            <div class="card-header"><i class="fa fa-envelope"></i> Send Inquiry</div>
            <div class="card-body">
               <form>
                  <div class="form-group">
                    <input class="form-control" placeholder="Name" required="" type="text">
                  </div>

                  <div class="form-group">
                    <input class="form-control" placeholder="Email" required="" type="text">
                  </div>

                  <div class="form-group">
                    <input class="form-control" placeholder="Mobile Number" required="" type="text">
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" placeholder="Message" row="3" required=""></textarea>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn  btn-success" >Send</button>
                  </div>
                </form>
            </div>
          </div>

          <div class="card my-4">
            <div class="card-header"><i class="fa fa-user"></i> Seller Information</div>
            <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <img class="card-img" src="https://material.angular.io/assets/img/examples/shiba1.jpg" alt="Card image"/>
                  </div>
                  <div class="col-sm-6">
                    <div class="card-body-right">
                      <h5 class="card-title">John Doe</h5>
                      <p class="card-text"><i class="fas fa-map-marker-alt"></i> Quezon City, Metro Manila</p>
                    </div>
                  </div>
                </div>
                <hr>
                <button class="btn btn-success btn-block" type="button" ><i class="fa fa-phone"></i> View Seller Number</button>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
      
      <!-- Related Projects Row -->
      <h3 class="my-4">Related Vehicles</h3>

      <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection