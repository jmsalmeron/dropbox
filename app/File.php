<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'type', 'extension', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
