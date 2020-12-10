<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'subject_id',
        'meetingID',
        'description',
        'moderatorPW',
        'attendeePW',
        'isActive',
        'isInstant',
        'startDateTime',
        'endDateTime',
        'urlCode'
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }




}
