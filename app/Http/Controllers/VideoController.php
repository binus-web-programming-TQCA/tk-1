<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadVideo(Request $request)
    {
        $videoPath = $request->file('video')->store('videos', 'public');
        $filename = basename($videoPath);
        return redirect()->route('video.play', ['filename' => $filename]);
    }

    public function playVideo($filename)
    {
        $videoPath = Storage::disk('video')->url($filename);
        return view('play', ['videoPath' => $videoPath]);
    }
}
