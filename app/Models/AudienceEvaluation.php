<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudienceEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'received', 'speaker_suggestion', 'event_suggestion',
        'note', 'user_id', 'workshop_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
