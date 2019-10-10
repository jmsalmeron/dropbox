<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('admin.files.create');
    }

    public function images()
    {
        $images = File::whereUserId(auth()->id())->OrderBy('id', 'desc')->where('type', '=', 'image')->get();
        $folder = str_slug(Auth()->user()->name .'-'. Auth()->id());
        return view('admin.files.type.images', compact('images','folder'));
    }

    public function videos()
    {
        $videos = File::whereUserId(auth()->id())->OrderBy('id', 'desc')->where('type', '=', 'video')->get();
        $folder = str_slug(Auth()->user()->name .'-'. Auth()->id());
        return view('admin.files.type.videos', compact('videos','folder'));
    }

    public function audios()
    {
        $audios = File::whereUserId(auth()->id())->OrderBy('id', 'desc')->where('type', '=', 'audio')->get();
        $folder = str_slug(Auth()->user()->name .'-'. Auth()->id());
        return view('admin.files.type.audios', compact('audios','folder'));
    }

    public function documents()
    {

        if(Auth::check() && Auth::user()->hasRole('ADMIN')){
            $documents = File::where('type', '=', 'document')->OrderBy('id', 'desc')->get();
        }else{
            $documents = File::whereUserId(auth()->id())->OrderBy('id', 'desc')->where('type', '=', 'document')->get();
        }

        $folder = str_slug(Auth()->user()->name .'-'. Auth()->id());
        return view('admin.files.type.documents', compact('documents','folder'));
    }

    public function paper()
    {
        $trashs = File::whereUserId(auth()->id())->OrderBy('id', 'desc')->onlyTrashed()->get();
        return view('admin.files.type.trash', compact('trashs'));
    }

    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtension());
        $this->validate($request, [
           'file.*' => 'required|file|mimes:' .$all_ext . '|max:' .$max_size
        ]);
        $files = $request->file('file');
        foreach($files as $file){
            $uploadFile = new File();
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $number = rand(1, 100000);
            $name_unique = $number . $name;
            $type = $this->getType($ext);

            if(Storage::putFileAs('/public/'.$this->getUserFolder().'/'.$type.'/', $file, $name_unique .'.'. $ext)){
                $uploadFile::create([
                    'name' => $name,
                    'name_unique' => $name_unique,
                    'type' => $type,
                    'extension' => $ext,
                    'folder' => $this->getUserFolder(),
                    'user_id' => Auth::id()
                ]);
            }
        }


        return back()->with('info', ['success', 'Archivo subido con exito']);
    }

    private $img_ext = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
    private $video_ext = ['mp4', 'avi', 'vid', 'MP4', 'AVI', 'VID'];
    private $document_ext = ['xlsx', 'doc', 'docx', 'pdf', 'odt', 'DOC', 'DOCX', 'PDF', 'ODT', 'XLSX'];
    private $audio_ext = ['m4a', 'mp3', 'mpga', 'wma', 'ogg', 'MP3', 'MPGA', 'WMA', 'OGG'];

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
        $folder = Auth()->user()->name .'-'. Auth()->id();
        return str_slug($folder);
    }

    public function byebye($id)
    {
        $file=  File::onlyTrashed()->where('id', $id)->first();
        if(Storage::disk('local')->exists('/public/' .$this->getUserFolder() .'/'. $file->type .'/'. $file->name_unique . '.' . $file->extension)){
            if(Storage::disk('local')->delete('/public/' .$this->getUserFolder() .'/'. $file->type .'/'. $file->name_unique . '.' . $file->extension)){
                $file->forceDelete();
                return back()->with('info', ['success', 'El archivo se elimino correctamente']);
            }
        }
    }

    public function destroy(Request $request)
    {
        $file = File::findOrFail($request->get('file_id'));
        $file->delete();
        return back()->with('info', ['success', 'El archivo se elimino correctamente']);
    }

    public function restore($id)
    {
        File::onlyTrashed()->where('id', $id)->restore();
        return back()->with('info', ['success', 'El archivo se restauro correctamente']);
    }
}
