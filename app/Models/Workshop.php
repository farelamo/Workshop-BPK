<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'destination', 'image', 'total_audience',
        'document', 'date', 'link_id', 'topic_id', 'total_visited'
    ];

    public function event_notes(){
        return $this->hasMany(Event_Note::class);
    }

    public function audience_evaluations(){
        return $this->hasMany(AudienceEvaluations::class);
    }

    public function speaker_evaluations(){
        return $this->hasMany(SpeakerEvaluations::class);
    }
}
