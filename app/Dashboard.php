<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    // Table Name
    protected $table = 'dashboard_table';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'message_board', 'quote_message', 'staff_picture_title', 'staff_picture_year', 'current_picture', 'week_of', 'week_of_date');
}
