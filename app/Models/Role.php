<?php
# @Date:   2020-11-03T10:37:06+00:00
# @Last modified time: 2020-11-06T13:46:33+00:00

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_role');
    }
}
