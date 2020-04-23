<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    public function uploadToGoogleDriveFile(Request $RequestInput)
    {

        $file_src = $RequestInput->file("upload_file_google"); //file src

        $is_file_uploaded = Storage::disk('google')->put(env('GOOGLE_DRIVE_FOLDER_ID'), $file_src);

        if ($is_file_uploaded) {
            return Redirect::back()->withErrors(['msg' => 'Succesfuly file uploaded to dropbox']);
        } else {
            return Redirect::back()->withErrors(['msg' => 'file failed to uploaded on dropbox']);
        }
    }
    public function uploadToDropboxFile(Request $RequestInput)
    {

        $file_src = $RequestInput->file("upload_file_dropbox"); //file src

        $is_file_uploaded = Storage::disk('dropbox')->put('public-uploads', $file_src);

        if ($is_file_uploaded) {
            return Redirect::back()->withErrors(['msg' => 'Succesfuly file uploaded to dropbox']);
        } else {
            return Redirect::back()->withErrors(['msg' => 'file failed to uploaded on dropbox']);
        }
    }
    
}
