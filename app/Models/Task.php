<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['text', 'images', 'user_id', 'status', 'importance', 'created_by'];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
