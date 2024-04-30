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
              <li>
                <span class="bi bi-calendar-week"></span>
                <a href="#">{{$post['created_at']}}</a>
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

        <div class="box-comments">
          <div class="title-box-2">
            <h4 class="title-comments title-left">Comments (34)</h4>
          </div>
          <ul class="list-comments">
            <li>
              <div class="comment-avatar">
                <img src="{{asset('assets/img/p.png')}}" alt="">
              </div>
              <div class="comment-details">
                <h4 class="comment-author">Oliver Colmenares</h4>
                <span>18 Sep 2017</span>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                  ipsam temporibus maiores
                  quae natus libero optio, at qui beatae ducimus placeat debitis voluptates amet corporis.
                </p>
                <a href="3">Reply</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="form-comments">
          <div class="title-box-2">
            <h3 class="title-left">
              Leave a Comment
            </h3>
          </div>
          <form class="form-mf" action="{{route('comments.store', $post['id'])}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea id="textMessage" class="form-control input-mf" placeholder="Comment *" name="comment" cols="45" rows="8" required></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="button button-a button-big button-rouded">Save this as a Comment</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection