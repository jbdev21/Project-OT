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
                <h2>@lang('label.edit_teacher')</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="{{route('admin.teacher.update', $teacher->id)}}" method="post" data-parsley-validate class="form-horizontal">
                {{csrf_field()}}
                {{method_field('PUT')}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">@lang('label.username')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" value="{{ $teacher->username }}" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">근무중 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="checkbox" @if($teacher->is_active) checked @endif name="is_active">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.name') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" value="{{ $teacher->name }}" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.gender') *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <br>
                                <p>
                                @lang('label.male'):
                                    <input @if($teacher->gender == "Male") checked @endif type="radio" class="flat" name="gender" id="genderM" value="Male" checked="" required /> &nbsp;&nbsp;&nbsp; @lang('label.female'):
                                    <input @if($teacher->gender == "Female") checked @endif type="radio" class="flat" name="gender" id="genderF" value="Female" />
                                </p>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.contact_number') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="contact_number" value="{{ $teacher->contact_number }}" class="date-picker form-control col-md-7 col-xs-12"  type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.birth_date') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="dob" value="{{ $teacher->dob }}" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date">
                        </div>
                    </div>
                    <br>
                    <h2 class="text-center">@lang('label.account_setting')</h2>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.email_address')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email" value="{{ $teacher->email }}"class="form-control col-md-7 col-xs-12" type="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.password') <small>(for password reset)</small> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password" class="date-picker form-control col-md-7 col-xs-12"  type="password">
                        </div>
                    </div>
                  
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-default"><i class="fa fa-save"></i>@lang('button.save')</button>
                            <a href="{{ route('admin.teacher.index') }}"  class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.cancel')</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
@endsection
