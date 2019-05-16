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
                    @lang('label.adding_new_blog')
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="row">

                <form action="{{route('admin.blog.update', $blog->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="col-sm-12">
                        <label for="">@lang('label.title')</label>
                        <input type="text" name="title" value="{{$blog->title}}" class="form-control" required>
                        <br>
                        <label for="">상태</label>
                        	<select class="form-control" name="is_published">
                        		<option value="1" @if($blog->is_published == "1") selected @endif> @lang('label.publish')</option>
                        		<option value="0" @if($blog->is_published == "0") selected @endif> ㅛㄷㄴ</option>
                        	</select>
                        <br>
                        <br>
                        <textarea  name="content" id="my-editor" rows="8" class="form-control">{!! $blog->content !!}</textarea>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.save_changes')</button>
                        <a href="{{ route('admin.blog.index')}}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
                    </div>

                </form>
            </div>

            </div>
        </div>
    </div>


@endsection

@section('editor')
  @include('partials.full-editor')
@endsection
