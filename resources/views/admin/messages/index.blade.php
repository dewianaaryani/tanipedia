@extends('admin.layouts.app')
@section('title', 'Message')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Message Table</h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.messages.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search" value="{{ request()->input('query') }}">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{ route('admin.messages.create') }}" class="btn btn-primary">Add</a>
            </div>
            <div class="card-body">
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ $message }}
                    </div>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Pesan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ Str::of($message->message)->limit(50) }}</td>
                                <td>
                                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
                                        <a href="{{ route('admin.messages.edit', $message->id) }}" class="btn btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
