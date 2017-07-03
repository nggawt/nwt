@extends('layout.master')
@section('title') Nwt.co.il @endsection
@section('styles')
   <link href="{{ URL::to('styles/pages.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('section')

<div class="container">
    <div class="main_form col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

        <form class="main_form form-horizontal" action="{{ route('users.store') }}" method="post">
            <fieldset>
                <legend>הרשמה</legend>
                <div class="form-group {{ count($errors->userStore)?'form-errors':"" }}">
                    <label class="col-sm-4 control-label" for="firstName">שם</label>
                    <div class=" col-sm-8 col-md-8">
                        <input class="form-control" type="text" name="firstName" id="firstName" value="{{ count($errors->userStore)?old('firstName'):"" }}">
                        @if ($errors->userStore->has('firstName'))
                            <span class="help-block alert-warning input-errors"> {{ $errors->userStore->first('firstName') }} </span>
                        @elseif(count($errors->userStore))
                            <span class="help-block alert-success">השדה תקין</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ count($errors->userStore)?'form-errors':"" }}">
                    <label class="col-sm-4 control-label" for="lastName">שם משפחה</label>
                    <div class=" col-sm-8 col-md-8">
                        <input class="form-control" type="text" name="lastName" id="lastName" value="{{ count($errors->userStore)?old('lastName'):"" }}">
                        @if ($errors->userStore->has('lastName'))
                            <span class="help-block alert-warning input-errors"> {{ $errors->userStore->first('lastName') }} </span>
                        @elseif(count($errors->userStore))
                            <span class="help-block alert-success">השדה תקין</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ count($errors->userStore)?'form-errors':"" }}">
                    <label class="col-sm-4 control-label" for="mYemail">אימייל</label>
                    <div class=" col-sm-8 col-md-8">
                        <input class="form-control" type="email" name="email" id="mYemail" value="{{ count($errors->userStore)?old('email'):"" }}">
                        @if ($errors->userStore->has('email'))
                            <span class="help-block alert-warning input-errors"> {{ $errors->userStore->first('email') }} </span>
                        @elseif(count($errors->userStore))
                            <span class="help-block alert-success">השדה תקין</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ count($errors->userStore)?'form-errors':"" }}">
                    <label class="col-sm-4 control-label" for="password">סיסמה</label>
                    <div class=" col-sm-8 col-md-8">
                        <input class="form-control" type="password" name="password" id="password" />
                        @if ($errors->userStore->has('password'))
                            <span class="help-block alert-warning input-errors"> {{ $errors->userStore->first('password') }} </span>
                        @elseif(count($errors->userStore))
                            <span class="help-block alert-success">השדה תקין</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ count($errors->userStore)?'form-errors':"" }}">
                    <label class="col-sm-4 control-label" for="passwordConfirm">אשר סיסמה</label>
                    <div class=" col-sm-8 col-md-8">
                        <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" />
                        @if ($errors->userStore->has('passwordConfirm'))
                            <span class="help-block alert-warning input-errors"> {{ $errors->userStore->first('passwordConfirm') }} </span>
                        @elseif(count($errors->userStore))
                            <span class="help-block alert-success">השדה תקין</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ count($errors->userStore)?'form-errors':"" }}">
                    <input class="btn btn-default" type="submit" name="submit" value="הרשם" />
                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                </div>

            </fieldset>
        </form>
        <!--@include('errors.errors')-->
    </div>
</div>           
@endsection


@section('sidebar')

@endsection