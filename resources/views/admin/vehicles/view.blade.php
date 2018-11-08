@extends('admin/layouts/app')

@section('head')
<title>Vehicles - Car Portal PH</title>

@endsection

@section('content-header')
	<section class="content-header content-center">
      <h1>
        View Vehicle [{{ $vehicles->listing_id }}]
      </h1>
    </section>
@endsection

@section('content')
    <section class="content content-center">
      <div class="row">
        <div class="col-xs-12">
		    @include('admin.layouts.message')
          <div class="box box-success">
            <!-- /.box-header -->
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="box-body">
                  <dl class="dl-horizontal">
                    <dt>Make:</dt>
                    <dd>{{ $vehicles->make }}</dd>
                    <dt>Model:</dt>
                    <dd>{{ $vehicles->model }}</dd>
                    <dt>Year:</dt>
                    <dd>{{ $vehicles->year }}</dd>
                    <dt>Edition:</dt>
                    <dd>{{ $vehicles->edition }}</dd>
                    <dt>Milleage(km):</dt>
                    <dd>{{ $vehicles->milleage }}km</dd>
                    <dt>Engine(L):</dt>
                    <dd>{{ $vehicles->engine }}L</dd>
                    <dt>Transmission:</dt>
                    <dd>{{ $vehicles->transmission }}</dd>
                    <dt>Fuel:</dt>
                    <dd>{{ $vehicles->fuel }}</dd>
                    <dt>Drive Type:</dt>
                    <dd>{{ $vehicles->drivetype }}L</dd>
                    <dt>Body Type:</dt>
                    <dd>{{ $vehicles->bodytype }}</dd>
                    <dt>Color:</dt>
                    <dd>{{ $vehicles->vehicle_color }}</dd>
                    <dt>Seat(s):</dt>
                    <dd>{{ $vehicles->seat }} seater</dd>
                    <dt>Door(s):</dt>
                    <dd>{{ $vehicles->door }} door</dd>
                    <dt>Condition:</dt>
                    <dd>{{ $vehicles->condition }}</dd>
                    <dt>Price:</dt>
                    <dd>{{ $vehicles->vehicle_price }}L</dd>
                    <dt>Price Details:</dt>
                    <dd>{{ $vehicles->vehicle_price_detail }}</dd>
                    <dt>Features:</dt>
                    <dd>
                      @foreach($vehicles->features as $feature)
                        {{$feature->feature_name}} |
                      @endforeach
                    </dd>
                    <dt>Description:</dt>
                    <dd>{{ $vehicles->description }}</dd>
                    <dt>Status:</dt>
                    <dd>@if ($vehicles->vehicle_status)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-danger">Not Active</span>
                    @endif</dd>
                    <dt>Approval:</dt>
                    <dd>@if ($vehicles->vehicle_approval)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-danger">Not Active</span>
                    @endif</dd>
                    <dt>URL:</dt>
                    <dd>{{ $vehicles->vehicle_slug }}</dd>
                  </dl>
                </div>
              </div>

              <div class="col-md-6">
                <div class="box-body">
                  <dt>Images:</dt>
                  <div class="row">
                    <div class="thumbnails"  ></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="col-md-12">
                        <div class="form-group no-margin pull-right">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-print"></span> &nbsp;Print</button>
                            <button type="submit" class="btn btn-primary"><span class="fa fa-pencil"></span> &nbsp;Update</button>
                            <a href="{{ route('vehicles.index')}}" class="btn btn-default"><span class="fa fa-times-circle"></span> &nbsp;Back</a>
                        </div>
                </div>
            </div>
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<!--Preview Images Modal Content-->
  <div id="modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <img id="modalImg" src="" style="width:100%; height: 500px; object-fit: contain;" alt="" class="img-responsive" />
        </div>
        <div class="modal-footer ">
          <a type="button" class="btn btn-primary flat" id="navPrev" href="#" onclick="prevImg()"><span class="glyphicon glyphicon-chevron-left"></span> </a>
          <a type="button" class="btn btn-primary flat" id="navNext" href="#" onclick="nextImg()" ><span class="glyphicon glyphicon-chevron-right"></span> </a>
          <button type="button" class="btn btn-warning flat" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> </button>
        </div>
      </div>
    </div>
  </div>
{{--  --}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img class="showimage img-responsive" src="" style="width:100%;" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  
var data = [
      @foreach(explode(',', $vehicles->images) as $info) 
        { src: "{{ asset('uploaded-images')}}/{{$info}}" },
      @endforeach
  ];

var currentItem = 0;

function prevImg() {
  if (currentItem > 0) {
    currentItem--;
  }
  loadData();
}

function nextImg() {
  if (currentItem < data.length - 1) {
    currentItem++;
  }
  loadData();
}

function loadData() {
  $("#modalImg").attr("src", data[currentItem].src).attr("alt", data[currentItem].title);

  // enable/disable nav buttons  
  $("#navPrev").removeAttr("disabled");
  $("#navNext").removeAttr("disabled");

  if (currentItem == 0) {
    $("#navPrev").attr("disabled", "disabled");
  }
  else if (currentItem == data.length - 1) {
    $("#navNext").attr("disabled", "disabled");
  }
}

function openModal(idx) {
  currentItem = idx;
  loadData();
  $("#modal").modal({backdrop:'static', keyboard:false});

}

$(document).ready(function () {
  var $thumbs = $(".thumbnails");
  
  // dynamically add thumbnails to page
  for (var i = 0; i < data.length; i++) {
    $thumbs.append('<div class="col-lg-3 col-md-4 col-xs-6"><img  style="width:100%; padding-top: 5px; height: 100px; cursor: pointer;" src="' + data[i].src + '" onclick="openModal(' + i + ')"  data-toggle="modal" data-backdrop="static"></div>');
  }
});

</script>
@endsection