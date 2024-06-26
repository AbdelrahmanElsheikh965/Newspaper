@extends('posts.main')

@section('content')

<section id="work" class="portfolio-mf sect-pt4 route">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-box text-center">
          <h3 class="title-a">
            Posts
          </h3>
          <p class="subtitle-a">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          </p>
          
          <h4 id="check" ></h4>

          <div class="line-mf"></div>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach ($posts as $post)

      <div class="col-md-4">
        <div class="work-box">
          <a href="{{asset('images/' . $post['image'])}}" data-gallery="portfolioGallery" class="portfolio-lightbox">
            <div class="work-img">
              <img src="{{asset('images/' . $post['image'])}}" class="img-fluid">
            </div>
          </a>
          <div class="work-content">
            <div class="row">
              <div class="col-sm-8">
                <h2 class="w-title"> <a href="{{route('posts.show', $post['id'])}}"> {{$post['title']}} </h2>
                <div class="w-more">
                  <span class="w-ctegory">Slug: </span> / <span class="w-date"> {{$post['slug']}} </span>
                </div>
                <div class="w-more">
                  <span class="w-ctegory">Author Name: </span> / <span class="w-date"> {{$author['name']}} </span>
                </div>
                <div class="w-more">
                  <span class="w-ctegory">Date: </span> / <span class="w-date"> {{$post['created_at']}} </span>
                </div>
                <div class="w-more">
                  <span class="w-ctegory">Tags: </span> / 
                    @foreach ($post->tags as $tag)
                      <span class="w-date"> {{$tag->name}} </span>
                    @endforeach
                </div>
              </div>

              <br>
              <div class="col-sm-4">
                <form action="{{route('posts.destroy', $post['id'])}}" method="post">
                  @csrf @method('DELETE')
                  <input class="btn btn-danger" type="submit" value="delete" onclick="return confirm('Are you sure?')">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        (function () {

          function long_polling(){

            $.ajax({
              
                url: '{{route("posts.check")}}',
                type: 'GET',
                success: function (response) {
                  
                  if (response === "true") {
                    $('#check').html("First comment is found ");
                    throw '';
                  } else {
                    $('#check').html("First comment is NOT found ");
                    long_polling();
                  }
                }
            });

          }

          long_polling();
        })();
    </script>