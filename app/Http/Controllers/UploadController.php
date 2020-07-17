<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        $uploads = Upload::all();

        return view("upload", ['uploads' => $uploads]);
    }

    public function save(Request $request)
    {

        $title = $request->input('title');

        if($request->hasFile('file')) {
            $file = $request->file('file');

            $fileName = $file->getFilename();

            $path = 'uploads'; // путь к сохраненному файлу
            //save in disk
            \Storage::disk('uploads')->putFileAs($path, $file, $file->getClientOriginalName());

            //save in db
            $created = Upload::create([
                'title' => $title,
                'pathFile' =>  $file->getClientOriginalName()
            ]);
            $uploads = Upload::all();
            if($created) {
                return view("upload", ['uploads' => $uploads])->with('success', 'Success uploaded');
            }
            return back()->with('error', 'Can\'t upload file');
        }
        return back();
    }
}
