<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request,$name,$folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        // $request->file($name)->storeAs('attachments/library/',$file_name,'upload_attachments');
        // $request->file($name)->storeAs('attachments/',$folder.'/'.$file_name,'upload_attachments');
        $request->file($name)->storeAs('attachments/',$folder.'/'.$file_name,'upload_attachments');
    }
    public function deleteFile($name,$folder)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/',$folder.'/'.'upload_attachments');
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/',$folder.'/'.'upload_attachments');
        }
    }
}




