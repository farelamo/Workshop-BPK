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

    public function audience_evaluations(){
        //parameter(Nama table yang direlasi 2, nama table pivot, nama table relasi 1, nama table relasi 2)
        return $this->belongsToMany(User::class, 'audience_evaluations', 'workshop_id', 'user_id')
                    ->withPivot('received', 'speaker_suggestion', 'event_suggestion', 'note', 'user_id');
    }

    public function speaker_evaluations(){
        return $this->hasMany(SpeakerEvaluations::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function Link()
    {
        return $this->belongsTo(Link::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'event_notes')->withPivot('role', 'user_id')->withTimestamps();
    }
}
