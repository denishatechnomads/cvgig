@extends('user.layout.master')
@section('title','Recipient Info')
@section('content')
    <main>
        <div class="" id="app">
            <div class="row no-gutters">
                <div class="col-md-1">
                    <div class="logo-wrap">
                        <a href="{{ url('/') }}"><img src="{{ asset('front/images/logo.png')}}" height="42" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-11 p-0">
                    <div class="step-bar">
                        <step-progress @if(Session::get('locale') == 'ar') :steps="letterStepsArabic"
                                       @else :steps="letterSteps" @endif :current-step=2
                                       icon-class="fa fa-check"></step-progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-panel">
                        <div class="form-panel pt-2">
                            <div class="row">
                                <div class="col-sm-7">
                                <h2>{{ __('message.letterRecipientHeader') }}</h2>
                                <p class="sub-header mb-3">&nbsp;</p>
                                @include('notification')
                                <form class="" method="POST" action="{{ route('letter.save') }}" autofocus="off">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="type" value="recipient">
                                        @if(isset($userLetter) && !empty($userLetter))
                                            <input type="hidden" name="letter_id" value="{{ $userLetter->id }}">
                                        @endif
                                        @if(isset($editLetter) && $editLetter == true)
                                            <input type="hidden" name="letter_edit" value="true">
                                        @endif
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="first_name" id="first_name"
                                                           class="form-control @error('first_name') is-invalid @enderror"

                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['first_name']))
                                                           value="{{ old('first_name',$userLetter->recipient_info['first_name']) }}"
                                                           @else
                                                           value="{{ old('first_name') }}"
                                                        @endif
                                                    >
                                                    <label class="form-control-placeholder"
                                                           for="first_name">{{ __('fields.first_name') }}</label>

                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="last_name" id="last_name"
                                                           class="form-control @error('last_name') is-invalid @enderror"

                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['last_name']))
                                                           value="{{ old('last_name',$userLetter->recipient_info['last_name']) }}"
                                                           @else
                                                           value="{{ old('last_name') }}"
                                                        @endif
                                                    >
                                                    <label class="form-control-placeholder"
                                                           for="last_name">{{ __('fields.last_name') }}</label>

                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="email" id="email"
                                                           class="form-control @error('email') is-invalid @enderror"

                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['email']))
                                                           value="{{ old('email',$userLetter->recipient_info['email']) }}"
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

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="phone" id="phone"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           maxlength="10" min="1" max="9"
                                                           @keypress="onlyNumber($event)"
                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['phone']))
                                                           value="{{ old('phone',$userLetter->recipient_info['phone']) }}"
                                                           @else
                                                           value="{{ old('phone') }}"
                                                        @endif
                                                    >
                                                    <label class="form-control-placeholder"
                                                           for="zipcode">{{ __('fields.phone') }}</label>

                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="address" id="address"
                                                           class="form-control @error('address') is-invalid @enderror"
                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['address']))
                                                           value="{{ old('address',$userLetter->recipient_info['address']) }}"
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

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="country" id="country"
                                                           class="form-control @error('country') is-invalid @enderror"

                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['country']))
                                                           value="{{ old('country',$userLetter->recipient_info['country']) }}"
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

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="city" id="city"
                                                           class="form-control @error('city') is-invalid @enderror"
                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['city']))
                                                           value="{{ old('city',$userLetter->recipient_info['city']) }}"
                                                           @else
                                                           value="{{ old('city') }}"
                                                        @endif

                                                    >
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

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="state" id="state"
                                                           class="form-control @error('state') is-invalid @enderror"

                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['state']))
                                                           value="{{ old('state',$userLetter->recipient_info['state']) }}"
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

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="floating-input">
                                                    <input type="text" name="zipcode" id="zipcode"
                                                           class="form-control @error('zipcode') is-invalid @enderror"
                                                           maxlength="10" min="1" max="9"
                                                           @keypress="onlyNumber($event)"
                                                           @if(!empty($userLetter->recipient_info) && isset($userLetter->recipient_info['zipcode']))
                                                           value="{{ old('zipcode',$userLetter->recipient_info['zipcode']) }}"
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
                                               class="btn btn-outline-secondary text-center text-uppercase"
                                               @if(isset($editLetter) && $editLetter == true) href="{{ route('letter.finalize', $userLetter->id) }}"
                                               @else href="{{ route('letter.contact') }}" @endif>{{__('fields.back') }}</a>
                                            <button type="submit"
                                                    class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                <div class="col-md-5">
                                    <div class="resume-item">
                                        <img alt="{{ $template->name }}" src="{{ Storage::url($template->image) }}" class="resume-shadow" >
                                    </div>
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
            $("#title").text("test");
        });

    </script>
@endsection
