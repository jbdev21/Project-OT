<?php
/**
 * User: JOFIE BERNAS
 * Date: 1/4/2018
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>@lang('label.new_student')</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="{{route('admin.student.store')}}" method="post" data-parsley-validate class="form-horizontal">
                {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">@lang('label.username') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" value="{{ old('username') }}" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">영어이름(영어로) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" value="{{ old('name') }}" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">한글이름 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" value="{{ old('korean_name') }}" name="korean_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.gender') *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <br>
                                <p>
                                    @lang('label.male'):
                                    <input type="radio" class="flat" name="gender" id="genderM" value="Male" checked="" required /> &nbsp;&nbsp;&nbsp; @lang('label.female'):
                                    <input type="radio" class="flat" name="gender" id="genderF" value="Female" />
                                </p>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.contact_number') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="contact_number" value="{{ old('contact_number') }}" class="checkmobile form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.contact_number1')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="contact_number1" value="{{ old('contact_number1') }}" class="checkmobile form-control col-md-7 col-xs-12" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.date_of_birth') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="dob" value="{{ old('dob') }}" class="date-picker form-control col-md-7 col-xs-12"  type="date">
                        </div>
                    </div>
                    <br>
                    <h2 class="text-center">@lang('label.account_setting')</h2>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.email')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email" value="{{ old('email') }}"class="form-control col-md-7 col-xs-12" type="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.password') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.repeat_password') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password_confirmation" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-default"><i class="fa fa-save"></i>@lang('button.submit')</button>
                            <a href="{{ route('admin.student.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/js/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.checkmobile').mask('(000) 0000000Z', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});   
        })
    </script>
@endsection
