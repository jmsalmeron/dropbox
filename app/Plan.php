<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'plan_name', 'plan_description', 'plan_price', 'plan_type', 'btn_label',
        'amount', 'name', 'description', 'plan_duration'
    ];
}
