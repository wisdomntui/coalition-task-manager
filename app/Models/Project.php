<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Return project task
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
