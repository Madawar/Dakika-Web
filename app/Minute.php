<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minute extends Model
{

    protected $casts = [
        'minutes' => 'array',
        'agenda' => 'array',
        'attendants' => 'array',
        'recording_filenames' => 'array',

    ];

    protected $fillable = [
        'recording_filenames',
        'minutes',
        'agenda',
        'attendants',
        'meetingId'
    ];
}
