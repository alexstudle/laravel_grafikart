<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about(){
	    $title = "À propos";
	    $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	    return view('pages/about', compact('title', 'numbers'));
    }

}
