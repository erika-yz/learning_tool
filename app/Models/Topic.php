<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_name',
        'topic_description',
        'Status_id',
    ];

    public function users(){
        return $this->belongsToMany(User::class)
                    ->withTimestamps();
    }

    public function status(){
        return $this->hasMany(Status::class);
    }
}
