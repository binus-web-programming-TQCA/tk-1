@extends('layout.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Striped Full Width Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Nama</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($videos as $n => $item)
            <tr>
                <td>{{++$n}}</td>
                <td>{{$item->name}}</td>
                <td><a href="{{ route('videos.destroy', $item->id) }}" class="badge bg-danger">Hapus</a><a href="{{ route('videos.play', $item->id) }}" class="badge bg-primary">Play</a><a href="{{ route('videos.edit', $item->id) }}" class="badge bg-warning">Edit</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

