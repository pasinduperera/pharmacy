@extends('adminlte::page')

@section('content')
  <div class="box-body">
        <table class="table table-striped table-hover" id="siswa-table">
          <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
          </thead>
          <tbody>
            <?php $no =1;?>
            @foreach ($user as $key => $value)
              <tr>
                <th>{{ $no++ }}</th>
                <th>{{ $value->name }}</th>
                <th>{{ $value->email }}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
  </div>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection