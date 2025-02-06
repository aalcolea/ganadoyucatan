<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Carbon\Carbon;
use Carbon\CarbonInterface;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('Admin.Post.index', compact('posts'));
    }

    public function create()
    {
        return view('Admin.Post.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = "posts/{$imageName}";
            Storage::disk('post')->putFileAs('', $image, $imageName);
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        Carbon::setLocale('es');
        $created_at = Carbon::parse($post->created_at)->translatedFormat('j \d\e F \d\e Y'); 
        $contentBlocks = str_split($post->content, 300);

        return view('blogNotice', [
            'title' => $post->title,
            'created_at' => $post->created_at->format('d M Y'),
            'image' => $post->image ? $post->image : 'static/images/fondo-blog.jpg',
            'contentBlocks' => $contentBlocks,
        ]);
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('Admin.Post.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('post')->exists($post->image)) {
                Storage::disk('post')->delete($post->image);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = "posts/{$imageName}";

            Storage::disk('post')->putFileAs('', $image, $imageName);
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente');
        }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post eliminado correctamente.');
    }
    public function getPosts()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('blog', compact('posts'));
    }
}