<?php
namespace App\Services;

class MeetingService
{

    public function statusbbb(){
        if(\Bigbluebutton::isConnect()){
            return true;
        }else{
            return false;
        }
    }

    public function CreateMetting($duration){
        $createMeeting = \Bigbluebutton::initCreateMeeting([
            'meetingID' => 'tamku',
            'meetingName' => 'test meeting',
            'attendeePW' => 'attendee',
            'moderatorPW' => 'moderator',
        ]);

        $createMeeting->setDuration($duration); //overwrite default configuration
        \Bigbluebutton::create($createMeeting);
    }

    public function JoinMetting(){

    }
}
