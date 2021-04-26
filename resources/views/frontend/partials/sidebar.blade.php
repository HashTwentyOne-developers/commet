<div class="col-md-3 col-md-offset-1">
    <div class="sidebar hidden-sm hidden-xs">
      <div class="widget">
        <h6 class="upper">Search blog</h6>

        <form action="{{ route('post.search') }}" method="POST">
         @csrf
          <input type="text" name="search"  placeholder="Search.." class="form-control">
        </form>

      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Categories</h6>

        @php
           $post_cat = App\Models\postCategory::all();
           $post_tag = App\Models\post_tag::all();
           $post = App\Models\post::where('trash',false) -> take(3) ->latest()->get();

        @endphp
        <ul class="nav">
            @foreach ($post_cat as $cat )


          <li><a href="{{ route('post.cat.search',$cat->slug) }}">{{ $cat -> name }}</a> </li>

          @endforeach

        </ul>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">
            @foreach ($post_tag as $tag )
            <a href="{{ $tag ->id }}">{{ $tag -> name }}</a>
            @endforeach

        </div>
      </div>
      <!-- end of widget      -->
      <div class="widget">
        <h6 class="upper">Latest Posts</h6>
        <ul class="nav">
            @foreach ($post as $p )
            <li><a href="#">{{ $p ->title }}<i class="ti-arrow-right"></i><span>{{ date('d M, Y',strtotime($p ->created_at)) }}</span></a>
            </li>
            @endforeach


        </ul>
      </div>
      <!-- end of widget          -->
    </div>
    <!-- end of sidebar-->
  </div>
