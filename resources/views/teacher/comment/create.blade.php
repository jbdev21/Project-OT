@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>New Comment</label>
            </div>
          	<br>
          	<div class="row">
          		<form action="{{route('teacher.comment.store')}}" method="post">
          		<div class="col-sm-8 col-sm-offset-2">
          			<p>
          				<label>User ID</label>
                  		<input type="text" class="form-control" readonly="" value="{{$student->username}}">
          			   <input type="hidden"  name="user_id" value="{{$student->id}}">
          			</p>
          			<p>
          				<label>Korean Student</label>
                  		<input type="text" class="form-control" readonly="" value="{{$student->korean_name}}">
          			</p>
          			<p>
          				<label>English Student</label>
                  		<input type="text" class="form-control" readonly="" value="{{$student->name}}">
          			</p>
          			<p>
          				<label>Month</label>
          				<input readonly class="form-control" name="month" type="month" required value="{{Request::get('month')}}">
          			</p>
          			<p>
          				
                        {{csrf_field()}}
                        <textarea  name="message" id="my-editor" rows="8" class="form-control">
						@if( old('message'))
							{!!  old('message') !!}
						@else 
							★ Strenth 강점 <br>

							★ Weakness 약점 <br>

							★ Goal 다음달 수업목표 <br>
						@endif
						</textarea>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Submit Comment</button>
          			</p>
          		</div>
                </form>
          	</div>
       
            

        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="admin_id" id="teacher_id_input">
    </form>
@endsection

@section('scripts')
   <script type="text/javascript">
   	$('select[name=type]').change(function(){
   		if($(this).val() == "yearly")
   		{
   				$('input[name=schedule]').attr('type', 'text').attr('placeholder', 'Please Type here Here').val("");
   		}else{
   			$('input[name=schedule]').attr('type', 'month')
   		}
   	})

  </script>
@endsection

@section('editor')
  @include('partials.full-editor')
@endsection