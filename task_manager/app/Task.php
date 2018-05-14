<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'assigned_to', 'start_time', 'end_time', 'status',
    ];

    public $timestamps = false;
}
