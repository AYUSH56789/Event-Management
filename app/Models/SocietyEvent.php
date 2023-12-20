<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocietyEvent extends Model
{
    use HasFactory;
    protected $table='society_events';
    protected $primaryKey='event_id';
}
