@extends('posts.main')

@section('content')
<section class="blog-wrapper sect-pt4" id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="post-box">
          <div class="post-thumb">
            <img src="assets/img/post-1.jpg" class="img-fluid" alt="">
          </div>
          <div class="post-meta">
            <h1 class="article-title">{{$post['title']}}</h1>
            <ul>
              <li>
                <span class="bi bi-person"></span>
                <a href="#">Author Name</a>
              </li>
              <li>
                <span class="bi bi-tag"></span>
                <a href="#">Tag</a>
              </li>
              <li>
                <span class="bi bi-chat-left-text"></span>
                <a href="#">No. of comments</a>
              </li>
            </ul>
          </div>
          <div class="article-content">
            <p> Body: 
              {{$post['body']}}
            </p>
            <p>
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
            </p>
            <p>
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
              Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text Random Text 
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection


