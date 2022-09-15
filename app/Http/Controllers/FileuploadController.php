<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
class FileuploadController extends Controller
{
    function index()
    {
        return view('fileupload');
    }



    function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|max:1024|mimes:png,jpg, jpeg, gif'
        ]);

        // We can Store and Move Files in 2 ways.
        // This method store in storage folder and use storage:link for access
        if ($request->has('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('profiles', $fileName);
        }
        // Access by method of asset('storage/profiles/imagename');



        // This Method used in Public Folder
        if ($request->has('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('profilesmove'), $fileName);
        }
        // Access by method of asset('profilesmove/imagename');

        return back()
                ->with('message', 'File Moved Success fully')
                ->with('path', $path);

    }

    function delete() {
        $filePath = "public/profile/test.jpg";
        if(Storage::exists($filePath)) {
            Storage::delete($filePath);
            echo "file Deleted successfully";
        }
        else {
            echo "File does not exist";
        }

        // $filePath = "storage/profile/test.jpg";
        // if(File::exists(public_path($filePath))){
        //     File::delete(public_path($filePath));
        //     echo "file Deleted successfully";
        // }else{
        //     dd('File does not exists.');
        // }
    }

    function download()
    {
        $filePath = "public/profile/download.jpg";
        if(Storage::exists($filePath)) {
            return Storage::download($filePath);
        }
        else {
            echo "File does not exist";
        }
    }*
}
