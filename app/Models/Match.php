<?php
# @Date:   2021-02-04T14:40:53+00:00
# @Last modified time: 2021-02-04T14:44:08+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  use HasFactory;
   public function matcher(){
        return $this->belongsTo(Profile::class,'matcher_id');
      }
      public function matchee(){
        return $this->belongsTo(Profile::class,'matchee_id');
      }
}
