@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>All comment</label>
            </div>
            <form action="{{route('teacher.comment.destroy', 0)}}" id="delete_all" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
               <table class="table table-stripped">
                   <thead>
                    <tr>
                      	<td>Username</td>
                      	<td>English/Korean Name</td>
                        <td>Months</td>
                        <td></td>
                    </tr>
                   </thead>
                   <tbody>
                   <?php count($students);?>
                       @forelse($students as $student)
                       		<tr>
                               	<td>
                                    	{{$student->username}}
                                </td>
                                <td>
                                   {{ $student->name }}
                                  <br>
                                    {{$student->korean_name}}
                                </td>
                                <td>
                                  @for($i=1; $i < 13; $i++)
                                    @php
                                      $montly = monthlyComment($student->id, Auth::user()->id, date('Y-m', strtotime(date("Y-$i"))));
                                    @endphp
                                   
                                    <a class="btn btn-xs
                                    @if(date('Y-m', strtotime(date('Y') . '-' . $i)) == date('Y-m'))
                                    btn-default
                                   @endif
                                      @if(!$montly['valid']) disabled @endif" href="@if($montly['valid'] && $montly['is_this_month']) 
                                      {{
                                      route('teacher.comment.create', 
                                      [
                                        'month' => date('Y-m', strtotime(date('Y') . '-' . $i)), 
                                        'student' => $student->username
                                      ])}}  @else #  @endif" @if($montly['valid'] ) style="color:#26b99a" @else style="color:gray"  @endif>
                                      {{date('M', strtotime(date('Y') . '-'  . $i))}} 
                                      @if($montly['comments'] > 0)
                                        <span class="badge bg-green" style="font-size: 9px;">{{$montly['comments']}}</span>
                                      @endif
                                    </a>
                                    &nbsp;
                                    &nbsp;

                                  
                                  @endfor
                                </td>
                            </tr>
                        @empty
                          <tr>
                            <td align="center" colspan="3"> no student found </td>
                          </tr>
                       @endforelse
                   </tbody>
               </table>
            </form>
                {{$students->links()}}

        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="admin_id" id="teacher_id_input">
    </form>
@endsection

