<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "nid",
        "venue_id",
        "status"
    ];

    public function schedule(){
        return $this->hasOne(Schedule::class, 'user_id');
    }

    public function venue(){
        return $this->belongsTo(Venue::class, 'venue_id', 'id');
    }

}
