<div class="w-full block mt-8">
    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        <div class="w-full bg-gray-200 text-center border border-gray-300 px-8 py-6 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl">{{ sprintf("%02d", $teacher->classes_count) }}</span>
                <span class="leading-tight">Classes</span>
            </h3>
        </div>
        <div class="w-full bg-gray-200 text-center border border-gray-300 px-8 py-6 mx-0 sm:mx-6 my-4 sm:my-0 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl">{{ sprintf("%02d", $teacher->subjects_count) }}</span>
                <span class="leading-tight">Subjects</span>
            </h3>
        </div>
        <div class="w-full bg-gray-200 text-center border border-gray-300 px-8 py-6 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl">{{ ($teacher->students[0]->students_count) ?? 0 }}</span>
                <span class="leading-tight">Students</span>
            </h3>
        </div>
    </div>
</div>

<div class="w-full block mt-8">
    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        <div class="w-full sm:w-1/8 ml-2 mb-6">
            @foreach ($teacher->classes as $class)
            <h3 class="text-gray-700 uppercase font-bold mt-6">Liste des sujets {{ $class->class_name }}</h3>
                <a href="{{ route('teacher.attendance.create',$class->id) }}" class="bg-gray-200 inline-block mb-4 text-xs text-gray-600 uppercase font-semibold px-4 py-2 border border-gray-200 rounded ui-state-disabled">Présence</a>
            <div class="flex items-center bg-gray-200 rounded-tl rounded-tr">
                <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Code</div>
                <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Subject</div>
                <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Teacher</div>
                <div class="w-1/2 text-left text-gray-600 py-2 px-4 font-semibold">Programmé</div>
                <div class="w-1/2 text-right text-gray-600 py-2 px-4 font-semibold">Meeting</div>
            </div>
            @foreach ($class->subjects as $subject)
                <div class="flex items-center justify-between border border-gray-200">
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->subject_code }}</div>
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->name }}</div>
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->teacher->user->name }}</div>
                    <div class="w-1/2 text-left text-gray-600 py-2 px-4 font-medium">
                        @foreach($subjectmeeting as $submeet)
                            @if((($submeet->id)==$subject->id))
                                @foreach($submeet->meeting as $datameeting)
                                    @if(date($datameeting-> startDateTime) <= now())
                                        <p class="text-red-700 text-sm">{{ $datameeting-> startDateTime }} - {{ $datameeting->endDateTime }}</p>
                                    @else
                                        <p class="text-green-600 text-sm">{{ $datameeting-> startDateTime }} - {{ $datameeting->endDateTime }}</p>
                                    @endif
                                @endforeach
                                @if($submeet->meeting_count==0)
                                    <p class="text-gray-600">Sans planifié</p>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="w-1/2 text-right text-gray-600 py-2 px-4 font-medium">
                            @foreach($subjectmeeting as $submeet)
                                @if((($submeet->id)==$subject->id))
                                    @foreach($submeet->meeting as $datameeting)
                                        <div class="inline-flex py-1">
                                            @if($datameeting->isActive)
                                                <a href="{{ route('teacher.meeting.start',$datameeting->id) }}" class="btn-start bg-blue-600 hover:bg-blue-800 text-sm  text-white uppercase py-2 px-4 flex items-center rounded-l" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" class="svg-inline--fa fa-play fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
                                                    <span class="ml-2 text-xs font-semibold">Début</span>
                                                </a>
                                                <a href="{{ route('teacher.meeting.stop',$datameeting->id) }}" class="bg-orange-600 hover:bg-orange-400 text-sm  text-white uppercase py-2 px-4 flex items-center" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="stop" class="svg-inline--fa fa-stop fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48z"></path>
                                                    </svg>
                                                    <span class="ml-2 text-xs font-semibold">Désactiver</span>
                                                </a>
                                                <a href="{{ route('teacher.meeting.close',$datameeting->id) }}" class="bg-red-600 hover:bg-red-400 text-sm  text-white uppercase py-2 px-4 flex items-center rounded-r" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="close" class="svg-inline--fa fa-close fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">

                                                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                                                    </svg>
                                                    <span class="ml-2 text-xs font-semibold">Finaliser</span>
                                                </a>
                                            @else
                                                <a href="{{ route('teacher.meeting.start',$datameeting->id) }}" class="btn-start bg-green-600 hover:bg-green-800 text-sm  text-white uppercase py-2 px-4 flex items-center rounded-l" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hourglass-start" class="svg-inline--fa fa-hourglass-start fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path fill="currentColor" d="M360 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24 0 90.965 51.016 167.734 120.842 192C75.016 280.266 24 357.035 24 448c-13.255 0-24 10.745-24 24v16c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24v-16c0-13.255-10.745-24-24-24 0-90.965-51.016-167.734-120.842-192C308.984 231.734 360 154.965 360 64c13.255 0 24-10.745 24-24V24c0-13.255-10.745-24-24-24zm-64 448H88c0-77.458 46.204-144 104-144 57.786 0 104 66.517 104 144z"></path>
                                                    </svg>
                                                    <span class="ml-2 text-xs font-semibold">Activer</span>
                                                </a>
                                                <a href="{{ route('teacher.meeting.create',$datameeting->id) }}" class="bg-indigo-300 hover:bg-indigo-400 text-sm text-white uppercase py-2 px-4 flex items-center ui-state-disabled" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wrench" class="svg-inline--fa fa-wrench fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path fill="currentColor" d="M507.73 109.1c-2.24-9.03-13.54-12.09-20.12-5.51l-74.36 74.36-67.88-11.31-11.31-67.88 74.36-74.36c6.62-6.62 3.43-17.9-5.66-20.16-47.38-11.74-99.55.91-136.58 37.93-39.64 39.64-50.55 97.1-34.05 147.2L18.74 402.76c-24.99 24.99-24.99 65.51 0 90.5 24.99 24.99 65.51 24.99 90.5 0l213.21-213.21c50.12 16.71 107.47 5.68 147.37-34.22 37.07-37.07 49.7-89.32 37.91-136.73zM64 472c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path>
                                                    </svg>
                                                    <span class="ml-2 text-xs font-semibold">Désactiver</span>
                                                </a>
                                                <a href="{{ route('teacher.meeting.close',$datameeting->id) }}" class="bg-red-600 hover:bg-red-400 text-sm  text-white uppercase py-2 px-4 flex items-center rounded-r ui-state-disabled" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="close" class="svg-inline--fa fa-close fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">

                                                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                                                    </svg>
                                                    <span class="ml-2 text-xs font-semibold">Finaliser</span>
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                    @if($submeet->meeting_count==0)
                                        <a href="{{ route('teacher.meeting.create',$subject->id) }}" class="bg-gray-300 hover:bg-gray-400 text-xs text-gray-600 uppercase font-semibold px-4 py-2">Nouveau</a>
                                    @endif
                                @endif

                            @endforeach



                    </div>
                </div>
            @endforeach
            @endforeach
        </div>
    </div>
</div> <!-- ./END TEACHER -->
@push('scripts')
    <script>
        $(function() {
            function poll() {
                setTimeout(function () {
                    GetData();
                }, 2000);
            }

            function GetData() {
                meets=[]
                $.each($('.btn-start'),function(i,elem){
                    meets.push(parseInt($(this).attr('data-meet')));
                });
                SendInfo=JSON.stringify({"meet":meets});
                jQuery.ajax({
                    url: "/api/meeting-status",
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: JSON.stringify(SendInfo),
                    contentType: 'application/json; charset=utf-8',
                    success: function(resultData) {
                        console.log(resultData)
                        /*$.each(resultData, function(i, item) {
                            var idactivado='[data-meet="'+resultData[i].id+'"]';
                            if(resultData[i].isActive){
                                $(idactivado).removeClass('ui-state-disabled')
                            }else{
                                $(idactivado).addClass('ui-state-disabled')
                            }
                        })*/
                    },
                    error : function(xhr, textStatus, errorThrown) {
                        //...
                    },
                    complete: function() {
                        poll();
                    },
                    timeout: 0,
                });
            }

            poll();

        })
    </script>
@endpush
