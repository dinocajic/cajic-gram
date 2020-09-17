<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Get all the user's that we are following
        $users = auth()->user()->following()->pluck('profiles.user_id');

        // Get the posts from the users that we are following
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image'   => ['required', 'image'],
        ]);

        $image_path = request('image')->store('uploads', 'public');

        $image = Image::make("storage/{$image_path}")->fit(600, 600);
        $image->save();

        // Passing data, or pass an array to create method
        // Post::create($data);

        // Laravel adds the user_id behind the scenes
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image'   => $image_path
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
