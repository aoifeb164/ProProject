<?php
# @Date:   2020-12-14T11:57:42+00:00
# @Last modified time: 2020-12-14T12:39:24+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
     public function sender(){
          return $this->belongsTo(Profile::class,'sender_id');
        }
        public function recipient(){
          return $this->belongsTo(Profile::class,'recipient_id');
        }

    public function messages(){
      return $this->hasMany(Message::class);
    }
}
