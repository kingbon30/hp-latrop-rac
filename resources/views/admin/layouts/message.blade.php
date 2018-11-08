@if (count($errors) > 0)
  @foreach($errors->all() as $error)
 	<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p><i class="icon fa fa-check"></i> {{ $error }}</p>
    </div>
      
    </p>
  @endforeach
@endif

@if (session()->has('message'))
	<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p><i class="icon fa fa-check"></i> {{ session('message')}}</p>
     </div>
@endif