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
                    Save a new Post
                  </h5>

                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  
                </div>
                <div>
                  <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="title" class="form-control" id="name" placeholder="Title">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" rows="5" name="body" placeholder="Body ..."></textarea>
                        </div>
                      </div>

                      <div class="col-md-12 mb-3 mt-3">
                      <div class="form-group">
                          <input type="text" name="tags" class="form-control" id="name" placeholder="Enter comma separated tags">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <select name="creator_id">
                            @forelse ($users as $user)
                            <option value="{{$user['id']}}">{{$user['name']}}</option>
                            @empty
                            <option value="Application1">No-users--No</option>
                            @endforelse
                          </select>
                        </div><!--/.form-group-->
                      </div><!--/.col-->

                      <div class="col-md-12 mb-3 mt-3">
                        <div class="form-group">
                          <input type="file" name="post_image" class="form-control" id="name">
                        </div>
                      </div>

                      <div class="col-md-12 text-center">
                        <input type="submit" class="button button-a button-big button-rouded" value="Done">
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

@push('scripts')
<script>
  // function test() {

  // }
</script>
@endpush