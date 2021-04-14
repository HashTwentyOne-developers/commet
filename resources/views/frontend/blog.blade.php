@extends('frontend.app')

@section('main-content')

<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="frontend/images/bg/18.jpg" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">This is our blog<span class="red-dot"></span></h1>
              <h4>We have a few tips for you.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-posts">

        @foreach ($all_post as $post )

        @php
            $featured = json_decode($post ->featured);
        @endphp

            @if($featured ->post_type == 'image')

            <article class="post-single">
              <div class="post-info">
                <h2><a href="#">{{ $post ->title }}</a></h2>
                <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
              </div>
              <div class="post-media">
                <a href="#">
                  <img src="{{ URL::to('') }}/media/post/{{ $featured ->image }}" alt="">
                </a>
              </div>
              <div class="post-body">
                <p>{!! Str::of(htmlspecialchars_decode($post->description)) -> words(100) !!}</p>
                <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                </p>
              </div>
            </article>
            @endif

            @if($featured ->post_type == 'gallery')

            <article class="post-single">
                <div class="post-info">
                  <h2><a href="#">{{ $post ->title }}</a></h2>
                  <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
                </div>
                <div class="post-media">
                  <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                    <ul class="slides">

                        @foreach ($featured ->gallery_image as $gimage )
                        <li style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;" class="flex-active-slide">
                        <img src="{{ URL::to('') }}/media/post/{{ $gimage}}" alt="" draggable="false">
                      </li>
                        @endforeach

                    </ul>
                  </div>
                </div>
                <div class="post-body">
                  <p>{!! Str::of(htmlspecialchars_decode($post->description)) -> words(100) !!}</p>
                  <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                  </p>
                </div>
              </article>

            @endif

            @if ($featured ->post_type == 'video')

            <article class="post-single">
                <div class="post-info">
                  <h2><a href="#">{{ $post->title }}</a></h2>
                  <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Entrepreneurship</a></h6>
                </div>
                <div class="post-media">
                  <div class="media-video">
                    <iframe src="{{ $featured ->post_video }}" frameborder="0"></iframe>
                  </div>
                </div>
                <div class="post-body">
                  <p>{!! Str::of(htmlspecialchars_decode($post -> description)) -> words(200) !!}</p>
                  <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                  </p>
                </div>
              </article>

            @endif

            @endforeach

          </div>
          <ul class="pagination">
            <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
            </li>
            <li class="active"><a href="#">1</a>
            </li>
            <li><a href="#">2</a>
            </li>
            <li><a href="#">3</a>
            </li>
            <li><a href="#">4</a>
            </li>
            <li><a href="#">5</a>
            </li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
            </li>
          </ul>
          <!-- end of pagination-->
        </div>
            @include('frontend.partials.sidebar')
      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>

@endsection
