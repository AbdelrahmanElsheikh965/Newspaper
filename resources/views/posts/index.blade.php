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
                  <img src="{{asset('images/' . $post['image'])}}" alt="" class="img-fluid">
                </div>
              </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-2">
                    <h2 class="w-title"> <a href="{{route('posts.show', $post['id'])}}"> {{$post['title']}} </h2>
                      <form action="{{route('posts.destroy', $post['id'])}}" method="post">
                          @csrf @method('DELETE')
                          <input type="submit" value="delete" onclick="return confirm('Are you sure?')">
                      </form>
                  </div>
                  <div class="col-sm-2">
                    <div class="w-like">
                      <a href="{{route('posts.show', $post['id'])}}"> <i class="bi bi-eye-fill" width="5" height="5"></i> </span></a>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="w-like">
                      <a href="{{route('posts.edit', $post['id'])}}"> <i class="bi bi-pencil-fill"></i> </span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          {{$posts->links()}}
        </div>
      </div>
    </section><!-- End Portfolio Section -->
    @endsection