<!-- Download and Save Modal  -->
<div class="modal fade" id="downloadSaveModal" tabindex="-1" role="dialog" aria-labelledby="downloadSaveModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('message.downloadAndSave') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mb-5">
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-center">
                        {{ __("message.justIn") }}
                        <h2><strong>{{ __('message.1kwd') }}</strong></h2>
                        <br>
                    </div>
                    <button type="button" class="btn primary-btn text-center text-uppercase addSection">{{__('fields.continue') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Download and Save Modal  -->
<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="downloadModalLabel">{{ __('message.downloadHeader') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="downloadHeader">
                {{ __("message.downloadAndSaveJust") }} <span class="h2">{{ __('message.1kwd') }}</span>
            </div>
            <div class="modal-body mb-5 mt-2">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            {{ __('message.guestLoginTitle') }}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('front.guest.registration') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="{{ __('fields.name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="{{ __('fields.email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn primary-btn text-uppercase">{{__('fields.continue') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 border-left pl-4">
                        <div class="mb-2">
                            {{ __("message.memberLoginTitle") }} {{ config('app.name') }}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('front.login.post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="{{ __('fields.email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="{{ __('fields.password') }}">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="type" value="finalize">
                                    <div class="text-center">
                                        <button type="submit" class="btn primary-btn text-center text-uppercase">{{__('auth.login') }}</button>
                                    </div>
                                </form>
                                <div class="or-seperator">
                                    <span>{{ __('message.or') }}</span>
                                </div>
                                <a class="btn btn-outline-grey btn-block mb-3 text-grey" href="{{ route('google.login') }}">
                                    <img src="{{ asset('front/images/google.svg') }}" height="20" class="mr-2" alt="">
                                    {{ __('auth.Sign up with Google') }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
