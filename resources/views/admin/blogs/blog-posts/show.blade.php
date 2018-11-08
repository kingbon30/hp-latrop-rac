@extends('admin/layouts/app')

@section('head')
<title>Blog Post - Car Portal PH</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset-admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    {{-- Bootstrap Toogle --}}
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content-header')
	<section class="content-header content-center">
      <h1>
        Blog Post
        <span class="new-button"><a href="{{ route('blog-posts.create')}}" class="btn btn-success btn-sm" ><span class="fa fa-plus"></span> &nbsp;Add New</a></span>
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
                  <th>Image</th>
                  <th>Blog Post Title</th>
                  <th>Post Slug</th>
                  <th>Categories</th>
                  <th>Status</th>
                  <th>Created at</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($blog_posts as $blog_post)
                <tr>
                  <td>{{ $loop->index + 1}}</td>
                  <td><img src="{{Storage::disk('local')->url($blog_post->blog_post_image)}}" class="img-thumbnail" data-toggle="modal" data-target="#myModal" alt="CarPortal PH" width="50" style="cursor: pointer;"></td>
                  <td>{{ $blog_post->blog_post_title}}</td>
                  <td>{{ $blog_post->blog_post_slug}}</td>
                  <td>@foreach($blog_post->blog_categories as $blog_category)
                    {{$blog_category->blog_category_name}},
                  @endforeach</td>
                  <td>@if ($blog_post->blog_post_status)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-danger">Not Active</span>
                    @endif</td>
                  <td>{{ $blog_post->created_at}}</td>
                  <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                              <i class="fa fa-ellipsis-h"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="{{ route('blog-posts.edit',$blog_post->id)}}"><span class="fa fa-pencil"></span>Edit</a></li>
                              <li><a data-toggle="modal" data-backdrop="static" data-target="#delete" data-myblogpostid='{{ $blog_post->id}}'><span class="fa fa-trash-o"></span> Delete</a></li>
                              <li class="divider"></li>
                              <li><a href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}"  target="_blank"><span class="fa fa-eye"></span> View</a></li>
                          </ul>
                      </div>
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

 

  {{-- Delete --}}
  <div class="modal fade" id="delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <form role="form" action="{{ route('blog-posts.destroy','delete')}}" method="post">
			      @method('DELETE')
            @csrf
          <div class="modal-body">
              <div class="form-group">
                <p>Are you sure you want to delete?</p>
                <input class="form-control" type="hidden" name="blog_post_id" autocomplete="off" value="" id="blog_post_id" >
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

<div id="myModal" class="modal fade  bs-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <img class="showimage img-responsive" src="" style="width:auto; height: 700px;" />
          
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('asset-admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('asset-admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

{{-- Bootstrap Toogle --}}
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
  $(document).ready(function () {
      $('img').on('click', function () {
          var image = $(this).attr('src');
          //alert(image);
          $('#myModal').on('show.bs.modal', function () {
              $(".showimage").attr("src", image);
          });
      });
  });

	$('#delete').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var blog_post_id = button.data('myblogpostid') 
	  var modal = $(this)
	  modal.find('.modal-body #blog_post_id').val(blog_post_id)
	})
</script>


@endsection