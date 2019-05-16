@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>All Message</label>
            </div>
            <div class="row">
              
                <div class="col-sm-3">
                    <input class="form-control input-sm" placeholder=" search..">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                </div>
            </div>
            
                {{csrf_field()}}
                {{method_field('DELETE')}}
               <table class="table table-stripped table-hover">
                   <thead>
                    <tr>
                      	<td>Student</td>
                        <td>Message</td>
                        <td>Replies</td>
                        <td></td>
                    </tr>
                   </thead>
                   <tbody>
                   <?php count($messages);?>
                       @forelse($messages as $message)
                       		<tr>
                               	<td>
                                    <a href="{{route('teacher.message.show', $message->user->id)}}">
                                    	{{$message->user->username}}
                                    </a>
                                    <br>
                                    {{$message->user->korean_name}}
                                </td>
                                <td>{!! str_limit(strip_tags($message->message), 180) !!}</td>
                                <td>
                                	{{ count($message->replies) }}
                                </td>
                                <td align="right">
                                    
                                    <a href="{{route('teacher.message.show', $message->id)}}" class="btn btn-primary btn-sm"> View</a>
                                   
                            </tr>
                       @empty
                        <tr>
                          <td colspan="4" align="center"><b> No message found</b></td>
                        </tr>
                       @endforelse
                   </tbody>
               </table>
            
                {{$messages->links()}}

        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="admin_id" id="teacher_id_input">
    </form>
@endsection

