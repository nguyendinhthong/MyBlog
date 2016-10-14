<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Session;
use App\MyLib;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //create a variable and store all the blog posts in it form the database.
        $inputs = $request->all();
        if (isset($inputs['filter'])) {
            $temp=$request->input('filter');
        }
        else {
            $temp=0;
        }
        
        $posts = Post::where('id','>',$temp)->paginate(5);


        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //Validate the data
        $this->validate($request,array(
        'title'=>'required|max:255', 
        'body'=>'required'
        ));
                       
        //store in the database
        $post=new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        
        $post->save();
        
        Session::flash('Success','The blog post was sccuessfully save!');

        //redirect to another page
        return redirect()->route('posts.show',$post->id);
     
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
        //
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
        //Find the post in the database and save as var
        $post = Post::find($id);
        
        //return the view and pass in the var we previously created
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
    {
        //Validate the data 
        $this->validate($request,array(
        'title'=>'required|max:255', 
        'body'=>'required'
        ));

        //Save the data to database
        $post= Post::find($id);

        $post->title=$request->input('title');
        $post->body=$request->input('body');
        
        $post->save();
        
        //set flash data with success message
         Session::flash('Success','The blog post was sccuessfully updated!');

        //Redirect with flash dât to posts.show
        return redirect()->route('posts.show',$post->id);
     
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
    }
}
