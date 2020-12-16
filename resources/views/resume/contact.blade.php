@extends('user.layout.master')
@section('title','Personal Info')
@section('content')

    <main>
        <div class="" id="app">
            <div class="row no-gutters">
                <div class="col-md-1">
                    <div class="logo-wrap">
                        <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png')}}" height="55" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-11 p-0">
                    <div class="step-bar">
                        <step-progress @if(Session::get('locale') == 'ar') :steps="resumeStepsArabic"
                                       @else :steps="resumeSteps" @endif :current-step=1
                                       icon-class="fa fa-check"></step-progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-panel">

                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-panel">
                                    <h3 class="fw-600">{{ __('message.resumeContactHeader') }}</h3>
                                    <p class="sub-header mb-3">{{ __('message.resumeContactSubHeader') }}</p>

                                    @include('notification')
                                    <form class="" method="POST" action="{{ route('resume.save') }}" autofocus="off"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row no-gutters">
                                            <input type="hidden" name="type" value="contact">
                                            @if(isset($resume) && !empty($resume))
                                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                            @endif
                                            @if(isset($resumeEdit) && $resumeEdit == true)
                                                <input type="hidden" name="resume_edit" value="true">
                                            @endif

                                            @if($template->required_image == 1)
                                                <div class="col-md-12">
                                                    <div class="profile-wrap">
                                                      <div class="profile-photo" for="upload-photo">
                                                          <img src="{{ asset('front/images/no-image-placeholder.svg') }}" height="50" alt="">
                                                      </div>

                                                      <label for="upload-photo">Choose Profile Picture</label>

                                                      <input type="file" name="image" id="upload-photo" class="@error('image') is-invalid @enderror"
                                                          @if(!empty($resume->contact_info) && isset($resume->contact_info['image']))
                                                          value="{{ old('image',$resume->contact_info['image']) }}"
                                                          @else
                                                          value="{{ old('image') }}"
                                                          @endif/>

                                                          @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message }}</strong>
                                                            </span>
                                                          @enderror
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <div class="floating-input">
                                                            <input type="file" name="image" id="image"
                                                                   class="form-control @error('image') is-invalid @enderror"
                                                                   @if(!empty($resume->contact_info) && isset($resume->contact_info['image']))
                                                                   value="{{ old('image',$resume->contact_info['image']) }}"
                                                                   @else
                                                                   value="{{ old('image') }}"
                                                                @endif>
                                                            @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            @endif

                                            <div class="col-md-6 pr-md-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="name" id="name"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               required
                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['name']))
                                                               value="{{ old('name',$resume->contact_info['name']) }}"
                                                               @else
                                                               value="{{ old('name') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                               for="name">{{ __('fields.name') }}</label>

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="email" id="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               required
                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['email']))
                                                               value="{{ old('email',$resume->contact_info['email']) }}"
                                                               @else
                                                               value="{{ old('email') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                               for="email">{{ __('fields.email') }}</label>

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr-md-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="phone" id="phone"
                                                               class="form-control @error('phone') is-invalid @enderror"
                                                               required min="1"
                                                               @keypress="onlyNumber($event)"
                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['phone']))
                                                               value="{{ old('phone',$resume->contact_info['phone']) }}"
                                                               @else
                                                               value="{{ old('phone') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                               for="phone">{{ __('fields.phone') }}</label>

                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="address" id="address"
                                                               class="form-control @error('address') is-invalid @enderror"
                                                               required
                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['address']))
                                                               value="{{ old('address',$resume->contact_info['address']) }}"
                                                               @else
                                                               value="{{ old('address') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                               for="address">{{ __('fields.address') }}</label>

                                                        @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 pr-md-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="country" id="country"
                                                               class="form-control @error('country') is-invalid @enderror"

                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['country']))
                                                               value="{{ old('country',$resume->contact_info['country']) }}"
                                                               @else
                                                               value="{{ old('country') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                               for="city">{{ __('fields.country') }}</label>

                                                        @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 pr-md-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="city" id="city"
                                                               class="form-control @error('city') is-invalid @enderror"
                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['city']))
                                                               value="{{ old('city',$resume->contact_info['city']) }}"
                                                               @else
                                                               value="{{ old('city') }}"
                                                               @endif>
                                                        <label class="form-control-placeholder"
                                                               for="city">{{ __('fields.city') }}</label>

                                                        @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 pr-md-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="state" id="state"
                                                               class="form-control @error('state') is-invalid @enderror"
                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['state']))
                                                               value="{{ old('state',$resume->contact_info['state']) }}"
                                                               @else
                                                               value="{{ old('state') }}"
                                                            @endif>
                                                        <label class="form-control-placeholder"
                                                               for="address">{{ __('fields.state') }}</label>

                                                        @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="floating-input">
                                                        <input type="text" name="zipcode" id="zipcode"
                                                               class="form-control @error('zipcode') is-invalid @enderror"
                                                               min="1"
                                                               @keypress="onlyNumber($event)"
                                                               @if(!empty($resume->contact_info) && isset($resume->contact_info['zipcode']))
                                                               value="{{ old('zipcode',$resume->contact_info['zipcode']) }}"
                                                               @else
                                                               value="{{ old('zipcode') }}"
                                                            @endif
                                                        >
                                                        <label class="form-control-placeholder"
                                                               for="zipcode">{{ __('fields.zipcode') }}</label>

                                                        @error('zipcode')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <a type="button"
                                                   class="btn btn-outline-secondary text-center text-uppercase mr-2"
                                                   @if(isset($resumeEdit) && $resumeEdit == true) href="{{ route('resume.finalize',$resume->id) }}"
                                                   @else href="{{ route('resume.choose-template') }}" @endif>{{__('fields.back') }}</a>
                                                <button type="submit"
                                                        class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="resume-item">
                                    <div class="resume-shadow">
                                        <div class="overlayPosition contact"><span class="overlayBG"></span></div>
                                        {!! file_get_contents(asset('storage/'.$template->image)) !!}
                                    </div>
{{--                                    <img alt="{{ $template->name }}"--}}
{{--                                         src="{{ Storage::url($template->image) }}"--}}
{{--                                         class="resume-shadow" height="400">--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            nameReplace($("#name").val());
            $("#name").keyup(function () {
                name = $("#name").val();
                nameReplace(name);
            });
            emailReplace($("#email").val());
            $("#email").keyup(function () {
                email = $("#email").val();
                emailReplace(email);
            });
            contactReplace($("#phone").val());
            $("#phone").keyup(function () {
                phone = $("#phone").val();
                contactReplace(phone);
            });
        });
        function nameReplace(name) {
            if(name != ""){
                $("#PreviewUserFirstName").text(name.toUpperCase());
                $("#PreviewUserLastName").text("");

                var fName = name.substr(0,1);
                var SName = "";
                if(name.indexOf(' ') != -1) {
                    SName = name.substr(name.indexOf(' ') + 1, 1);
                }
                $("#PreviewUserFirstName-Initials").text(fName);
                $("#PreviewUserLastName-Initials").text(SName);
            }
            else{
                $("#PreviewUserFirstName").text("MICHAEL");
                $("#PreviewUserLastName").text("WILLIAMS");
                $("#PreviewUserFirstName-Initials").text("M");
                $("#PreviewUserLastName-Initials").text("W");
            }
        }

        function emailReplace(email) {
            if(email != ""){
                $("#PreviewEmail").text(email);

                var Email = email.substr(0,1);
                if(email.indexOf(' ') != -1) {
                    Email = email.substr(email.indexOf(' ') + 1, 1);
                }
                $("#PreviewEmail-Initials").text(Email);
            }
        }

        function contactReplace(phone) {
            if(phone != ""){
                $("#PreviewPhone").text(phone);

                var Phone = phone.substr(0,1);
                if(phone.indexOf(' ') != -1) {
                    Phone = phone.substr(phone.indexOf(' ') + 1, 1);
                }
                $("#PreviewPhone-Initials").text(Phone);
            }
        }
    </script>
@endsection
