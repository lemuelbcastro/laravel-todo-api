<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeScheduleDateBefore(Builder $query, $date): Builder
    {
        return $query->where('schedule_date', '<=', Carbon::parse($date));
    }

    public function scopeScheduleDateAfter(Builder $query, $date): Builder
    {
        return $query->where('schedule_date', '>=', Carbon::parse($date));
    }

    public function scopeScheduleDateBetween(Builder $query, $fromDate, $toDate): Builder
    {
        return $query->whereBetween('schedule_date', [Carbon::parse($fromDate), Carbon::parse($toDate)]);
    }
}
