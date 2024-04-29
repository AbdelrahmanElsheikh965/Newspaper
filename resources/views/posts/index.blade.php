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
              <img src="{{asset('images/' . $post['image'])}}" class="img-fluid">
            </div>
          </a>
          <div class="work-content">
            <div class="row">
              <div class="col-sm-8">
                <h2 class="w-title"> <a href="{{route('posts.show', $post['id'])}}"> {{$post['title']}} </h2>
                <div class="w-more">
                  <span class="w-ctegory">Author Name: </span> / <span class="w-date"> {{$author['name']}} </span>
                </div>
              </div>

              <br>
              <div class="col-sm-4">
                <form action="{{route('posts.destroy', $post['id'])}}" method="post">
                  @csrf @method('DELETE') 
                  <input type="submit" value="delete" onclick="return confirm('Are you sure?')">
                </form>
              </div>


              <div class="col-sm-2">
                <div class="w-like">
                  <x-button target="{{route('posts.show', $post['id'])}}" type="primary" text="bi bi-eye-fill" />
                </div>
              </div>
              
              <div class="col-sm-2">
                <div class="w-like">
                  <x-button target="{{route('posts.edit', $post['id'])}}" type="secondary" text="bi bi-pencil-fill" />
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