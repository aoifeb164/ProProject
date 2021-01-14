<?php
# @Date:   2021-01-14T12:23:42+00:00
# @Last modified time: 2021-01-14T15:39:11+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Profile;
class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $conversation = new Conversation();
      $conversation->title ='hello';
      $conversation->sender_id = Profile::all()->random(1)->first()->id;
      $conversation->recipient_id = Profile::all()->random(1)->first()->id;
      $conversation->save();

      $message = new message();
      $message->message ='hello, saw your profile and thought i would send a message';
      $message->Conversation_id = $conversation->id;
      $message->save();

      $conversation = new Conversation();
      $conversation->title ='how you doing?';
      $conversation->sender_id = Profile::all()->random(1)->first()->id;
      $conversation->recipient_id = Profile::all()->random(1)->first()->id;
      $conversation->save();

      $message = new message();
      $message->message ='hello, how are you doing?';
      $message->Conversation_id = $conversation->id;
      $message->save();

      $conversation = new Conversation();
      $conversation->title ='where are you from?';
      $conversation->sender_id = Profile::all()->random(1)->first()->id;
      $conversation->recipient_id = Profile::all()->random(1)->first()->id;
      $conversation->save();

      $message = new message();
      $message->message ='where are you from?';
      $message->Conversation_id = $conversation->id;
      $message->save();

      $conversation = new Conversation();
      $conversation->title ='whats your favourite colour?';
      $conversation->sender_id = Profile::all()->random(1)->first()->id;
      $conversation->recipient_id = Profile::all()->random(1)->first()->id;
      $conversation->save();

      $message = new message();
      $message->message ='whats your favourite colour? mines yellow :)';
      $message->Conversation_id = $conversation->id;
      $message->save();
    }
}
