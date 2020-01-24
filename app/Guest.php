<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['meal', 'will_attend', 'name', 'email', 'allergies'];
}
