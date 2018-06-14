<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::latest('updated_at')->paginate(6);
        $total = Comment::count();
        return view('dashboard.comments.index',compact('comments','total'));
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
        $validator = Validator::make(request()->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'body' => 'required',
        ]);
        if($validator -> fails()){
            return redirect('/#contact')->withErrors($validator);
        }
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phone = $request->phone;
        $comment->body = $request->body;
        
        $comment->save();

        
        return redirect('/#contact')->with('message','Comment Sent Successful, we will notify you via your email');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        return view('dashboard.comments.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        $comment->delete();
        return redirect()->back()->with('message','Comment Successful deleted');
    }

    public function getEmail(){
        return view('dashboard.comments.show');
    }

    public function postEmail(Request $request){
        $this->validate(request(),[
            'to' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $data  = array(
            'to' => $request->to,
            'title' => $request->title,
            'body' => $request->body
        );

        try {

            Mail::send('emails.show', $data, function ($message) use ($data)
            {
                $message->to($data['to']);
                $message->from('feisal@domain.com');
                $message->subject('Natma Tech');

            });
            return redirect()->back()->with('message','Email Sent');
            
        } catch (\Swift_SwiftException $exception) {
           return redirect()->back()->with('error','Can sent mail due to your network');
       }
   }
}
