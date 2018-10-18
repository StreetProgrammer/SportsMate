<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller ;
//use App\Model\File;
use Storage ;
use Illuminate\Http\Request;

class UploadController extends Controller
{
	//$request, $path,$upload_type = 'single', $new_name = null, $file_type, $fil_info = []
    public function upload($data = [])
    {
    	if (in_array('new_name', $data)) {
    		$new_name = $data['new_name'] === null ? time() : $data['new_name'] ;
    	} 
    	
    	if (request()->hasFile($data['file']) && $data['upload_type'] = 'single') {

    		Storage::has($data['delete_file'])? Storage::delete($data['delete_file']) :'' ;
    		
			return request()->file($data['file'])->store($data['path']) ;
		}
    }
}
