<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'venue_id',
        'scheduled_date',
        'dosage'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
