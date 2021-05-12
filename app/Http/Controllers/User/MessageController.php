<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-05-12T16:10:43+01:00




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

class MessageController extends Controller
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
        $messages = Message::all();

      return view('user.messages.index', [
        'messages' => $messages
      ]);

      // $user = Auth::user();
      //
      // //display only the patient who is logged in visits and order by date
      // $visits = $user->patient->visits()->orderBy('date', 'asc')->paginate(8);
      //
      // return view('patient.visits.index', [
      //   'visits' => $visits
      // ]);

    }


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


    //when deleting a conversation get them by id in the conversations table and redirect back to conversation index page
    public function destroy(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        //message to appear when a doctor has been deleted
        // $request->session()->flash('danger', 'Conversation deleted successfully!');
        return redirect()->route('user.messages.index');
    }
}
