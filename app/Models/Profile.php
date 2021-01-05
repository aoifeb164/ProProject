<?php
# @Date:   2020-12-14T11:57:10+00:00
# @Last modified time: 2020-12-14T13:12:38+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function photos(){
      return $this->hasMany(Photo::class);
    }
    public function photo(){
      return $this->belongsTo(Photo::class, 'photo_id');
    }
    public function genders(){
      return $this->belongsToMany(Gender::class);
    }
    public function gender(){
      return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function relationships(){
      return $this->belongsToMany(Relationship::class);
    }
    public function signs(){
      return $this->belongsToMany(Sign::class);
    }
    public function sign(){
      return $this->belongsTo(Sign::class, 'sign_id');
    }
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function started(){
      return $this->belongsTo(Conversation::class,'sender_id');
    }
    public function joined(){
      return $this->belongsTo(Conversation::class,'recipient_id');
    }

}
