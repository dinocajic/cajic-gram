<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function index($user)
    {
        $user = User::findOrFail($user);

        $follows = false;

        if ( auth()->user() ) {
            $follows = auth()->user()->following->contains($user->id);
        }

        // Caching the post count
        $post_count = Cache::remember('
            count.posts' . $user->id,
            now()->addSeconds(30),
            function() use ($user) {
                return $user->posts->count();
            });

        // Not caching the followers count or following count, but could
        $followers_count = $user->profile->followers->count();
        $following_count = $user->following->count();

        return view('profile.index', [
            'user' => $user,
            'follows' => $follows,
            'post_count' => $post_count,
            'followers_count' => $followers_count,
            'following_count' => $following_count,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title'       => 'required',
            'description' => 'required',
            'url'         => 'url',
            'image'       => 'image',
        ]);


        if ( request('image') ) {
            $image_path = request('image')->store('profile', 'public');

            $image = Image::make("storage/{$image_path}")->fit(600, 600);
            $image->save();

            $image_array = ['image' => $image_path];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $image_array ?? [],
        ));

        return redirect("/profile/{$user->id}" );
    }
}
