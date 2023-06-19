@extends('layout.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('videos.update',['id'=>$video->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Video</label>
                <input type="text" class="form-control" name="nama_file" id="nama_file" value="{{ $video->name}}"
                    required placeholder="nama Video">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="video" id="video" accept="video/mp4"
                            required>
                        <label class="custom-file-label" for="video">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
</div>
@endsection
