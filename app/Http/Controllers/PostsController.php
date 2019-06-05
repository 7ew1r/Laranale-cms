<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $categories = Category::All();
            return view('create')->with('categories', $categories);
        } else {
            return redirect('login')->with('message', 'ログインしてください。');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'cat_id' => 'required',
        ];

        $messages = array(
            'title.required' => 'タイトルを正しく入力してください。',
            'content.required' => '本文を正しく入力してください。',
            'cat_id.required' => 'カテゴリーを選択してください。',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $post = new Post;
            $post->user_id = $request->get('user_id');
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->cat_id = $request->get('cat_id');
            $post->comment_count = $request->get('comment_count');
            $post->save();
            return redirect('posts')
                ->with('message', '投稿が完了しました。');
        } else {
            return redirect('posts/create')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('single')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $login_user_id = Auth::id();
        $post = Post::find($id);
        if ($post->user_id == $login_user_id) {
            $categories = Category::All();
            return view('edit')->with(['post' => $post, 'categories' => $categories]);
        } else {
            return redirect('posts');
        }
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
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'cat_id' => 'required',
        ];

        $messages = array(
            'title.required' => 'タイトルを正しく入力してください。',
            'content.required' => '本文を正しく入力してください。',
            'cat_id.required' => 'カテゴリーを選択してください。',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $post = Post::find($id);
            $post->user_id = $request->get('user_id');
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->cat_id = $request->get('cat_id');
            $post->save();
            return redirect("posts/{$id}")
                ->with('message', '投稿が完了しました。');
        } else {
            return redirect('posts/create')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');
    }
}
