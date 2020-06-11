<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Like;
use App\Reply;
use App\Events\LikeEvent;

class LikeController extends Controller
{

    /**
     * Create a new LikeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('JWT');
    }
 
    public function litkeIt(Reply $reply)
    {
        $reply->like()->create([
            'user_id' => auth()->id()
        ]);
        \broadcast(new LikeEvent($reply->id, 1))->toOthers();

    }

    public function unLitkeIt(Reply $reply)
    {
        
        $reply->like()->where('user->id', auth()->id())->first()->delete();
        \broadcast(new LikeEvent($reply->id, 0))->toOthers();
        
    }
}
