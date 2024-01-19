<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsAttendenceActivate extends Model
{
    use HasFactory;

    protected $table = 'is_attendence_activates';
    protected $primaryKey = 'is_activate_attendence_id';

    protected $fillable = [
        'event_id',
        'is_active',
    ];

    public function event()
    {
        return $this->belongsTo(SocietyEvent::class, 'event_id', 'event_id');
    }
}
