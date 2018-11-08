@extends('user/layouts/app')

@section('container')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        <small>
          <a href="#"></a>
        </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item "><a href="{{ url('/blog') }}">Blogs</a></li>
        <li class="breadcrumb-item active">{{ $blog_post_slug->blog_post_title }}</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8 card-text car-portal-ph-card">

          <!-- Preview Image -->
          <img class="img-fluid" src="{{Storage::disk('local')->url($blog_post_slug->blog_post_image) }}" width="100%" alt="">

          <hr>

          <!-- Date/Time -->
          <h4>{{ $blog_post_slug->blog_post_title }}</h4>
          <p>Posted {{ $blog_post_slug->created_at->diffForHumans() }} by Car Portal PH</p>


          <!-- Post Content -->
          
          <hr>
          {!! htmlspecialchars_decode($blog_post_slug->blog_post_body) !!}
          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5><a href=""></a>
            <div class="card-body">
              <div id="disqus_thread"></div>
            </div>
          </div>

          <!-- Single Comment -->
          {{-- <div class="media mb-4">
          </div> --}}

          <!-- Comment with nested comments -->
          {{-- <div class="media mb-4">
          </div> --}}

        </div>

        <!-- Sidebar Widgets Column -->
        @include('user.sidebar-widgets')

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
@section('script')
<script id="dsq-count-scr" src="//car-portal-ph.disqus.com/count.js" async></script>

<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://car-portal-ph.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection