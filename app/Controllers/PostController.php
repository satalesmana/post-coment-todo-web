<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
	var $post;
	public function __construct(){
		$post = new \App\Models\Post();
	}

	public function index()
	{
		//
	}

	public function create(){
		$post = new \App\Models\Post();
		$input = $this->getRequestInput($this->request);
		
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = json_encode($input). "\n";
		fwrite($myfile, $txt);
		fclose($myfile);

		if($post->save($input) === false){
			return $this->response->setStatusCode(422)
				->setJSON([$this->post->errors()]);
		}else{
			return $this->response->setJSON(['message'=>'data berhasil disimpan']);
		}
	}
}
