@extends('layout.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">PLay Video</h3>
    </div>
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">{{$video->name}}</label>
        </div>
        <div class="form-group">
            <div class="embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item" controls>
                    <source src="{{$video->path}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
      </div>
    </form>
  </div>
@endsection

