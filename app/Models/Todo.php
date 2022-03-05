<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'deadline',
    ];

    public function setDeadlineAttribute($value)
    {
        $value = Carbon::parse($value, geoip(geoip()->getClientIP())['timezone']);
        $value->setTimezone('UTC');
        $value = $value->format('Y-m-d H:i');
        $this->attributes['deadline'] = $value;
    }
}
