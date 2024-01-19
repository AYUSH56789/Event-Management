<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Event_Reg extends Model
{
    use HasFactory;

    protected $table = 'user__event__regs';
    protected $primaryKey = 'event_reg_id';

    // Define a relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    // Define a relationship with the Event model
    public function event()
    {
        return $this->belongsTo(SocietyEvent::class, 'event_id', 'event_id');
    }
}
