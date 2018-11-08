@extends('admin/layouts/app')

@section('head')
<title>Update Listing - Car Portal PH</title>
  <!-- Fancy File -->
  <link rel="stylesheet" href="{{ asset('asset-admin/css/bootstrap-fancyfile.css')}}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('asset-admin/bower_components/select2/dist/css/select2.min.css')}}">
  {{-- Bootstrap Toogle --}}
  <link  rel="stylesheet" href="{{ asset('asset-admin/bower_components/bootstrap-toggle/bootstrap-toggle.min.css')}}">

@endsection

@section('content-header')
	<section class="content-header content-center">
      <h1>
        Update Listing [{{ $vehicles->listing_id }}]
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
	            <form role="form" action="{{ route('vehicles.store')}}" method="post" enctype="multipart/form-data"> 
	              @csrf
	              @method('PATCH')
	              	<div class="row">
				        <!-- left column -->
				        <div class="col-md-6">
				             <!-- form start -->
			                <div class="box-body">
			                	<div class="form-group col-sm-6">
					                <label>Make</label>
					                <select  id="make_name" class="form-control dynamic select2"  data-dependent="model_name" name="make" required >
				                        <option value="">-- Select Make --</option>
				                        @foreach($model_list as $make_name)
				                              <option value="{{ $make_name->make_name}}">{{ $make_name->make_name }}</option>
				                        @endforeach
				                    </select>
					            </div>
					            <div class="form-group col-sm-6">
					                <label>vehicle_price(km)</label>
					                <input class="form-control form-control-sm " placeholder="km" type="text" helo="numbers"  maxlength="6" minlength="3" name="milleage" value="@if  (old('milleage') ) {{ old('milleage')}} @else {{$vehicles->milleage}} @endif" required>
					            </div>
								
								<div class="form-group col-sm-6">
					                <label>Model</label>
					                <select id="model_name" class="form-control select2" name="model" required>
					                  <option value="" >-- Select Model --</option>
					                </select>
					            </div>
					            <div class="form-group col-sm-6">
					                <label>Engine(L)</label>
			                      	<input class="form-control form-control-sm"  placeholder="1.5" type="text"   helo="numbers"  name="engine" value="@if  (old('engine') ) {{ old('engine')}} @else {{$vehicles->engine}} @endif" required>
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Year</label>
                      				<select id="year" class="yearselect form-control select2" name="year" required></select>
					            </div>
					            <div class="form-group col-sm-6">
					                <label>Edition</label>
			                      	<input  class="form-control"  placeholder="" type="text"  name="edition" value="@if  (old('edition') ) {{ old('edition')}} @else {{$vehicles->edition}} @endif" >
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Transmission</label>
					                <select class="form-control select2"  name="transmission" required>
				                        <option value="">-- Select Transmission --</option>
				                        <option value="Automatic" {{ old('transmission') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
				                        <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
				                        <option value="Tiptronic" {{ old('transmission') == 'Tiptronic' ? 'selected' : '' }}>Tiptronic</option>
			                     	</select>
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Doors</label>
			                      	<select class="form-control select2" name="door" required>
				                        <option value="">-- Number of Doors --</option>
				                        @foreach(range(1, 6) as $number) 
				                          <option >{!! $number !!}</option>
				                        @endforeach
				                    </select>
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Fuel</label>
					                <select class="form-control select2"  name="fuel" required>
				                        <option value="">-- Select Fuel --</option>
				                        <option value="Diesel" {{ old('fuel') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
				                        <option value="Electro" {{ old('fuel') == 'Electro' ? 'selected' : '' }}>Electro</option>
				                        <option value="Gasoline" {{ old('fuel') == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
				                        <option value="Hybrid" {{ old('fuel') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
				                        <option value="LPG" {{ old('fuel') == 'LPG' ? 'selected' : '' }}>LPG</option>
				                     </select>
					            </div>
					            <div class="form-group col-sm-6">
					                <label>Seats</label>
			                      	<select class="form-control select2" name="seat" required>
				                        <option value="">-- Number of Seats --</option>
				                        @foreach(range(1, 20) as $number) 
				                          <option>{!! $number !!}</option>
				                        @endforeach
				                    </select>
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Drive Type</label>
					                <select class="form-control select2" name="drivetype" required >
				                        <option value="">-- Select Drive Type --</option>
				                        <option value="4x4" {{ old('drivetype') == '4x4' ? 'selected' : '' }}>4x4</option>
				                        <option value="AWD" {{ old('drivetype') == 'AWD' ? 'selected' : '' }}>AWD</option>
				                        <option value="Front Wheel" {{ old('drivetype') == 'Front Wheel' ? 'selected' : '' }}>Front Wheel</option>
				                        <option value="Rear Wheel" {{ old('drivetype') == 'Rear Wheel' ? 'selected' : '' }}>Rear Wheel</option>
				                        <option value="Other" {{ old('drivetype') == 'Other' ? 'selected' : '' }}>Other</option>
				                     </select>
					            </div>
					            <div class="form-group col-sm-6">
					                <label>Condition</label>
			                      	<select class="form-control select2" name="condition" required>
				                        <option value="">-- Select Condition--</option>
				                        <option value="New" {{ old('condition') == 'New' ? 'selected' : '' }}>New</option>
				                        <option value="Used" {{ old('condition') == 'Used' ? 'selected' : '' }}>Used</option>
				                        <option value="Slightly Used" {{ old('condition') == 'Slightly Used' ? 'selected' : '' }}>Slightly Used</option>
				                    </select>
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Body Type</label>
					                <select class="form-control select2" name="bodytype" required>
				                        <option value="">-- Select Body Type --</option>
				                        <option value="Coupe" {{ old('bodytype') == 'Coupe' ? 'selected' : '' }}>Coupe</option>
				                        <option value="Convertible" {{ old('bodytype') == 'Convertible' ? 'selected' : '' }}>Convertible</option>
				                        <option value="Crossover" {{ old('bodytype') == 'Crossover' ? 'selected' : '' }}>Crossover</option>
				                        <option value="Minicar" {{ old('bodytype') == 'Minicar' ? 'selected' : '' }}>Minicar</option>
				                        <option value="Minivan" {{ old('bodytype') == 'Minivan' ? 'selected' : '' }}>Minivan</option>
				                        <option value="Hatchback" {{ old('bodytype') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
				                        <option value="Sedan" {{ old('bodytype') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
				                        <option value="Sportback" {{ old('bodytype') == 'Sportback' ? 'selected' : '' }}>Sportback</option>
				                        <option value="SUV" {{ old('bodytype') == 'SUV' ? 'selected' : '' }}>SUV</option>
				                        <option value="Wagon" {{ old('bodytype') == 'Wagon' ? 'selected' : '' }}>Wagon</option>
				                     </select>
					            </div>
					            <div class="form-group col-sm-6">
					                <label>Price</label>
			                      	<input type="text" class="form-control text-left" id="currency" name="vehicle_price" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₱ ', 'placeholder': '0'" value="@if  (old('vehicle_price') ) {{ old('vehicle_price')}} @else {{$vehicles->vehicle_price}} @endif" required>
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Color</label>
					                <select class="form-control select2" name="vehicle_color" required>
				                        <option value="">-- Select Color --</option>
				                        <option value="Black" {{ old('vehicle_color') == 'Black' ? 'selected' : '' }}>Black</option>
				                        <option value="Beige" {{ old('vehicle_color') == 'Beige' ? 'selected' : '' }}>Beige</option>
				                        <option value="Blue" {{ old('vehicle_color') == 'Blue' ? 'selected' : '' }}>Blue</option>
				                        <option value="Brown" {{ old('vehicle_color') == 'Brown' ? 'selected' : '' }}>Brown</option>
				                        <option value="Gold" {{ old('vehicle_color') == 'Gold' ? 'selected' : '' }}>Gold</option>
				                        <option value="Silver/Grey" {{ old('vehicle_color') == 'Silver/Grey' ? 'selected' : '' }}>Silver/Grey</option>
				                        <option value="Green" {{ old('vehicle_color') == 'Green' ? 'selected' : '' }}>Green</option>
				                        <option value="Orange" {{ old('vehicle_color') == 'Orange' ? 'selected' : '' }}>Orange</option>
				                        <option value="Purple/Pink" {{ old('vehicle_color') == 'Purple/Pink' ? 'selected' : '' }}>Purple/Pink</option>
				                        <option value="Red" {{ old('vehicle_color') == 'Red' ? 'selected' : '' }}>Red</option>
				                        <option value="White" {{ old('vehicle_color') == 'White' ? 'selected' : '' }}>White</option>
				                        <option value="Yellow" {{ old('vehicle_color') == 'Yellow' ? 'selected' : '' }}>Yellow</option>
				                    </select>
				                    
					            </div>
					            <div class="form-group col-sm-6">
					                <label>Price Details</label>
					                <select class="form-control select2" name="vehicle_price_detail" required>
				                        <option value="">-- Select Price Details --</option>
				                      	<option value="CIF only(Cargo Import Freight)" {{ old('vehicle_price_detail') == 'CIF only(Cargo Import Freight)' ? 'selected' : '' }} >CIF only(Cargo Import Freight)</option>
				                        <option value="Drive Away" {{ old('vehicle_price_detail') == 'Drive Away' ? 'selected' : '' }}>Drive Away</option>
				                        <option value="Excluding Government Charges" {{ old('vehicle_price_detail') == 'Excluding Government Charges' ? 'selected' : '' }}>Excluding Government Charges</option>
				                        <option value="Negotiable" {{ old('vehicle_price_detail') == 'Negotiable' ? 'selected' : '' }}>Negotiable</option>
				                        <option value="None" {{ old('vehicle_price_detail') == 'None' ? 'selected' : '' }}>None</option>
				                        <option value="On the Road Price" {{ old('vehicle_price_detail') == 'On the Road Price' ? 'selected' : '' }}>On the Road Price</option>
				                        <option value="On-site Finance Available" {{ old('vehicle_price_detail') == 'On-site Finance Available' ? 'selected' : '' }}>On-site Finance Available</option>
				                    </select>
					            </div>
			                </div>
			                <!-- /.box-body -->
				        </div>
				       
				        <div class="col-md-6">
				        	<div class="box-body">
					        	<div class="form-group col-sm-12">
					                <label>Features</label>
					                <select class="form-control select2" multiple="multiple" data-placeholder="Select Features" name="features[]" style="width: 100%;" required>
			                          @foreach($features as $feature)
			                            <option value="{{ $feature->id}}">{{ $feature->feature_name}}</option>
			                          @endforeach
			                        </select>
					            </div>
					            <div class="form-group col-sm-12">
					                <label>Descriptions</label>
			                      	<textarea class="form-control" rows="3" placeholder="Description" name="description" required>@if  (old('description') ) {{ old('description')}} @else {{$vehicles->description}} @endif</textarea>
					            </div>

					            <div class="form-group col-sm-6">
					                <label>Status</label>
			                      	<div class="input-group">
				                      <input  data-toggle="toggle" type="checkbox" checked  data-size="small" data-on="SALE" data-off="SOLD" data-onstyle="success" data-offstyle="danger" name="vehicle_status" value="1">
				                    </div>
					            </div>
					            <div class="form-group col-sm-6">
					                <label>Approved</label>
				                  	<div class="input-group">
				                      <input  data-toggle="toggle" type="checkbox" checked  data-size="small" data-on="YES" data-off="NO" data-onstyle="success" data-offstyle="danger" name="vehicle_approval" value="1">
				                    </div>
					            </div>

					            <div class="form-group col-sm-12">
					                <label>Images</label>
									<input  type="file" data-toggle="fancyfile" class="form-control" name="images[]" placeholder="Images" id="gallery-photo-add"  multiple  required onchange="imagesPreview(this);" accept="image/x-png,image/gif,image/jpeg" >
					            </div>
					            
					            <div class="form-group col-sm-12">
					            	<div class="gallery"></div>	
								</div>
					        </div>
				        </div>
				        <!--/.col (right) -->
			      	</div>
	              <!-- /.box-body -->
		            <div class="box-footer">
		                <div class="col-md-12">
		                    <div class="form-group no-margin pull-right">
		                        <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> &nbsp;Save</button>
		                        <a href="{{ route('vehicles.index')}}" class="btn btn-default"><span class="fa fa-times-circle"></span> &nbsp;Cancel</a>
		                    </div>
		                </div>
		            </div>
	            </form>
	        </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


@endsection

@section('script')

{{-- Fancy File --}}
<script src="{{ asset('asset-admin/js/bootstrap-fancyfile.js')}}"></script>
{{-- Bootstrap Toogle --}}
<script src="{{ asset('asset-admin/bower_components/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('asset-admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script type="text/javascript">
	$(function () {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img width="100" height="100" style="padding:2px !important; object-fit:cover;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#gallery-photo-add').change(function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>
{{-- Year Select --}}
<script src="{{ asset('asset-admin/js/year-select.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
	    $('.yearselect').yearselect();
	    $('.yrselectdesc').yearselect({step: 5, order: 'desc'});
	    $('.yrselectasc').yearselect({order: 'asc'});
	});
</script>
{{-- Input Mask --}}
<script src="{{ asset('asset-admin/js/jquery.inputmask.bundle.min.js')}}"></script>
<script type="text/javascript">
	$(":input").inputmask();

	// for number only
	$(function(){
	  $("input[helo='numbers']").on('input', function (e) {
	    $(this).val($(this).val().replace(/[^0-9+.]/g, ''));
	  });
	});
</script>
{{-- For Make & Model --}}
<script type="text/javascript">
  $(document).ready(function(){
   $('.dynamic').change(function(){
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
     var _token = $('input[name="_token"]').val();
     $.ajax({
      url:'{{ route('vehicles.fetch') }}',
      method:"POST",
      data:{select:select, value:value, _token:_token, dependent:dependent},
      success:function(result)
      {
       $('#'+dependent).html(result);
      }

     })
    }
   });

   $('#make_name').change(function(){
    $('#model_name').val('');
   });

  });
</script>



@endsection