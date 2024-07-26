<footer class="py-5">
  <div class="container">
    <img src="{{ asset('images/footer-ilustration.png') }}" class="footer-ilustration" />
    <div class="row">
      <div class="col-md-3">
        <img src="{{ asset('images/logo.png') }}" />
        <p>website penyedia informasi untuk para petani</p>
      </div>
      <div class="col-md-2 mt-3 mt-md-0">
        <h6>Page Menus</h6>
        <ul>
          <li><a href="{{route("welcome")}}">Home</a></li>          
          <li><a href="/#about">About</a></li>
          <li><a href="/#information">Information</a></li>
        </ul>
      </div>
      <div class="col-md-5 mt-3 mt-md-0">
        <form action="{{route('sendMessage')}}" method="post" enctype="multipart/form-data">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="contact-form">
            <h4>We'd love to hear your brilliant idea!</h4>
            <input type="text" placeholder="Email" name="email">
            <textarea placeholder="Write your message here.." rows="4" name="message"></textarea>
            <div class="d-block mt-2">
              <button class="btn btn--primary" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</footer>