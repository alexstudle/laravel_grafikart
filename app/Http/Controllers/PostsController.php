<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$posts = Post::published()->searchByTitle("article")->get();

        //User::create(['name' => 'test', 'email' => 'test@test.fr', 'password' => Hash::make('0000')]);
        Auth::attempt(['email' => 'test@test.fr', 'password' => '0000']);
        Auth::logout();

        Session::put('clef', 'valeur');
        Session::put('tableau.first', 'premier');

        $posts = Post::with('category')->get();
		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $post = new Post();
        $categories = Category::lists('name', 'id');
		return view('posts.create', compact('post', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		Post::create($req->all());
        Session::flash('success', 'Article sauvegardé');
		return redirect(route('news.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::published()->where('id', $id)->firstOrFail();
		return $post;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		$categories = Category::lists('name', 'id');
		return view('posts.edit', compact('post', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditPostRequest $req)
	{
        /* Validator manuel !
        $post = Post::findOrFail($id);
        $validator = Validator::make($req->all(), [
           'title' => 'required|min:5',
           'content' => 'required|min:10'
        ]);
        if($validator->fails()){
            return redirect(route('news.edit', $id))->withErrors($validator->errors());
        } else {
            $post->update($req->all());
            return redirect(route('news.index'));
        }*/

        /* Validation automatic on rules
        $this->validate($req, Post::$rules);
        */

        /* Goes even simplier with personal EditPostRequest ! */
        $post = Post::findOrFail($id);
        $post->update($req->all());
        Session::flash('success', 'Article sauvegardé');
        return redirect(route('news.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
