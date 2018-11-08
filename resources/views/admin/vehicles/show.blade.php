@extends('admin/layouts/app')

@section('head')
<title>Vehicles - Car Portal PH</title>
  <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('asset-admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
	<section class="content-header content-center">
      <h1>
        Vehicles
        <span class="new-button"><a href="{{url('admin/vehicles/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;Add New</a></span>
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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Listing ID</th>
                  <th>Vehicle</th>
                  <th>Feature</th>
                  <th>Transmission</th>
                  <th>Condition</th>
                  <th>Status</th>
                  <th>Aproval</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($vehicles as $vehicle)
                <tr>
                  <td>{{ $loop->index + 1}}</td>
                  <td>{{ $vehicle->listing_id}}</td>
                  <td>{{ $vehicle->make}} {{ $vehicle->model}} {{ $vehicle->year}}</td>
                  <td>@foreach($vehicle->features as $feature)
                    {{$feature->feature_name}},
                  @endforeach</td>
                  <td>{{ $vehicle->transmission}}</td>
                  <td>{{ $vehicle->condition}}</td>
                  <td>
                    @if ($vehicle->vehicle_status)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-danger">Not Active</span>
                    @endif
                  </td>
                  <td>
                    @if ($vehicle->vehicle_approval)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-danger">Not Active</span>
                    @endif
                  </td>
                  <td>{{ $vehicle->created_at}}</td>
                  <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                              <i class="fa fa-ellipsis-h"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="{{ route('vehicles.edit',$vehicle->id)}}"><span class="fa fa-pencil"></span>Edit</a></li>
                              <li><a data-toggle="modal" data-backdrop="static" data-target="#delete" data-myvehicleid='{{ $vehicle->id}}'><span class="fa fa-trash-o"></span> Delete</a></li>
                              <li class="divider"></li>
                              <li><a href="{{ route('vehicles.show',$vehicle->id)}}" ><span class="fa fa-eye"></span> View</a></li>
                          </ul>
                      </div>
                  </td>
                </tr>
                @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

     {{-- Delete --}}
  <div class="modal fade" id="delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form role="form" action="{{ route('vehicles.destroy','delete')}}" method="post">
            @method('DELETE')
            @csrf
          <div class="modal-body">
              <div class="form-group">
                <p>Are you sure you want to delete?</p>
                <input class="form-control" type="hidden" name="vehicle_id" autocomplete="off" value="" id="vehicle_id" >
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default " data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
            <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span> Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection
@section('script')
<!-- DataTables -->
<script src="{{ asset('asset-admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('asset-admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
	$('#delete').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var vehicle_id = button.data('myvehicleid') 
	  var modal = $(this)
	  modal.find('.modal-body #vehicle_id').val(vehicle_id)
	})
</script>


@endsection