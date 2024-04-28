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
                <a href="#">Jason London</a>
              </li>
              <li>
                <span class="bi bi-tag"></span>
                <a href="#">Web Design</a>
              </li>
              <li>
                <span class="bi bi-chat-left-text"></span>
                <a href="#">14</a>
              </li>
            </ul>
          </div>
          <div class="article-content">
            <p>
              {{$post['body']}}
            </p>
            <p>
              Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
              aliquet elit, eget tincidunt
              nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
              consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p>
            <p>
              Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Praesent
              sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet,
              consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at
              sem. Donec rutrum congue leo eget malesuada.
            </p>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat.
              Curabitur arcu erat,
              accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor
              volutpat. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium
              ut lacinia in, elementum id enim.
            </p>
            <blockquote class="blockquote">
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <p>
              Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
              aliquet elit, eget tincidunt
              nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
              consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection


