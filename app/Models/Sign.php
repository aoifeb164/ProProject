<?php
# @Date:   2020-12-14T11:57:34+00:00
# @Last modified time: 2020-12-14T13:18:23+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    use HasFactory;
    public function profiles(){
      return $this->hasMany(Profile::class);
    }
}
