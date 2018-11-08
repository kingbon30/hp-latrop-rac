  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card mb-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <form action="/blog/search" method="get">
          <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
          </div>
        <form>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Latest Posts</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            @foreach($latest_posts as $blog_post)
              <div class="list-group">
                <div class="media">
                  <div class="media-left" style="padding-right: 1em; padding-top: .5em;">
                      <img class="media-object" src="{{Storage::disk('local')->url($blog_post->blog_post_image)}}"  height="64" width="100"  >
                  </div>
                  <div class="media-body" style="padding-top: .5em;">
                    <a href="{{ route('blog_post_slug',$blog_post->blog_post_slug)}}"><p class="small">{{ $blog_post->blog_post_title}}</p></a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Categories</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
           <div class="list-group">
            @foreach($blog_categories as $blog_category)
              <a href="{{ route('blog_category',$blog_category->blog_category_slug) }}" class="list-group-item list-group-item-action">{{ $blog_category->blog_category_name}}</a>
            @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
      <h5 class="card-header">Advertisement</h5>
      <div class="card-body">
        <img src="{{asset('asset-user/images/advertisement/300x600.jpg')}}" style="height: auto; width: 100%; display: block;" />
      </div>
    </div>

  </div>