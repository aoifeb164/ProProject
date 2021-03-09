<?php
# @Date:   2020-12-14T11:57:34+00:00
# @Last modified time: 2021-03-09T17:42:37+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compatability extends Model
{
  protected $table= 'compatablities';
    use HasFactory;
    public function first(){
      return $this->belongsTo(Profile::class, 'first_sign_id');
    }
    public function second(){
      return $this->belongsTo(Profile::class, 'second_sign_id');
    }
}
