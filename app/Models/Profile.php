<?php
# @Date:   2020-12-14T11:57:10+00:00
# @Last modified time: 2021-02-12T11:10:53+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Match;
class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
      'bio',
      'dob',
      'location' ,
      'user_id',
      'gender_id' ,
      'sign_id',
      'photo_id'
    ];

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
      return $this->hasMany(Conversation::class,'sender_id');
    }
    public function joined(){
      return $this->hasMany(Conversation::class,'recipient_id');
    }
    public function matches_recieved(){
      return $this->belongsToMany(Profile::class,'matches','matchee_id','matcher_id')->withPivot('status');
    }
    public function matches_sent(){
      return $this->belongsToMany(Profile::class,'matches','matcher_id','matchee_id')->withPivot('status');
    }


}
