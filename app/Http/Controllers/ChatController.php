<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;

use App\Models\Ad;
use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ChatController extends Controller
{

    private $adId;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return mixed
     */
    public function getAdId()
    {
        return $this->adId;
    }

    /**
     * @param mixed $adId
     */
    public function setAdId($adId): void
    {
        $this->adId = $adId;
    }



    /**
     * Show chats
     *
     *
     */
    public function chat($id)
    {
        $ad=Ad::query()->find($id);
        $room=$this->fetchRoom($id);


        if (is_null($room)){
            $room= new ChatRoom([
                'id_user1'=>Auth::id(),
                'id_user2'=>$ad->user_id,
                'ad_id'=>$ad->id,
                Carbon::now()->timestamp
            ]);

            $room->save();
        }
        if (isset($room->room_id)){
            return redirect('/read/'.$room->room_id);
        }else{
            return redirect('/chat/'.$id);
        }

    }


    public function read($id)
    {
        $room=ChatRoom::query()->find($id);
       ;
        $ad=Ad::query()->find($room->ad_id);

        return view('pages/test',['room'=>$room,'ad'=>$ad,'user'=>Auth::user()]);
    }
    /**
     * Fetch all messages
     *
     *
     */
    public function fetchMessages($idRoom)
    {

        return (Message::query()->join('users','users.id','=','messages.id_user')->where('id_room','=',$idRoom)->get());

    }

    public function fetchRoom($id)
    {
        return ( ChatRoom::query()
            ->select('*','chat-rooms.id as room_id')
            ->where('ad_id','=',$id)
            ->where('id_user1','=',Auth::id())
            ->join('users','users.id','=','chat-rooms.id_user1')
            ->first());

    }


    /**
     * Persist message to database
     *
     * @param Request $request
     *
     */
    public function sendMessage(Request $request)
    {

        $message = new Message([
            'id_room'=>$request->input('room')['id'],
            'id_user'=>Auth::id(),
            'message' => $request->input('message'),
            'created_at'=> Carbon::now()->timestamp,
        ]);
        $message->save();
        $user=Auth::user();
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];

    }
    public function inbox($id){
        $rooms=ChatRoom::query()
            ->select('*','chat-rooms.id as room_id')
            ->where('ad_id','=',$id)
            ->join('users','users.id','=','chat-rooms.id_user1')
            ->get();
        return view('pages/rooms',['rooms'=>$rooms]);
    }

}
