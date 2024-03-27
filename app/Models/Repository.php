<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'html_url',
        'language',
        'stargazers_count',
        'user_id'
    ];
    public $timestamps = false;
}
