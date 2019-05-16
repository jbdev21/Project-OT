<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/13/2017
 * Time: 11:32 AM
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    @lang('label.adding_new_book')
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
            <div class="row">

                <form action="{{route('admin.book.store')}}" method="post">
                    {{csrf_field()}}
                <div class="col-sm-6 col-sm-offset-3">
                    <label for="">@lang('label.title')</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" required>
                    <br>
                    <label for="">@lang('label.location')</label> <small><i>(include the folder of actual book)</i></small>
                    <input type="text" name="location"  value="{{old('location')}}" class="form-control" required>
                    <br>
                    <label for="">@lang('label.page_code')</label>
                    <input type="text" name="page_code"  value="{{old('page_code')}}" class="form-control" required>
                    <br>
                    <label for="">@lang('label.start_page_number')</label>
                    <input type="number" name="starting"  value="{{old('starting')}}" class="form-control" required>
                    <br>
                    <label for="">@lang('label.total_number_of_page')</label>
                    <input type="number" name="number_of_pages"  value="{{old('number_of_pages')}}" class="form-control" required>
                    <br>
                    <label>@lang('label.file_type')</label> <small><i>(select appropriate type)</i></small>
                    <select class="form-control" name="type">
                        <optgroup label="JPG Files"></optgroup>
                        <option value="JPEG" @if(old('JPEG')) selected="" @endif > JPEG</option>
                        <option value="jpg" @if(old('jpg')) selected="" @endif > jpg</option>
                        <option value="jpeg" @if(old('jpeg')) selected="" @endif > jpeg</option>
                        <optgroup label="PNG Files"></optgroup>
                        <option value="PNG" @if(old('PNG')) selected="" @endif > PNG</option>
                        <option value="png" @if(old('png')) selected="" @endif > png</option>
                    </select>
                    <br>
                    <label><input type="checkbox" value="1" name="available"> @lang('label.available')</label>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-default"><i class="fa fa-save"></i>@lang('button.save_book')</button>
                    <a href="{{ route('admin.book.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i>@lang('button.cancel')</a>
                </div>

                </form>
            </div>

            </div>
        </div>
    </div>


@endsection
