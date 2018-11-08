@extends('admin/layouts/app')

@section('head')
<title>Features - Car Portal PH</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset-admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
	<section class="content-header content-center">
      <h1>
        Features
        <span class="new-button"><button class="btn btn-success btn-sm" data-backdrop="static" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span> &nbsp;Add New</button></span>
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
                  <th>Feature Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($features as $feature)
                <tr>
                  <td>{{ $loop->index + 1}}</td>
                  <td>{{ $feature->feature_name}}</td>
                  <td>
                  	<button data-toggle="modal" data-backdrop="static" data-target="#edit" data-myfeaturename='{{ $feature->feature_name}}' data-myfeatureslug='{{ $feature->feature_slug}}' data-myfeatureid='{{ $feature->id}}'  class="btn btn-primary btn-xs  flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                  	<button data-toggle="modal" data-backdrop="static" data-target="#delete" data-myfeatureid='{{ $feature->id}}' class="btn btn-danger btn-xs  flat"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                  </td>
                </tr>
                @endforeach
                
                </tfoot>
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

{{-- Modals --}}
	{{-- Add --}}
  <div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Feature</h4>
        </div>
        <form role="form" action="{{ route('features.store')}}" method="post">
              @csrf
          <div class="modal-body">
              <div class="form-group">
                <input class="form-control slug-input" type="text" name="feature_name" autocomplete="off" placeholder="Feature Name" required>
                <input class="form-control slug-output" type="hidden" name="feature_slug" autocomplete="off">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default " data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
            <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Save</button>
          </div>
      	</form>
      </div>
    </div>
  </div>
	
	{{-- Update --}}
  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Make</h4>
        </div>
        <form role="form" action="{{ route('features.update','update')}}" method="post">
			      @method('PATCH')
            @csrf
          <div class="modal-body">
              <div class="form-group">
                <input class="form-control slug-input-edit" type="text" name="feature_name" autocomplete="off" id="feature_name" placeholder="Feature Name" required>
                <input class="form-control slug-output-edit" type="hidden" name="feature_slug" autocomplete="off" id="feature_slug" >
                <input class="form-control" type="hidden" name="feature_id" autocomplete="off" value="" id="feature_id" >
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default " data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
            <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Save changes</button>
          </div>
      	</form>
      </div>
    </div>
  </div>

  {{-- Delete --}}
  <div class="modal fade" id="delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form role="form" action="{{ route('features.destroy','delete')}}" method="post">
			      @method('DELETE')
            @csrf
          <div class="modal-body">
              <div class="form-group">
                <p>Are you sure you want to delete?</p>
                <input class="form-control" type="hidden" name="feature_id" autocomplete="off" value="" id="feature_id" >
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
{{-- Custom Js --}}
<script src="{{ asset('asset-admin/js/app.js')}}"></script>
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
	$('#edit').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var feature_name = button.data('myfeaturename') 
	  var feature_slug = button.data('myfeatureslug') 
	  var feature_id = button.data('myfeatureid') 
	  var modal = $(this)
	  modal.find('.modal-body #feature_name').val(feature_name)
	  modal.find('.modal-body #feature_slug').val(feature_slug)
	  modal.find('.modal-body #feature_id').val(feature_id)
	})

	$('#delete').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var feature_id = button.data('myfeatureid') 
	  var modal = $(this)
	  modal.find('.modal-body #feature_id').val(feature_id)
	})
</script>


@endsection