<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-02-04T13:36:03+00:00




namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//calling the paient, user and insurance company models
use App\Models\Conversation;
use App\Models\Sign;
use App\Models\Gender;
use App\Models\Profile;
use App\Models\User;

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
      $conversations = Conversation::all();
      return view('user.messages.index', [
     'conversations' => $conversations
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //when on the add conversation page display the conversations create form page
    public function create()
    {

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
      return view('user.messages.show', [
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
