<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'destination', 'image',
        'document', 'date', 'link_id', 'user_id'
    ];

    public function event_notes(){
        return $this->hasMany(Event_Note::class);
    }
}
