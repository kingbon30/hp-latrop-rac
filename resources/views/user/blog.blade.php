@extends('user/layouts/app')

@section('container')
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Blog
        <small>News</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog News</li>
      </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          {{-- @forelse($blog_posts as $blog_post)
          <div class="card mb-4">
            <img class="card-img-top" src="{{Storage::disk('local')->url($blog_post->blog_post_image)}}"  alt="Car Portal PH">
            <div class="card-body">
              <h2 class="card-title">{{ $blog_post->blog_post_title}}</h2>
              <p class="card-text">{!! htmlspecialchars_decode(str_limit($blog_post->blog_post_body, $limit = 350, $end = '...')) !!}</p>
              <a href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <span class="far fa-clock"></span> {{ $blog_post->created_at->toDateString() }} at {{ $blog_post->created_at->format('H:i A') }} | <span class="far fa-user"></span> Car Portal PH | <span class="far fa-comments "></span> <a href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}#disqus_thread"> Comments</a>
            </div>
          </div>
          @empty
          <div class="alert alert-warning ">
            <strong>Sorry!</strong> No result found.
          </div>
          @endforelse --}}
          @forelse($blog_posts as $blog_post)
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <img class="card-img-left flex-auto d-none d-md-block" alt="Car Portal PH" style="width: 300px; height: 200px; object-fit: contain" src="{{Storage::disk('local')->url($blog_post->blog_post_image)}}" data-holder-rendered="true">
            <div class="card-body d-flex flex-column align-items-start">
              <h5 class="mb-0">
                <a class="text-dark" href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}">{{ $blog_post->blog_post_title}}</a>
              </h5>
              <div class="mb-1 text-muted"><span class="far fa-calendar"  data-toggle="tooltip" data-placement="top" title="Date Posted"></span> {{ $blog_post->created_at->format('M d, Y') }} / <span class="far fa-comments"  data-toggle="tooltip" data-placement="top" title="Read Comments!"></span> <a href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}#disqus_thread"> Comments</a></div>
              <p class="card-text mb-auto">{!! htmlspecialchars_decode(str_limit($blog_post->blog_post_body, $limit = 100, $end = '...'),ENT_NOQUOTES) !!}</p>
              <a href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}">Continue reading</a>
            </div>
          </div>
          @empty
          <div class="alert alert-warning ">
            <strong>Sorry!</strong> No result found.
          </div>
          @endforelse

          <!-- Pagination -->
          
          <ul class="pagination justify-content mb-4">
            <li class="page-item" >
              {{ $blog_posts->links()}}
            </li>
          </ul>
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
@endsection