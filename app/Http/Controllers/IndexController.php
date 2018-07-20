<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Request;


class IndexController extends Controller {

	public function getData(){

		$posts = DB::table('news_site')->orderBy('date', 'desc')->get();
		if(sizeof($posts) > 0):

		return view('modules.welcome')
		->with('posts', $posts);

		else:

			$post = 1;
			return view('modules.welcome')
			->with('post', $post);

		endif;

	}

	public function showPost($idNews){

		$resposta = DB::table('news_site')->where('idNews', [$idNews])->get();

		if(empty($resposta)){
			return "Esse Post Não Existe";
		}

		return view('modules.posts')
		->with('p', $resposta[0]);
	}
}
