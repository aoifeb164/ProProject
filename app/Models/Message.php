<?php
# @Date:   2020-12-14T11:57:49+00:00
# @Last modified time: 2020-12-14T12:52:17+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public function conversation(){
      return $this->belongsTo(Conversation::class);
    }
}
