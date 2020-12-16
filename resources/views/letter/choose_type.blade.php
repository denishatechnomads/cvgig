@extends('user.layout.master')
@section('title','Choose Letter Type')

@section('styles')

@endsection

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
                        <step-progress :steps="letterSteps" :current-step=0 icon-class="fa fa-check"></step-progress>
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
                                    <h3>{{ __('message.letterTypeHeader') }}</h3>
                                    @include('notification')
                                    <form class="" method="POST" action="{{ route('letter.type.selected') }}" autofocus="off">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="type" value="type">
                                            @if(isset($userLetter) && !empty($userLetter))
                                                <input type="hidden" name="letter_id" value="{{ $userLetter->id }}">
                                            @endif


                                            @foreach($letters as $key=>$letter)
                                                <div class="col-sm-6">
                                                    <label class="radio-inline p-10">
                                                        <input type="radio" name="type" value="{{ $letter->name }}"
                                                               class="selectSection"
                                                               @if(empty($userLetter) && $key == 0) checked @endif
                                                        "> {{ $letter->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mt-5">
                                                    <a type="button"
                                                       class="btn btn-outline-secondary text-center text-uppercase"
                                                       href="{{ route('letter.choose-template') }}">{{__('fields.back') }}</a>
                                                    <button type="submit"
                                                            class="btn primary-btn text-center text-uppercase ">{{__('fields.save&next') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

@endsection
