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

                <form action="{{route('admin.blog.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-8">
                             <label for="">@lang('label.title')</label>
                              <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-sm-4">
                           <label for="">상태</label>
                          <select class="form-control" name="is_published">
                            <option value="1"> @lang('label.publish')</option>
                            <option value="0">ㅛㄷㄴ</option>
                          </select>
                        </div>
                      </div>
                       
                      
                        <br>
                        <textarea  name="content" id="my-editor" rows="8" class="form-control">{!! old('message')!!}</textarea>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.save')</button>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.cancel')</a>
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
