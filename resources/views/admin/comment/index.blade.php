@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.all_comment')</label>
            </div>
            <form>
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <p>
                        <label for="">@lang('label.year')</label>
                        <select class="form-control" id="select_year" type="month" name="year">
                        @php
                             if(Request::get('year')){
                                    $year = Request::get('year');
                                }else{
                                    $year = date('Y');
                                }
                        @endphp
                        @for($i=0;$i<4;$i++)
                            @php 
                                $year_list = date('Y') - $i;
                            @endphp
                            <option 
                                @if( $year_list == Request::get('year')) 
                                    selected
                                @else
                                    @if($year_list == date('Y'))
                                        selected
                                    @endif 
                                @endif
                            value="{{$year_list}}"
                            >
                            {{ $year_list}}
                        </option>
                        @endfor
                      </select>
                    </p>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <p>
                        <label for="">@lang('label.teacher')</label>
                        <select class="form-control" id="select2"  name="teacher">
                            <option value=""> - All Teachers - </option>
                            @foreach($teachers as $teacher)
                      	        <option value="{{ $teacher->id }}" @if(Request::get('teacher') == $teacher->id) selected @endif>
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                      </select>
                    </p>
                </div>
                <div class="col-sm-2  col-xs-12">
                   @if(is_desktop()) <br> @endif
                    <button style="margin-top:5px;"  class="btn btn-default btn-block"> <i class="fa fa-database"></i> @lang('label.filter')</button>
                    <br>
                </div>
            </div>
            </form>
            <div class="table-responsive">
               <table class="table table-stripped">
                   <thead>
                    <tr>
                      	<td>@lang('label.student')</td>
                      	<td>@lang('label.english_name')</td>
                        <td>@lang('label.teacher')</td>
                        <td>@lang('label.duration')</td>
                        <td>@lang('label.month')</td>
                        <td></td>
                    </tr>
                   </thead>
                   <tbody>
                   <?php count($students);?>
                       @forelse($students as $student)
                       		<tr>
                               	<td>
                                    {{$student->username}}
                                    <br>
                                    {{$student->korean_name}}
                                </td>
                                <td>{{ $student->name }}</td>
                                <td>
                                @foreach(getTeacher($student->activeTeachers($year)) as $teacher)
                                    {{ $teacher->name }} 
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                {{ date_formater('date_format',$student->getFirstSession()->date_time)}} - {{ date_formater('date_format',$student->getLastSession()->date_time) }}
                                </td>
                                <td>
                                  @for($i=1; $i < 13; $i++)
                                    @php
                                       if(Request::get('teacher'))
                                       {
                                           $teacher = Request::get('teacher');
                                       }else{
                                           $teacher = "all";
                                       }
                                    
                                      

                                      $montly = monthlyComment($student->id, $teacher, date('Y-m', strtotime(date("$year-$i"))));
                                    @endphp
                                   
                                    <a class="btn btn-xs
                                    @if(date('Y-m', strtotime(date('Y') . '-' . $i)) == date('Y-m'))
                                    btn-default
                                   @endif
                                      @if(!$montly['valid']) disabled @endif" href="@if($montly['valid'] && $montly['is_this_month']) 
                                      {{
                                      route('admin.comment.show', $student->id)}}?month={{date('Y-m', strtotime(date('Y') . '-' . $i))}}  @else #  @endif" @if($montly['valid'] ) style="color:#26b99a" @else style="color:gray"  @endif>
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
                            <td align="center" colspan="3"> @lang('label.no_student_found') </td>
                          </tr>
                       @endforelse
                   </tbody>
               </table>
            </div>
                {{$students->links()}}

        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="admin_id" id="teacher_id_input">
    </form>
@endsection

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
  <script type="text/javascript">

      $(document).ready(function(){
          $('#select2').select2();
      })
  </script>
  
@endsection