<?php
# @Date:   2020-12-14T11:57:54+00:00
# @Last modified time: 2020-12-14T12:39:54+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    public function profile(){
      return $this->belongsTo(Profile::class);
    }
}
