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
                    Edit Book
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
            <div class="row">

                <form action="{{route('admin.book.update', $book->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field("PUT")}}
                <div class="col-sm-6 col-sm-offset-3">
                    <label for="">@lang('label.title')</label>
                    <input type="text" name="title" value="{{$book->title}}" class="form-control" required>
                    <br>
                    <label for="">@lang('label.location')</label> <small><i>(include the folder of actual book)</i></small>
                    <input type="text" name="location" value="{{$book->location}}" class="form-control" required>
                    <br>
                    <label for="">@lang('label.page_code')</label>
                    <input type="text" name="page_code" value="{{$book->page_code}}" class="form-control" required>
                    <br>
                    <label for="">@lang('label.starting_page_number')</label>
                    <input type="number"  value="{{$book->starting}}" name="starting" class="form-control" required>
                    <br>
                    <label for="">@lang('label.total_number_of_page')</label>
                    <input type="number"  value="{{$book->number_of_pages}}" name="number_of_pages" class="form-control" required>
                    <br>
                    <label>@lang('label.file_type')</label> <small><i>(select appropriate type)</i></small>
                    <select class="form-control" name="type">
                        <optgroup label="JPG Files"></optgroup>
                        <option @if($book->type == "JPEG") selected @endif value="JPEG"> JPEG</option>
                        <option @if($book->type == "jpg") selected @endif value="jpg"> jpg</option>
                        <option @if($book->type == "jpeg") selected @endif value="jpeg"> jpeg</option>
                        <optgroup label="PNG Files"></optgroup>
                        <option @if($book->type == "PNG") selected @endif value="PNG"> PNG</option>
                        <option @if($book->type == "png") selected @endif value="png"> png</option>
                    </select>
                    <br>
                    <label><input type="checkbox" value="1" name="available" @if($book->available) checked @endif> @lang('label.available')</label>

                    <br>
                    <br>
                    <button type="submit" class="btn btn-default"><i class="fa fa-save"></i>@lang('button.save_changes')</button>
                    <a href="{{ route('admin.book.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i>@lang('button.cancel')</a>
                </div>

                </form>
            </div>

            </div>
        </div>
    </div>


@endsection
