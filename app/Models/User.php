<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['fullname','NIP', 'email', 'unit'];
    protected $hidden   = ['NIP'];
    protected $casts    = ['email_verified_at' => 'datetime'];

    public function audience_evaluations(){
        return $this->hasMany(AudienceEvaluations::class);
    }

    public function speaker_evaluations(){
        return $this->hasMany(SpeakerEvaluations::class);
    }

    public function workshops(){
        return $this->belongsToMany(Workshop::class, 'event_notes');
    }
}
