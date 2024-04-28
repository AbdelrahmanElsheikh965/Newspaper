@extends('posts.main')

@section('content')
     <!-- ======= Portfolio Section ======= -->
     <section id="work" class="portfolio-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
                Portfolio
              </h3>
              <p class="subtitle-a">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              </p>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          
          @foreach ($posts as $post)
              
          <div class="col-md-4">
            <div class="work-box">
              <a href="assets/img/work-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox">
                <div class="work-img">
                  <img src="assets/img/work-1.jpg" alt="" class="img-fluid">
                </div>
              </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title"> <a href="{{route('post-details', $post['id'])}}"> {{$post['title']}} </h2>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <a href="{{route('delete-post', $post['id'])}}" onclick="return confirm('Are you sure?')"> <i class="bi bi-trash3-fill"></i> </span></a>
                      <a href="{{route('post-details', $post['id'])}}"> <i class="bi bi-eye-fill"></i> </span></a>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="w-like">
                      <a href="{{route('edit-post', $post['id'])}}"> <i class="bi bi-pencil-fill"></i> </span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endforeach

        </div>
      </div>
    </section><!-- End Portfolio Section -->
@endsection