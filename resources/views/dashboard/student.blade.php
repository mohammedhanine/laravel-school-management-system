
<div class="mt-8 bg-white rounded">
        <div class="w-full px-6 py-12">
            <div class="accordion flex flex-col items-center justify-center">
                <!--  Panel 1  -->
                <div class="w-1/1 w-full">
                    <input type="checkbox" name="panel" id="panel-1" class="hidden">
                    <label for="panel-1" class="labelaccordion relative block bg-gray-100 text-gray-600 p-4 border-b border-grey">Données des étudiants</label>
                    <div class="accordion__content overflow-hidden bg-grey-lighter">
                        <h2 class="accordion__header pt-4 pl-4">Informations personnelles</h2>
                        <p class="accordion__body p-4 text-gray-600" id="panel1">pour la modification des données, vous devez passer un contrat avec l'école</p>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Name :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="block text-gray-600 font-bold">{{ $student->user->name }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Email :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="text-gray-600 font-bold">{{ $student->user->email }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Roll Number :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="text-gray-600 font-bold">{{ $student->roll_number }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Phone :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="text-gray-600 font-bold">{{ $student->phone }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Gender :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="text-gray-600 font-bold">{{ $student->gender }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Date of Birth :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="text-gray-600 font-bold">{{ $student->dateofbirth }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Current Address :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="text-gray-600 font-bold">{{ $student->current_address }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Permanent Address :
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <span class="text-gray-600 font-bold">{{ $student->permanent_address }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Class :
                                </label>
                            </div>
                            <div class="md:w-2/3 block text-gray-600 font-bold">
                                <span class="text-gray-600 font-bold">{{ $student->class->class_name }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Student Parent :
                                </label>
                            </div>
                            <div class="md:w-2/3 block text-gray-600 font-bold">
                                <span class="text-gray-600 font-bold">{{ $student->parent->user->name }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Parent Email :
                                </label>
                            </div>
                            <div class="md:w-2/3 block text-gray-600 font-bold">
                                <span class="text-gray-600 font-bold">{{ $student->parent->user->email }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Parent Phone :
                                </label>
                            </div>
                            <div class="md:w-2/3 block text-gray-600 font-bold">
                                <span class="text-gray-600 font-bold">{{ $student->parent->phone }}</span>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Parent Address :
                                </label>
                            </div>
                            <div class="md:w-2/3 block text-gray-600 font-bold">
                                <span class="text-gray-600 font-bold">{{ $student->parent->current_address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel 2 -->
                <div class="w-1/1 w-full">
                    <input type="checkbox" name="panel" id="panel-2" class="hidden">
                    <label for="panel-2" class="labelaccordion relative block bg-gray-100 text-gray-600 p-4 border-b border-grey">Alertes</label>
                    <div class="accordion__content overflow-hidden bg-grey-lighter">
                        <h2 class="accordion__header pt-4 pl-4">0 Alertes</h2>
                        <p class="accordion__body p-4">Aucune alerte actuellement.</p>
                    </div>
                </div>
                <!--  Panel 3  -->
                <div class="w-1/1 w-full">
                    <input type="checkbox" name="panel" id="panel-3" class="hidden">
                    <label for="panel-3" class="labelaccordion relative block bg-gray-100 text-gray-600 p-4 border-b border-grey">Matériel d'aide</label>
                    <div class="accordion__content overflow-hidden bg-grey-lighter">
                        <h2 class="accordion__header pt-4 pl-4">Matériel d'aide</h2>
                        <p class="accordion__body p-4">il n'est pas disponible</p>
                    </div>
                </div>
            </div>


            <div class="w-full px-0 md:px-6 py-12">
                <div class="flex items-center bg-gray-200">
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Code</div>
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Subject</div>
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Teacher</div>
                    <div class="w-1/2 text-left text-gray-600 py-2 px-4 font-semibold">Programmé</div>
                    <div class="w-1/2 text-right text-gray-600 py-2 px-4 font-semibold">Meeting</div>
                </div>
                @foreach ($student->class->subjects as $subject)
                    <div class="flex items-center justify-between border border-gray-200 -mb-px">
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
                                                <a href="{{ route('student.meeting.connect',$datameeting->id) }}" class="btn-start bg-blue-600 hover:bg-blue-800 text-sm  text-white uppercase py-2 px-4 flex items-center rounded" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" class="svg-inline--fa fa-play fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
                                                    <span class="ml-2 text-xs font-semibold">Début</span>
                                                </a>
                                            @else
                                                <a href="{{ route('student.meeting.connect',$datameeting->id) }}" class="btn-start bg-blue-600 hover:bg-blue-800 text-sm  text-white uppercase py-2 px-4 flex items-center rounded ui-state-disabled" data-meet="{{ $datameeting->id }}">
                                                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" class="svg-inline--fa fa-play fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
                                                    <span class="ml-2 text-xs font-semibold">Début</span>
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                    @if($submeet->meeting_count==0)
                                        <p class="text-gray-600">Sans planifié</p>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="w-full px-0 md:px-6 py-12">
                <div class="flex items-center bg-gray-200">
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Date</div>
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Class</div>
                    <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-semibold">Teacher</div>
                    <div class="w-1/4 text-right text-gray-600 py-2 px-4 font-semibold">attendance</div>
                </div>
                @foreach ($student->attendances as $attendance)
                    <div class="flex items-center justify-between border border-gray-200 -mb-px">
                        <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-medium">{{ $attendance->attendence_date }}</div>
                        <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-medium">{{ $attendance->class->class_name }}</div>
                        <div class="w-1/4 text-left text-gray-600 py-2 px-4 font-medium">{{ $attendance->teacher->user->name }}</div>
                        <div class="w-1/4 text-right text-gray-600 py-2 px-4 font-medium">
                            @if($attendance->attendence_status)
                                <span class="text-xs text-white bg-green-500 px-2 py-1 rounded">P</span>
                            @else
                                <span class="text-xs text-white bg-red-500 px-2 py-1 rounded">A</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



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
                    url: "/api/meeting",
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: JSON.stringify(SendInfo),
                    contentType: 'application/json; charset=utf-8',
                    success: function(resultData) {
                        $.each(resultData, function(i, item) {
                            var idactivado='[data-meet="'+resultData[i].id+'"]';
                            if(resultData[i].isActive){
                                $(idactivado).removeClass('ui-state-disabled')
                            }else{
                                $(idactivado).addClass('ui-state-disabled')
                            }
                        })
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
