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
                <h2>@lang('label.new_teacher')</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="{{route('admin.teacher.store')}}" method="post" data-parsley-validate class="form-horizontal">
                {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">@lang('label.username')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" value="{{ old('username') }}" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">근무중 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="checkbox" name="is_active">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.password') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password" class="form-control col-md-7 col-xs-12" required="required" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.repeat_password')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password_confirmation" class="form-control col-md-7 col-xs-12" required="required" type="password">
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.name') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" value="{{ old('name') }}" name="name" required="required" class="form-control col-md-7 col-xs-12">
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
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.contact_number')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="contact_number" value="{{ old('contact_number') }}" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.birth_date') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="row">
                                <div class="col-sm-3">
                                    <input required  onchange="updateDOB()" id="year" class="form-control" maxlength="4" name="year" placeholder=" Year">
                                </div>
                                <div class="col-sm-4">
                                    <select required onchange="updateDOB()" class="form-control" id="month" name="month">
                                        <option value=""> @lang('label.month')</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input required id="day" onchange="updateDOB()" type="number" name="day" class="form-control" min="1" max="31" placeholder="Day">
                                </div>
                            </div>
                            <input type="hidden" name="dob" id="dob" required>
                        </div>
                    </div>
                    <br>
                  
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.email_address')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email" value="{{ old('email') }}"class="form-control col-md-7 col-xs-12"  type="email">
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-default">@lang('button.save')</button>
                            <a href="{{ route('admin.teacher.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.cancel')</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('public/js/parsley.js')}}"></script>
    <script type="text/javascript">
         function updateDOB()
         {
            var dob;
            dob = $('#year').val() + '-' + $('#month').val() + '-' + $('#day').val()
            $('#dob').val(dob)
         }
    </script>
@endsection
