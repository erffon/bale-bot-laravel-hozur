<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttendanceSession extends Model
{
    protected $fillable =[
        'user_id',
        'work_date',
        'clock_in_at',
        'clock_out_at',
        'duration_minutes',
        'status',
        'note',
    ];

    protected $casts =[
        'work_date' => 'date',
        'clock_in_at' => 'datetime',
        'clock_out_at' => 'datetime',
    ];

    public function user():belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
