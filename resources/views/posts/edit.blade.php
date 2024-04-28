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
                      <form action="" method="post" role="form" class="php-email-form">
                        <div class="row">
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" name="name" value="{{$post['title']}}" class="form-control" id="name" placeholder="Title" required>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea class="form-control" name="message" rows="5" placeholder="Body ..." required>{{$post['body']}}</textarea>
                            </div>
                          </div>

                          <div class="col-md-12 mb-3 mt-3">
                            <div class="form-group">
                              <input type="file" name="post_image" class="form-control" id="name" required>
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