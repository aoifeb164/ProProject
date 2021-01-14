<?php
# @Date:   2021-01-14T12:45:43+00:00
# @Last modified time: 2021-01-14T13:12:47+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Conversation;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $message = new message();
      $message->message ='whats your favourite colour? mines yellow :)';
      $message->Conversation_id = $conversation->$id;
      $message->save();
    }
}
