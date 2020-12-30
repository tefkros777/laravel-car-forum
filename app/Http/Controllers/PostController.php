<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Pass in the collection of all users to use in the dropdown menu

        $users = User::orderBy('id', 'asc')->get(); //dead code
        return view('posts.create', ['users' => $users]);
    }

    public function solve(Post $post)
    {
        if(!Gate::allows('manage-post', $post)){
            abort(403);
        }

        $post->solved = true;
        $post->save();
        return redirect()->back()->with('message', 'Post marked as solved');

    }

    use UploadTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|numeric',
            'title' => 'required|max:255',
            'description' => 'required',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Create the model, put the data in it, save it to the database
        $p = new Post;
        $p->title = $validatedData['title'];
        $p->description = $validatedData['description'];
        $p->user_id = $validatedData['user_id'];
        $p->save();

        // Upload the photo after creating the post resource

        // Check if a post image has been uploaded
        if ($request->has('post_image')) {
            // dd($request);
            // Get image file
            $image = $request->file('post_image');
            // Make an image name based on post id and current timestamp
            $name = Str::slug($p->id . '_' . time());
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $p->post_image = $filePath;
            // Save image to the database
            $p->save();
        }

        session()->flash('message', "Post created successfully");

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->paginate(5);
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user->id != Auth::user()->id) {
            return redirect()->route('posts.index')->with('message', 'You are not authorised to edit this resource');
        }
        return view('posts.edit', ['post' => $post]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $p = Post::find($id);
        $p->title = $validatedData['title'];
        $p->description = $validatedData['description'];
        $p->save();

        return redirect()->route('posts.index')->with('message', 'Post edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('message', "Post deleted");
        return redirect()->route('posts.index');
    }
}
