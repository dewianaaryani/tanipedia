@extends('auth.layouts.app')

@section('content')
	<form action="{{ route('postRegist') }}" method="POST">
		@csrf
		<div class="form-group mb-3">
			<label for="name" class="form-label text-md-right">Name</label>
			<input type="text" id="name" class="form-control" name="name" required>
			@if ($errors->has('name'))
				<small class="text-danger">{{ $errors->first('name') }}</small>
			@endif
		</div>
		<div class="form-group mb-3">
			<label for="email_address" class="form-label text-md-right">Email</label>
				<input type="text" id="email_address" class="form-control" name="email" required>
				@if ($errors->has('email'))
					<small class="text-danger">{{ $errors->first('email') }}</small>
				@endif
		</div>
		<div class="form-group mb-3">
			<label for="password" class="form-label text-md-right">Password</label>
			<input type="password" id="password" class="form-control" name="password" required>
			@if ($errors->has('password'))
				<small class="text-danger">{{ $errors->first('password') }}</small>
			@endif
		</div>		
		<button type="submit" class="btn btn--primary w-100 mt-3">
				Register Now
		</button>
	</form>
@endsection