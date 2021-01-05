<?php
# @Date:   2020-12-14T11:57:22+00:00
# @Last modified time: 2020-12-14T12:52:15+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;
    public function profiles(){
      return $this->belongsToMany(Profile::class);
    }
}
