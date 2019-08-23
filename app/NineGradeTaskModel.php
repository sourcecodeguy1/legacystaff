<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NineGradeTaskModel extends Model
{
    // Table
    public $table = "nine_grade_task_tbl";
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = ['title', 'color', 'start', 'end'];
}
