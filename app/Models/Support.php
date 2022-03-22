<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function relationWithUser()
    {
        return $this->belongsTo(User::class, 'auth_id', 'id');
    }


}
