<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentUploadController extends Controller
{
    public function documentUpload($request,$name,$request_file,$folder)
    {
        $path = $request->file($request_file)->storeAs(
            $folder, $name
        );
        return $path;
    }
  
}
