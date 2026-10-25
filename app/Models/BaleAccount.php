<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class BaleAccount extends Model
{
    protected $fillable =[
        'user_id',
        'username',
        'chat_id',
        'bot_user_id',
        'firstname',
        'lastname',
        'verified_at',
    ];
    protected $casts =[
        'verified_at' => 'datetime',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
