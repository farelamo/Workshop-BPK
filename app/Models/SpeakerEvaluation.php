<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakerEvaluation extends Model
{
    use HasFactory;

    protected $fillable = ['comfortable', 'event_suggestion', 'user_id', 'workshop_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function workshop()
    {
        return $this->hasOne(Workshop::class);
    }
}
