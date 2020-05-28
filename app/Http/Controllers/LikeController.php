<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Like;
use App\Reply;

class LikeController extends Controller
{

    /**
     * Create a new LikeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }
 
    public function litkeIt(Reply $reply)
    {
        $reply->like()->create([
            //'user_id' => auth()->id
            'user_id' => 1
        ]);

        return response('created', Response::HTTP_OK);
    }

    public function unLitkeIt(Reply $reply)
    {
        //$reply->like()->where(['user->id', auth()->id])->first()->delete();
        $reply->like()->where('user->id', 1)->first()->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
