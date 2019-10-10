<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'name_unique', 'type', 'extension', 'folder', 'user_id'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function getUrlAttribute()
    {
        if (substr($this->image, 0, 4) == 'http') {
            return $this->image;
        }
        return '/images/products/' . $this->image;
    }
}
