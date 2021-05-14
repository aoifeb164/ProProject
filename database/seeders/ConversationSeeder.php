<?php
# @Date:   2021-01-14T12:23:42+00:00
# @Last modified time: 2021-03-10T13:59:18+00:00




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

      $faker = \Faker\Factory::create();

      $numConversations = rand(100,150);
      for ($j = 0; $j != $numConversations; $j++){
        $conversation = new Conversation();
        $conversation->title = $faker->realText(20);
        $conversation->sender_id = Profile::all()->random(1)->first()->id;
        $conversation->recipient_id = Profile::all()->random(1)->first()->id;
        while ($conversation->sender_id === $conversation->recipient_id){
          $conversation->recipient_id = Profile::all()->random(1)->first()->id;
        }
        $conversation->save();

        $numMessages = rand(1,5);

        for ($i = 0; $i != $numMessages; $i++){
          $numParagraphs = rand(2,5);
          $message = new message();
          $message->message = $faker->paragraph($numParagraphs);
          $message->Conversation_id = $conversation->id;
          if (rand(1,2) ===1) $message->sender_id=$conversation->sender_id;
          else $message->sender_id=$conversation->recipient_id;
          $message->save();
        }
      }

    }
}
