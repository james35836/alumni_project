<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['user'])->get();

        return response()->json($messages);
    }
    public function store(Request $request)
	{
		// dd($request->all());
		$data = $request->message;
     // $message = $request->user()->messages()->create([
     //     'message' => $request->message,
     //     'group_id' => 1,
     //     // 'user_id' => 1,
     //     // 'receiver_id' => $request->body,
     // ]);
	// $article = Message::create($request->all());

 //        return response()->json($article, 201);

     // return response()->json($message);
        return Message::create([
            'message' => $request->message,
            'group_id' => 1,
            'user_id' => 1,
            'receiver_id' => 1,
        ]);
	}
}