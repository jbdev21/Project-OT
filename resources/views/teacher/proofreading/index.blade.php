@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>All Proofreading</label>
            </div>
            <div class="row">
              
                <div class="col-sm-3">
                    <input class="form-control input-sm" placeholder=" search..">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                </div>
            </div>
            <form action="{{route('admin.proofreading.destroy', 0)}}" id="delete_all" method="post">
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
                   <?php count($proofreadings);?>
                       @foreach($proofreadings as $proofreading)
                       		<tr>
                               	<td>
                                    <a href="{{route('admin.proofreading.show', $proofreading->user->id)}}">
                                    	{{$proofreading->user->username}}
                                    </a>
                                    <br>
                                    {{$proofreading->user->korean_name}}
                                </td>
                                <td>{!! str_limit($proofreading->message) !!}</td>
                                <td>
                                	{{ count($proofreading->replies) }}
                                </td>
                                <td align="right">
                                    
                                    <a href="{{route('teacher.proofreading.show', $proofreading->id)}}" class="btn btn-primary btn-sm"> View</a>
                                   
                            </tr>
                        
                       @endforeach
                   </tbody>
               </table>
            </form>
                {{$proofreadings->links()}}

        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="admin_id" id="teacher_id_input">
    </form>
@endsection

