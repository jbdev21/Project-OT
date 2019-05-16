<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.banner')</label>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             
                            <form action="#" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label for="">
                                    @lang('label.banner') ( 465px x 135px )
                                </label>  
                                <input required name="image" type="file" accept="image/*">

                                <br>
                                <label for="">@lang('label.start_to_display') *</label>
                                <input required type="date" name="date_start" value="{{ date('Y-m-d') }}" class="form-control">
                                <br>
                                <label for="">@lang('label.end_of_display')</label>
                                <input type="date"  name="date_end" class="form-control">
                                <br>
                                <label><input type="checkbox"  name="is_show"> @lang('label.show')</label>
                                <br>
                                <br>
                                <button class="btn btn-default"><i class="fa fa-save"></i> @lang('button.save')</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        @foreach($banners as $banner)
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <img src="{{ asset('banners/'. $banner->path) }}" alt="" class="img-responsive">

                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                @if($banner->is_show)
                                                    <i class="fa fa-eye"></i> 
                                                @else
                                                    <i class="fa fa-eye-slash"></i> 
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                Date: {{ date_formater('date_format', $banner->date_start) }} 
                                                @if($banner->date_end)
                                                    - {{ date_formater('date_format',$banner->date_end)}}
                                                @endif
                                            </div>
                                            <div class="col-sm-5 text-right">
                                                <a href="{{route('admin.banner.edit', $banner->id)}}"  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> @lang('button.edit')</a>
                                                <form style="display:none" id="form-{{$banner->id}}" action="{{ route('admin.banner.destroy', $banner->id) }}" method="post">
                                                    {{ csrf_field()}}
                                                    {{ method_field('DELETE')}}
                                                </form>
                                                <a class="btn btn-danger btn-xs" onclick=" if(confirm('@lang('label.are_you_sure_to_delete') ')){ $('#form-{{$banner->id}}').submit(); } "><i class="fa fa-remove"></i> @lang('button.delete')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection