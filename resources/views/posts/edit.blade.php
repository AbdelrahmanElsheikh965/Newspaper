@extends('posts.main')

@section('content')

    <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/overlay-bg.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="contact-mf">
              <div id="contact" class="box-shadow-full">
                <div class="row">
                  <div class="col-md-12">
                    <div class="title-box-2">
                      <h5 class="title-left">
                        Edit this Post
                      </h5>
                    </div>
                    <div>
                      <form action="{{route('posts.update', $post['id'])}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}

                        <div class="row">
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" name="title" value="{{$post['title']}}" class="form-control" id="name" placeholder="Title">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea class="form-control" name="body" rows="5" placeholder="Body ...">{{$post['body']}}</textarea>
                            </div>
                          </div>

                          <div class="col-md-12 mb-3 mt-3">
                            <div class="form-group">
                              <input type="file" class="form-control" id="name">
                            </div>
                          </div>

                          <div class="col-md-12 text-center">
                            <button type="submit" class="button button-a button-big button-rouded">Done</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection