<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Services\MeetingService;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;


class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createByTeacher($subjectid)
    {
        $subject = Subject::with(['teacher'])->findOrFail($subjectid);

        $statusbbb = (new MeetingService())->statusbbb();
        $variable='adsf';
        $otro = \Bigbluebutton::isConnect();
        //$assigned   = Grade::with(['subjects','students'])->findOrFail($classid);
        //$subject   = Subject::findOrFail($subjectid);

        return view('backend.meeting.create', compact('subject','statusbbb' ));


    }

    public function startByTeacher($meetingid){

        $meeting = Meeting::findOrFail($meetingid);
        $user = Auth::user();

        $returndata=Bigbluebutton::getMeetingInfo([
            'meetingID' => $meeting->meetingID,
            'moderatorPW' => $meeting->moderatorPW
        ]);

        if($meeting->isActive){

            if(count($returndata)!=0){
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $meeting->meetingID,
                        'userName' => $user->name,
                        'password' => $meeting->moderatorPW,
                    ])
                );

            }else{
                \Bigbluebutton::create([
                    'meetingID' => $meeting->meetingID,
                    'meetingName' => $meeting->meetingID,
                    'attendeePW' => $meeting->attendeePW,
                    'moderatorPW' => $meeting->moderatorPW,
                    'duration' => 120,
                    'endCallbackUrl'  => route('home'),
                    'logoutUrl' => route('home'),
                    'presentation'  => [ //must be array
                        ['link' => 'http://www.madrid.org/cs/StaticFiles/Emprendedores/GuiaEmprendedor/tema7/F47_7.7_PRESENTACIONES.pdf', 'fileName' => 'doc.pdf']
                    ],
                ]);
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $meeting->meetingID,
                        'userName' => $user->name,
                        'password' => $meeting->moderatorPW,
                    ])
                );
            }

            return redirect()->route('home');
        }else{
            \Bigbluebutton::create([
                'meetingID' => $meeting->meetingID,
                'meetingName' => $meeting->meetingID,
                'attendeePW' => $meeting->attendeePW,
                'moderatorPW' => $meeting->moderatorPW,
                'duration' => 120,
                'endCallbackUrl'  => route('home'),
                'logoutUrl' => route('home'),
                'presentation'  => [ //must be array
                    ['link' => 'http://www.madrid.org/cs/StaticFiles/Emprendedores/GuiaEmprendedor/tema7/F47_7.7_PRESENTACIONES.pdf', 'fileName' => 'doc.pdf']
                ],
            ]);
            $meeting->update([
                'isActive' => true
            ]);
            return redirect()->route('home');
        }
    }
    public function connectByTeacher($meetingid){

    }
    public function stopByTeacher($meetingid){
        $meeting = Meeting::findOrFail($meetingid);
        $user = Auth::user();
        $meeting->update([
            'isActive' => false
        ]);
        return redirect()->route('home');
    }

    public function connectByStudent($meetingid){
        $meeting = Meeting::findOrFail($meetingid);
        $user = Auth::user();

        $returndata=Bigbluebutton::getMeetingInfo([
            'meetingID' => $meeting->meetingID,
            'moderatorPW' => $meeting->moderatorPW
        ]);

        if($meeting->isActive){

            if(count($returndata)!=0){
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $meeting->meetingID,
                        'userName' => $user->name,
                        'password' => $meeting->attendeePW,
                    ])
                );
            }else{
                \Bigbluebutton::create([
                    'meetingID' => $meeting->meetingID,
                    'meetingName' => $meeting->meetingID,
                    'attendeePW' => $meeting->attendeePW,
                    'moderatorPW' => $meeting->moderatorPW,
                    'duration' => 120,
                    'endCallbackUrl'  => route('home'),
                    'logoutUrl' => route('home'),
                    'presentation'  => [ //must be array
                        ['link' => 'http://www.madrid.org/cs/StaticFiles/Emprendedores/GuiaEmprendedor/tema7/F47_7.7_PRESENTACIONES.pdf', 'fileName' => 'doc.pdf']
                    ],
                ]);
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $meeting->meetingID,
                        'userName' => $user->name,
                        'password' => $meeting->attendeePW,
                    ])
                );
            }

            return redirect()->route('home');
        }else{
            //no está activado....
            return redirect()->route('home');
        }
    }


    public function closeByTeacher($meetingid){

        $meeting = Meeting::findOrFail($meetingid);
        Bigbluebutton::close([
            'meetingID' => $meeting->meetingID,
            'moderatorPW' => $meeting->moderatorPW //moderator password set here
        ]);
        return redirect()->route('home');
    }


    //Estado por ajax
    public function statusByTeacher(Request $request){
        $datareq=json_decode($request->getContent(), true);

        $restatus = array();
        foreach (json_decode($datareq,true) as $d){
            foreach (Meeting::find($d) as $v){
                $isActive = ($v->isActive) ? true : false;

                try {
                    $returndata=Bigbluebutton::getMeetingInfo([
                        'meetingID' => $v->meetingID,
                        'moderatorPW' => $v->moderatorPW
                    ]);
                    if (count($returndata)!=0){
                        $isruning = ($returndata['returncode'] == 'SUCCESS') ? true : false;
                        $isActive = ($v->isActive) ? true : false;
                        $data=[
                            'id' => $v->id,
                            'isActive' => $isActive,
                            'state' => $isruning,
                            'running' => $returndata['running']
                        ];
                    }else{
                        $data=[
                            'id' => $v->id,
                            'isActive' => $isActive,
                            'state' => false,
                            'running' => false
                        ];
                    }
                    array_push($restatus,$data);
                }catch (NotFoundHttpException $e){
                    $data=[
                        'id' => $v->id,
                        'isActive' => $isActive,
                        'state' => false,
                        'running' => false
                    ];
                    array_push($restatus,$data);
                }
            }
        }
        return \Response::json($restatus, 200);


    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'startDateTime'  => 'required|date_format:Y-m-d H:i:s',
            'endDateTime'    => 'required|date_format:Y-m-d H:i:s',
            'description'   => 'required|string|max:255'
        ]);

        Meeting::create([
            'subject_id'          => $request->subject_id,
            'meetingID'          => Str::random(10),
            'description'          => $request->description,
            'moderatorPW'  => $request->moderatorPW,
            'attendeePW'    => $request->attendeePW,
            'isActive'   => false,
            'isInstant'   => true,
            'startDateTime'   => $request->startDateTime,
            'endDateTime'   => $request->endDateTime,
            'urlCode'   => Str::random(5)
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
