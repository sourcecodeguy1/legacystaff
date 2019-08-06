<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = ['title', 'color', 'start', 'end'];
}
