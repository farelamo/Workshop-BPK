<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Note extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'workshop_id', 'role'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function workshop()
    {
        return $this->hasOne(Workshop::class);
    }
}
