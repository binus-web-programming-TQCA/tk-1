<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Video;

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

    public function listVideo()
    {
        $videos = Video::all();
        return view('pages.list', ['videos' => $videos]);
    }

    public function createVideo()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
         // Validasi input
        $validator = Validator::make($request->all(), [
        'nama_file' => 'required'
        ]);
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload video ke penyimpanan
        // if ($request->hasFile('video')) {
        $videoFile = $request->file('video');
        // dd($request->file('video'));
        $videoPath = $videoFile->store('public/videos');
        $videoPath = str_replace('public/', '', $videoPath);
        // Simpan informasi video ke database
        $video = new Video();
        $video->name = $request->input('nama_file');
        $video->path = $videoPath;
        $video->save();

        return redirect()->route('video.list')->with('success', 'Video berhasil diupload.');
        // }
        

    }
    public function edit(string $id)
    {
        $video = Video::find($id);

        $video->path = Storage::url($video->path);
        
        return view('pages.edit', compact('video'));
    }
    public function update(Request $request, $id)
    {
         // Validasi input
        $validator = Validator::make($request->all(), [
        'nama_file' => 'required'
        ]);
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload video ke penyimpanan
        // if ($request->hasFile('video')) {
        $videoFile = $request->file('video');
        // dd($request->file('video'));
        $videoPath = $videoFile->store('public/videos');
        $videoPath = str_replace('public/', '', $videoPath);
        // Simpan informasi video ke database
         // Hapus video lama dari penyimpanan jika ada
        
         $old = Video::find($id);
         if (!$old) {
             echo "error update";
             exit;
         }


         if (!$old->delete()) {
            echo "error update";
            exit;
        }
        
        $video = new Video();
         
        $video->name = $request->input('nama_file');
        $video->path = $videoPath;
        $video->save();
        if ($video->path) {
            Storage::delete('public/' . $video->path);
        }
        
        return redirect()->route('video.list')->with('success', 'Video berhasil di edit.');
        // }
        

    }

    public function play(string $id)
    {
        $video = Video::find($id);

        $video->path = Storage::url($video->path);
        
        return view('pages.play', compact('video'));
    }

    public function destroy($id)
{
    $video = Video::findOrFail($id);
    $video->delete();

    return redirect()->route('video.list')->with('success', 'Video berhasil dihapus.');
}

}
