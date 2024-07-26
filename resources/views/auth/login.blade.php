@extends('auth.layouts.app')

@section('content')
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
      <label for="email_address" class="col-form-label text-md-right">Email</label>
      <input type="text" id="email_address" class="form-control" name="email" required>
      @if ($errors->has('email'))
        <small class="text-danger">{{ $errors->first('email') }}</small>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="password" class="col-form-label text-md-right">Password</label>
      <input type="password" id="password" class="form-control" name="password" required>
      @if ($errors->has('password'))
        <small class="text-danger">{{ $errors->first('password') }}</small>
      @endif
    </div>
    
    <button type="submit" class="btn btn--primary w-100 py-2" >Login Now</button>
  </form>
@endsection