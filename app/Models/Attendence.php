<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $primaryKey = 'attendence_id';

    protected $fillable = [
        'user_id',
        'event_id',
    ];

    public function user()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }

    public function event()
    {
        return $this->belongsTo(SocietyEvent::class, 'event_id');
    }
}
