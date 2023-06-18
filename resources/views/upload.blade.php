<!DOCTYPE html>
<html>
<head>
    <title>Upload and Play Video</title>
</head>
<body>
<h1>Upload and Play Video</h1>

<form action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="video">
    <button type="submit">Upload</button>
</form>
</body>
</html>
