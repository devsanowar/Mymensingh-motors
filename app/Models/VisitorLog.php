<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['visit_start', 'visit_end'];
}
