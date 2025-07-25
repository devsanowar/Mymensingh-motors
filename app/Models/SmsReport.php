<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsReport extends Model
{
    protected $guarded = ['id'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
