@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('main-content')
<div class="row">
  <!-- Stats Widget -->
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Users</h4>
        </div>
        <div class="card-body">
          {{$totalUsers}}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-haykal"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Farms</h4>
        </div>
        <div class="card-body">
          {{$totalFarms}}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-cube"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Products</h4>
        </div>
        <div class="card-body">
          {{$totalProducts}}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-envelope"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Messages</h4>
        </div>
        <div class="card-body">
          {{$totalMessages}}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Recent Messages -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Recent Messages</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Message</th>
              <th>Action</th>
            </tr>
            @foreach($recentMessages as $message)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $message->email }}</td>
              <td>{{ $message->message }}</td>
              <td>
                <a href="{{ route('admin.messages.edit', $message->id) }}" class="btn btn-info">View</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  @endsection
  
