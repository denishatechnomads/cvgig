@section('styles')
    @include('template.letter.style')
    <div class="row">
        <div class="col-sm-12 custom_resume_card">
            <ul class='sortable'>
                @foreach($userLetter->sortable as $value)

                    @if($value == "contact_info")
                        <li id="contact_info">
                            <div class="row contact">
                                <div class="col-sm-12">
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="contactInfoMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="contactEdit"
                                           href="{{ route('letter.contact',$userLetter->id) }}">Edit</a>
                                    </div>

                                    <h4>
                                        <strong>
                                            @if(isset($userLetter->contact_info['first_name']) && !empty($userLetter->contact_info['first_name']))
                                                {{ $userLetter->contact_info['first_name'] }}
                                            @endif
                                            @if(isset($userLetter->contact_info['last_name']) && !empty($userLetter->contact_info['last_name']))
                                                {{ $userLetter->contact_info['last_name'] }}
                                            @endif
                                        </strong>
                                    </h4>
                                    <hr/>
                                    <p>
                                        @if(isset($userLetter->contact_info['address']) && !empty($userLetter->contact_info['address']))
                                            {{ $userLetter->contact_info['address'] }},
                                        @endif
                                        @if(isset($userLetter->contact_info['city']) && !empty($userLetter->contact_info['city']))
                                            {{ $userLetter->contact_info['city'] }},
                                        @endif
                                        @if(isset($userLetter->contact_info['state']) && !empty($userLetter->contact_info['state']))
                                            {{ $userLetter->contact_info['state'] }},
                                        @endif

                                        @if(isset($userLetter->contact_info['country']) && !empty($userLetter->contact_info['country']))
                                            {{ $userLetter->contact_info['country'] }}
                                        @endif
                                        @if(isset($userLetter->contact_info['zipcode']) && !empty($userLetter->contact_info['zipcode']))
                                            - {{ $userLetter->contact_info['zipcode'] }}
                                            <br>
                                        @endif
                                        @if(isset($userLetter->contact_info['phone']) && !empty($userLetter->contact_info['phone']))
                                            {{ $userLetter->contact_info['phone'] }}
                                            <br>
                                        @endif
                                        @if(isset($userLetter->contact_info['email']) && !empty($userLetter->contact_info['email']))
                                            {{ $userLetter->contact_info['email'] }}
                                        @endif
                                    </p>
                                    <p>{{ date('M d,Y') }}</p>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if($value == "recipient_info")
                        <li id="recipient_info">
                            <div class="row recipient">
                                <div class="col-sm-12">
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="recipientInfoMove"
                                           href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="recipientEdit"
                                           href="{{ route('letter.recipient',$userLetter->id) }}">Edit</a>
                                    </div>
                                    @if(isset($userLetter->recipient_info['first_name']) && !empty($userLetter->recipient_info['first_name']))
                                        Recipient {{ $userLetter->recipient_info['first_name'] }}
                                    @endif
                                    @if(isset($userLetter->recipient_info['last_name']) && !empty($userLetter->recipient_info['last_name']))
                                        {{ $userLetter->recipient_info['last_name'] }}
                                    @endif
                                    <p>
                                        @if(isset($userLetter->recipient_info['address']) && !empty($userLetter->recipient_info['address']))
                                            {{ $userLetter->recipient_info['address'] }},
                                        @endif
                                        @if(isset($userLetter->recipient_info['city']) && !empty($userLetter->recipient_info['city']))
                                            {{ $userLetter->recipient_info['city'] }},
                                        @endif
                                        @if(isset($userLetter->recipient_info['state']) && !empty($userLetter->recipient_info['state']))
                                            {{ $userLetter->recipient_info['state'] }},
                                        @endif

                                        @if(isset($userLetter->recipient_info['country']) && !empty($userLetter->recipient_info['country']))
                                            {{ $userLetter->recipient_info['country'] }}
                                        @endif
                                        @if(isset($userLetter->recipient_info['zipcode']) && !empty($userLetter->recipient_info['zipcode']))
                                            - {{ $userLetter->recipient_info['zipcode'] }}
                                            <br>
                                        @endif
                                        @if(isset($userLetter->recipient_info['phone']) && !empty($userLetter->recipient_info['phone']))
                                            {{ $userLetter->recipient_info['phone'] }}
                                            <br>
                                        @endif
                                        @if(isset($userLetter->recipient_info['email']) && !empty($userLetter->recipient_info['email']))
                                            {{ $userLetter->recipient_info['email'] }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if($value == "subject")
                        <li id="subject">
                            <div class="subject">
                                @if(isset($userLetter->subject) && !empty($userLetter->subject))
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="subjectMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="subjectEdit"
                                           href="{{ route('letter.subject',$userLetter->id) }}">Edit</a>
                                    </div>
                                    <p>{!!  $userLetter->subject !!}</p>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if($value == "greeting")
                        <li id="greeting">
                            <div class="greeting">
                                @if(isset($userLetter->greeting) && !empty($userLetter->greeting))
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="greetingMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Edit" id="greetingEdit"
                                           href="{{ route('letter.greeting',$userLetter->id) }}">Edit</a>
                                    </div>
                                    <p>{!!  $userLetter->greeting !!}</p>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if($value == "opener")
                        <li id="opener">
                            <div class="opener">
                                @if(isset($userLetter->opener) && !empty($userLetter->opener))
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="greetingMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Opener Edit" id="openerEdit"
                                           href="{{ route('letter.opener',$userLetter->id) }}">Edit</a>
                                    </div>
                                    <p>{!!  $userLetter->opener !!} </p>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if($value == "body")
                        <li id="body">
                            <div class="body">
                                @if(isset($userLetter->body) && !empty($userLetter->body))
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="bodyMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Body Edit" id="bodyEdit"
                                           href="{{ route('letter.body',$userLetter->id) }}">Edit</a>
                                    </div>
                                    <p>{!!  $userLetter->body !!} </p>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if($value == "call_to_action")
                        <li id="call_to_action">
                            <div class="call_to_action">
                                @if(isset($userLetter->call_to_action) && !empty($userLetter->call_to_action))
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="call_to_actionMove"
                                           href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Call to action Edit" id="callToActionEdit"
                                           href="{{ route('letter.call-to-action',$userLetter->id) }}">Edit</a>
                                    </div>
                                    <p>{!!  $userLetter->call_to_action !!} </p>
                                @endif
                            </div>
                        </li>
                    @endif

                    @if($value == "closer")
                        <li data-id="7" data-type="closer">
                            <div class="closer">
                                @if(isset($userLetter->closer) && !empty($userLetter->closer))
                                    <div class="letterAction">
                                        <a class="btn-custom btn-red handle" title="move" id="closerMove" href="#"><i
                                                class="fa fa-arrows"></i> </a>
                                        <a class="btn-custom btn-red" title="Closer Edit" id="closerEdit"
                                           href="{{ route('letter.closer',$userLetter->id) }}">Edit</a>
                                    </div>
                                    <p>{!!  $userLetter->closer !!} </p>
                                @endif
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>
    </div>
