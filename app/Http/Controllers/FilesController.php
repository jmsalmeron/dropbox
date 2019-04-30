<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function create()
    {
        return view('admin.files.create');
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtension());
        $this->validate(request(), [
           'file' => 'required|file|mimes:' .$all_ext . '|max:' .$max_size
        ]);
        $uploadFile = new File();

        $file = $request->file('file');
        $name = time().$file->getClientOriginalExtension();
        $ext = $file->getClientOriginalExtension();
        $type = $this->getType($ext);

        if(Storage::putFileAs('/public/'.$this->getUserFolder().'/'.$type.'/', $file, $name .'.'. $ext)){
            $uploadFile::create(['name' => $name, 'type' => $type, 'extension' => $ext, 'user_id' => Auth::id()]);
        }

        return 'Archivo subido';
    }

    private $img_ext = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
    private $video_ext = ['mp4', 'avi', 'MP4', 'AVI'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt', 'DOC', 'DOCX', 'PDF', 'ODT'];
    private $audio_ext = ['mp3', 'mpga', 'wma', 'ogg', 'MP3', 'MPGA', 'WMA', 'OGG'];

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getType($ext)
    {
        if (in_array($ext, $this->img_ext)){
            return 'image';
        }
        if (in_array($ext, $this->video_ext)){
            return 'video';
        }
        if (in_array($ext, $this->document_ext)){
            return 'document';
        }
        if (in_array($ext, $this->audio_ext)){
            return 'audio';
        }
    }

    private function allExtension()
    {
        return array_merge($this->img_ext, $this->video_ext, $this->document_ext, $this->audio_ext);
    }

    private function getUserFolder()
    {
        return Auth()->user()->name .'-'. Auth()->id();
    }
}
