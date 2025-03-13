<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;

    //define table name
    protected $table = 'tasks';
    //define primary key
    protected $primaryKey = 'id_task';
    //disable timestamps
    public $timestamps = false;
    //fillable column
    protected $fillable = [
        'task',
        'completed',
        'completed_at',
        'created_at',
        'updated_at'
    ];
}
