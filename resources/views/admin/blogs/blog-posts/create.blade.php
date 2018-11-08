@extends('admin/layouts/app')

@section('head')
<title>Blog Post - Car Portal PH</title>
  <!-- Fancy File -->
  <link rel="stylesheet" href="{{ asset('asset-admin/css/bootstrap-fancyfile.css')}}">
  {{-- Bootstrap Toogle --}}
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('asset-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('asset-admin/bower_components/select2/dist/css/select2.min.css')}}">

@endsection


@section('content-header')
	<section class="content-header content-center">
      <h1>
        Create Post
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
            <form role="form" action="{{ route('blog-posts.store')}}" method="post" enctype="multipart/form-data"> 
              @csrf
              <div class="box-body">
                  <div class="form-group col-md-6  ">
                    <label  class="control-label">Post Title</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-info"></i></div>
                        <input class="form-control slug-input" placeholder="Enter Title" required name="blog_post_title"  type="text" autocomplete="off">
                        <input class="form-control slug-output"  required name="blog_post_slug" type="hidden">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                      <div class="form-group">
                        <label  class="control-label">Categories</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Categories" name="blog_categories[]" style="width: 100%;">
                          @foreach($blog_categories as $blog_category)
                            <option value="{{ $blog_category->id}}">{{ $blog_category->blog_category_name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label  class="control-label">Publish</label>
                    <div class="input-group">
                      <input  data-toggle="toggle" type="checkbox" checked  data-size="small" data-on="YES" data-off="NO" data-onstyle="success" data-offstyle="danger" name="blog_post_status" value="1">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="control-label">Picture</label>
                    <input type="file" data-toggle="fancyfile" class="" name="blog_post_image" id="blog_post_image" onchange="readURL(this);">
                  </div>
                  <div class="form-group col-md-2">
                    <img id="blah"  width="80" >
                  </div>
                  <div class="form-group col-md-12">
                    <label  class="control-label">Post Body</label>
                    <textarea id="body" class="textarea"  placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="blog_post_body"   >
                    </textarea>
                   
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-12">
                    <div class="form-group no-margin">
                        <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> &nbsp;Save</button>
                        <a href="{{ route('blog-posts.index')}}" class="btn btn-default"><span class="fa fa-times-circle"></span> &nbsp;Cancel</a>
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
{{-- Custom Js --}}
<script src="{{ asset('asset-admin/js/app.js')}}"></script>
{{-- Fancy File --}}
<script src="{{ asset('asset-admin/js/bootstrap-fancyfile.js')}}"></script>
{{-- Bootstrap Toogle --}}
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('asset-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('asset-admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
    //Initialize Select2 Elements
    $('.select2').select2()
  })

</script>
<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah')
        .attr('src', e.target.result)
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>

@endsection