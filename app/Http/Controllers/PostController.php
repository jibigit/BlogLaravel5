<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create variable and store all the blog posts in it from the database

        $posts = Post::orderBy('id', 'desc')-> paginate(5);  // Je veux afficher les post par liste de 5 ( cf index, function render)

        // return a view and pass in the above variable

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data

        $this->validate($request, array(

                'title' => 'required|max:255',
                'slug'=> 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        Session::flash('success', 'Votre post a été sauvegardé');

       return redirect()->route('posts.show', $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as var

        // return view and pass in the var we previously create

        $post = Post::find($id);
        return view('posts.edit')->withPost($post);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   // Validate the data
        $post = Post::find($id);
        if ($request->input('slug') ==  $post->slug){

            $this->validate($request, array(

                'title' => 'required|max:255',
                
                'body' => 'required'
            ));


        } else {
            $this->validate($request, array(

                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }
        


        // Store the data

        $post = Post::find($id);  // cherche l'id du post

        $post->title = $request->input('title'); // prends l'input title pour modif
        $post->slug = $request->input('slug');
        $post->body = $request->input('body'); // 

        $post->save();


        // set flash data with success message

        Session::flash('success','Post sauvegardé');

        // Redirect with flash data sessions to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);  // Va chercher l'id du post

        $post->delete(); // appelle la fonction delete sur le post

        Session::flash('success','Post supprimé'); // Création session flash 

        return redirect()->route('posts.index'); // Redirection sur l'index

    }
}
