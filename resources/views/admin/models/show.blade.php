@extends('admin/layouts/app')

@section('head')
<title>Models - Car Portal PH</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset-admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
	<section class="content-header content-center">
      <h1>
        Models
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
                  <th>Make Name</th>
                  <th>Model Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($models as $model)
                <tr>
                  <td>{{ $loop->index + 1}}</td>
                  <td>{{ $model->make_name}}</td>
                  <td>{{ $model->model_name}}</td>
                  <td>
                  	<button data-toggle="modal" data-backdrop="static" data-target="#edit" data-mymakename='{{ $model->make_name}}' data-mymodelname='{{ $model->model_name}}' data-mymodelid='{{ $model->id}}'  class="btn btn-primary btn-xs  flat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                  	<button data-toggle="modal" data-backdrop="static" data-target="#delete" data-mymodelid='{{ $model->id}}' class="btn btn-danger btn-xs  flat"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
          <h4 class="modal-title">Add Model</h4>
        </div>
        <form role="form" action="{{ route('models.store')}}" method="post">
              @csrf
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-6 required ">
                  <label for="name" class="control-label">Make <font color="red">*</font></label>
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-folder-open-o"></i></div>
                      <select class="form-control select2" style="width: 100%;" name="make_name" required>
                        <option value="" >--Select Make--</option>
                        @foreach($makes as $make)
                        <option value="{{ $make->make_name}}">{{ $make->make_name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group col-md-6 required ">
                <label for="color" class="control-label">Model <font color="red">*</font></label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-car"></i></div>
                    <input class="form-control " type="text" name="model_name" autocomplete="off" placeholder="Model Name" required>
                  </div>
              </div>
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
          <h4 class="modal-title">Update Model</h4>
        </div>
        <form role="form" action="{{ route('models.update','update')}}" method="post">
            @method('PATCH')
            @csrf
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-6 required ">
                  <label for="name" class="control-label">Make <font color="red">*</font></label>
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-folder-open-o"></i></div>
                      <select class="form-control select2" style="width: 100%;" name="make_name" id="make_name" required>
                        <option value="" >--Select Make--</option>
                        @foreach($makes as $make)
                        <option value="{{ $make->make_name}}">{{ $make->make_name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group col-md-6 required ">
                <label for="color" class="control-label">Model <font color="red">*</font></label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-car"></i></div>
                    <input class="form-control " type="text" name="model_name" autocomplete="off" id="model_name" placeholder="Model Name" required>
                  </div>
              </div>
                <input class="form-control" type="hidden" name="model_id" autocomplete="off" value="" id="model_id" >
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
        <form role="form" action="{{ route('models.destroy','delete')}}" method="post">
            @method('DELETE')
            @csrf
          <div class="modal-body">
              <div class="form-group">
                <p>Are you sure you want to delete?</p>
                <input class="form-control" type="hidden" name="model_id" autocomplete="off" value="" id="model_id" >
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
	$('#edit').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var make_name = button.data('mymakename') 
	  var model_name = button.data('mymodelname') 
	  var model_id = button.data('mymodelid') 
	  var modal = $(this)
	  modal.find('.modal-body #make_name').val(make_name)
	  modal.find('.modal-body #model_name').val(model_name)
	  modal.find('.modal-body #model_id').val(model_id)
	})

	$('#delete').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var model_id = button.data('mymodelid') 
	  var modal = $(this)
	  modal.find('.modal-body #model_id').val(model_id)
	})
</script>


@endsection