@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <a href="{{route('admin.comment.index')}}" class="btn btn-default btn-sm"> <i class="fa fa-ban"></i> @lang('button.back')</a>
            </div>
           
            <div class="row">
                <div class="col-sm-4">
                <table class="table">
                    <tr>
                        <td width="40%">@lang('label.username')</td>
                        <td>: <b>{{$student->username}}</b></td>
                    </tr>
                    <tr>
                        <td>@lang('label.korean_name')</td>
                        <td>: <b>{{$student->korean_name}}</b></td>
                    </tr>
                    <tr>
                        <td>@lang('label.english_name')</td>
                        <td>: {{$student->name}}</td>
                    </tr>
                </table>
                </div>
                <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{date('M Y', strtotime(Request::get('month')))}} @lang('label.comment')</h3>
                    </div>
                    <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.comment.create', ['student' => $student->id, 'month' => Request::get('month')]) }}" class="btn bnt-btn btn-success"> <i class="fa fa-plus"></i> @lang('button.new')</a>
                    </div>
                </div>
 
                            @forelse($student->comments()->where('month',Request::get('month'))->has("admin")->get() as $comment)
                                    <div class="well" style="background-color:transparent;padding:10px;">
                                        <h3>{{$comment->admin->name}} <br><small style="font-size:14px">{{date_formater('date_time_format',$comment->created_at)}}</small></h3>
                                        <p>
                                            {!! $comment->message !!}
                                        </p>
                                        <a href="{{ route('admin.comment.edit', $comment->id) }}" class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> @lang('button.edit')</a>
                                  
                                         <form style="display:none" id="form-{{$comment->id}}" action="{{ route('admin.comment.destroy', $comment->id) }}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                         </form>
                                            <button onclick="if(confirm('Are you sure to delete?')) { $('#form-{{$comment->id}}').submit() }"  class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> @lang('button.delete')</button>
                                      
                                    </div>
                            @empty
                                <hr>
                                <h4 class="text-center">@lang('label.no_comment_yet')</h4>
                            @endforelse
                      
                </div>
            </div>
            
        </div>
    </div>
@endsection