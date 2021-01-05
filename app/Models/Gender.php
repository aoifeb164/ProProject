<?php
# @Date:   2020-12-14T11:57:28+00:00
# @Last modified time: 2020-12-14T13:18:13+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public function profiles(){
      return $this->hasMany(Profile::class);
    }
    public function interestedProfiles(){
      return $this->belongsToMany(Profile::class,'gender_profile');
    }
}
