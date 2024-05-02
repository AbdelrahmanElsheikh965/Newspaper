@extends('posts.main')

@section('content')

<!-- ======= About Section ======= -->
<section id="about" class="about-mf sect-pt4 route">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="box-shadow-full">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-sm-6 col-md-5">
                  <div class="about-img">
                    <img src="assets/img/testimonial-2.jpg" class="img-fluid rounded b-shadow-a" alt="">
                  </div>
                </div>
                <div class="col-sm-6 col-md-7">
                  <div class="about-info">
                    <p><span class="title-s">Name: </span> <span>Morgan Freeman</span></p>
                    <p><span class="title-s">Profile: </span> <span>full stack developer</span></p>
                    <p><span class="title-s">Email: </span> <span>contact@example.com</span></p>
                    <p><span class="title-s">Phone: </span> <span>(617) 557-0089</span></p>
                  </div>
                </div>
              </div>
              <div class="skill-mf">
                <p class="title-s">Skill</p>
                <span>HTML</span> <span class="pull-right">85%</span>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span>CSS3</span> <span class="pull-right">75%</span>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span>PHP</span> <span class="pull-right">50%</span>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span>JAVASCRIPT</span> <span class="pull-right">90%</span>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="about-me pt-4 pt-md-0">
                <div class="title-box-2">
                  <h5 class="title-left">
                    About me
                  </h5>
                </div>
                <p class="lead">
                  Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id
                  imperdiet et, porttitor
                  at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla
                  porttitor accumsan tincidunt.
                </p>
                <p class="lead">
                  Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis
                  porttitor volutpat. Vestibulum
                  ac diam sit amet quam vehicula elementum sed sit amet dui. porttitor at sem.
                </p>
                <p class="lead">
                  Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
                  Nulla porttitor accumsan
                  tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End About Section -->

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
          <div class="line-mf"></div>
        </div>
      </div>
    </div>

    <div class="row">

      @foreach (auth()->user()->posts as $post)

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
                  <span class="w-ctegory">Date: </span> / <span class="w-date"> {{$post['created_at']}} </span>
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

    </div>
  </div>
</section>
< @endsection