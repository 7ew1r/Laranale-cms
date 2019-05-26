<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'commenter' => 'required',
            'comment' => 'required',
        ];

        $messages = array(
            'commenter.required' => 'タイトルを正しく入力してください。',
            'comment.required' => '本文を正しく入力してください。',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $comment = new Comment;
            $comment->commenter = $request->get('commenter');
            $comment->comment = $request->get('comment');
            $post_id_ = $request->get('post_id');
            $comment->post_id = $post_id_;
            $comment->save();
            $post = Post::find($post_id_);
            $post->increment('comment_count');

            return back()
                ->with('message', '投稿が完了しました。');
        } else {
            return back()
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
        $category_posts = Post::where('cat_id', $id)->get();
        return view('category')
            ->with('category_posts', $category_posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
