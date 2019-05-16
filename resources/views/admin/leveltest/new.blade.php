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
                @lang('menu.new_level_test')
            </div>
            <div class="row">
               <div class="col-sm-1">
                    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
                </div>
                      
            </div> 
            <div class="x_content">
                <form action="{{route('admin.leveltest.destroy', 0)}}" id="delete_all" method="post">
                    <input type="hidden" name="to_not_new" value="1">
                  {{csrf_field()}}
                            {{method_field('DELETE')}}
                <div class="table-responsive">
                   <table class="table table-stripped table-hover">
                       <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th>@lang('label.name')</th>
                            <th>@lang('label.mobile')</th>
                            <th>@lang('label.type')</th>
                            <th>@lang('label.time')</th>
                            <th>@lang('label.date')</th>
                            <th>연령대</th>
                            <th>셀프 레벨링</th>
                            <th>@lang('label.date_time')</th>
                            <th>@lang('label.teacher')</th>
                            <th></th>
                        </tr>
                       </thead>
                       <tbody>
                       <?php count($leveltests);?>
                           @foreach($leveltests as $leveltest)

                                <tr>
                                  <td><input type="checkbox" name="item_checked[]" value="{{$leveltest->id}}"></td>
                                    <td>
                                        {{$leveltest->name}}	
                                        <br>
                                        {{$leveltest->korean_name}}
                                    </td>
                                    <td>{{$leveltest->mobile}}</td>
                                    <td>{{$leveltest->type}}</td>
                                    <td>{{date_formater('time_format',$leveltest->time)}}</td>
                                    <td>{{ date_formater('date_format',$leveltest->date)}}</td>
                                     <td>{{$leveltest->age_group }} </td>
                                    <td>{{ $leveltest->self_assesment }}</td>
                                    <td>{{ date('M d, Y h:i', strtotime($leveltest->created_at)) }}</td>
                                    <td>
                                      <input type="hidden" name="leveltest_id" value="{{$leveltest->id}}" >
                                    	<select class="form-control input-sm" name="teacher_id" id="teacher_id_{{$leveltest->id}}">
                                    		<option value=""> - @lang('label.select_teacher') -</option>
                                    		@foreach($teachers as $teacher)
                                    			<option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                     		@endforeach
                                    	</select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm assign_submit" id="{{$leveltest->id}}"> @lang('button.assign')</button>
                                        <a href="{{ route('admin.leveltest.show', $leveltest->id) }}" class="btn btn-primary btn-sm"> @lang('button.view')</a>
                                    </td>
                                </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
                </form>
                    {{$leveltests->links()}}
            </div>
        </div>
    </div>
        <form action="{{route('admin.leveltest.assign')}}" method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
          <input type="hidden" name="teacher_id" id="teacher_id_input">
           <input type="hidden" name="leveltest_id" id="leveltest_id" >
       </form>
@endsection
@section('scripts')
    <script type="text/javascript">

        $(document).on('click','.assign_submit', function(){
            var id = $(this).attr('id')
            var selected_teacher_id = $('#teacher_id_' + id + ' option:selected').val();
            //alert(selected_teacher_id)
            var id = $(this).attr('id')
            $('#teacher_id_input').val(selected_teacher_id)
            $('#leveltest_id').val(id)
            $('#assign_form').submit();
        });

        $(document).ready(function(){

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#delete_all_btn').click(function(){
                if(confirm("@lang('label.are_you_sure_to_delete')")){
                    $('#delete_all').submit();
                }
            })
        });
    </script>
@endsection
