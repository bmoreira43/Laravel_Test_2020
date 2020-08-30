<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'link_short', 'link', 'ip', 'user_id'
    ];
}
