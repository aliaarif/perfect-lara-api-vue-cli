<?php
namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LRedis;
use App\User;
use App\Chat;
use App\Friend;
use Auth;
 
class ChatController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
    }
    
	public function sendMessage(){
		
		//return response()->json(['data' => Request::input('message')], 200);

		$redis = LRedis::connection();
		$data = ['message' => Request::input('message'), 'user' => Request::input('user')];
		$redis->publish('message', json_encode($data));
		//return response()->json([]);
		//return response()->json($data, 200);
		return response()->json(['data' => $data['message']], 200);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Auth::user()->friends();
        return view('chat.index')->withFriends($friends);
        //return response()->json($friends, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = User::find($id);
        return view('chat.show', ['friend' => $friend]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }


    public function getChat($id)
    {
        $chat = Chat::where(function($query) use($id){
            $query->where('user_id', '=', Auth::id())
                  ->where('friend_id', '=', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('friend_id', '=', Auth::id())
                  ->where('user_id', '=', $id);
        })->get();

        return $chat;
    }
}
