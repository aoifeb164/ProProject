<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-03-10T17:58:32+00:00




namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
//calling the paient, user and insurance company models
use App\Models\Conversation;
use App\Models\Sign;
use App\Models\Gender;
use App\Models\Profile;
use App\Models\User;
use App\Models\Message;

class ConversationController extends Controller
{

      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth');
          $this->middleware('role:user');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      //when requesting the index page display the conversations index and get all the conversations from the conversations table
      public function index()
      {
      $user = Auth::user();
      $conversations = Conversation::all();
      $profile = Profile::all();
      $conversations = $user->profile->joined()->orderBy('id', 'asc')->paginate(8);
    //  $conversations = $user->profile->joined()->orderBy('id', 'asc')->paginate(8);

      return view('user.conversations.index', [
        'conversations' => $conversations,
        'profile' =>$profile
      ]);

      // $user = Auth::user();
      // $conversations = Conversation::all();
      // $conversations = $user->profile->joined()->orderBy('id', 'asc')->paginate(8);
      //
      // return view('user.conversations.index', [
      //   'conversations' => $conversations
      // ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //when on the add conversation page display the conversations create form page
    public function create()
    {
      $users = User::all();
      $profiles = Profile::all();
      $conversations = Conversation::all();
      $messages = Message::all();

      return view('user.conversations.create', [
      'users'=> $users,
      'profiles'=> $profiles,
      'conversations'=> $conversations,
      'messages' => $messages
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   //when storing a new conversation the fields are validated by making sure they have entered data and inputed using correct information format
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|max:191',
        'sender_id' => 'required',
        'recipient_id' => 'required',

        'message' => 'required',
        'sender_id'=>'required'
      ]);

      $conversation = new Conversation();
      $conversation->title = $request->input('title');
      $conversation->sender_id = $request->input('sender_id');
      $conversation->recipient_id = $request->input('recipient_id');
      $conversation->save();

      $message = new Message();
      $message->message = $request->input('message');
      $message->conversation_id = $conversation->id;
      $message->sender_id = $request->input('sender_id');
      $message->save();

      return redirect()->route('user.conversations.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when requesting the show conversation page display the conversations show page and get the conversation by id from the conversations table
    public function show($id)
    {
      //find the conversation by id
      $message = Message::findOrFail($id);

      return view('user.messages.index', [
        'message' => $message
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when requesting to edit a conversation display the conversation edit page and get the conversation by id from the conversations table
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when updating a new conversation the fields are validated by making sure they have inputed and they are using correct information format
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when deleting a conversation get them by id in the conversations table and redirect back to conversation index page
    public function destroy(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();

        //message to appear when a doctor has been deleted
        // $request->session()->flash('danger', 'Conversation deleted successfully!');
        return redirect()->route('user.conversations.index');
    }
}
