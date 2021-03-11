<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-03-11T17:41:01+00:00




namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
//calling the paient, user and insurance company models
use App\Models\Profile;

class MatchesController extends Controller
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

      //when requesting the index page display the profiles index and get all the profiles from the profiles table
      public function index()
      {
      $user = Auth::user();

      $matches_sent = $user->profile->matches_sent;
      $matches_recieved = $user->profile->matches_recieved;
    //  dd($matches_sent);

      return view('user.matches.index', [
     'matches_recieved' => $matches_recieved,
     'matches_sent' => $matches_sent
      ]);

    }

   //when storing a new profile the fields are validated by making sure they have entered data and inputed using correct information format
    public function store(Request $request)
    {
      $matcher_id = $request->input('matcher_id');
      $matchee_id = $request->input('matchee_id');

      $matcher = Profile::find($matcher_id);
      $matchee = Profile::find($matchee_id);

      $matcher->matches_sent()->attach($matchee->id, ['status'=>'pending']);
      return redirect()->route('user.home');
    }

     //when updating a new profile the fields are validated by making sure they have inputed and they are using correct information format
    public function accept(Request $request)
    {
      //dd($request);
      $matcher_id = $request->input('matcher_id');
      $matchee_id = $request->input('matchee_id');

      $matcher = Profile::find($matcher_id);
      $matchee = Profile::find($matchee_id);

      $match = $matcher->matches_sent()->find($matchee->id);

      $match->pivot->status='accepted';
      $match->pivot->save();
      return redirect()->route('user.matches.index');
    }

    public function reject(Request $request)
    {
      $matcher_id = $request->input('matcher_id');
      $matchee_id = $request->input('matchee_id');

      $matcher = Profile::find($matcher_id);
      $matchee = Profile::find($matchee_id);

      $match=$matcher->matches_sent()->find($matchee->id);
      $match->pivot->status='rejected';
      $match->pivot->save();
      return redirect()->route('user.matches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when deleting a profile get them by id in the profiles table and redirect back to profile index page
    public function destroy(Request $request, $id)
    {
        $profile_matchee = Profile::findOrFail($id);
        $profile_matchee->delete();

        //message to appear when a doctor has been deleted
        // $request->session()->flash('danger', 'Profile deleted successfully!');
        return redirect()->route('user.matches.index');
    }
}
