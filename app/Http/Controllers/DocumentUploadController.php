<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentUploadController extends Controller
{
    public function documentUpload($request,$name,$request_file)
    {
        $path = $request->file($request_file)->storeAs(
            'doctors_documents', $name
        );
        return $path;
    }
  
}
