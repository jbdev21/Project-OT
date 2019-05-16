@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
	<div class="box padding-sm">
    <div class="btn-toolbar">
      <div class="btn-group">
        <a class="btn btn-primary" href="{{ route('dashboard.rating.month') }}"><i class="fa fa-calendar"></i> @lang('button.monthly')</a>
        <a class="btn btn-primary active" href="{{ route('dashboard.rating.year') }}"><i class="fa fa-calendar"></i> @lang('button.yearly')</a>
      </div>
    </div> <!-- /toolbar -->
	<br>

	  <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3">
                    <form id="class_form">
                    <select class="form-control" id="select_class" name="class">
                        <option value=""> - @lang('button.select_class') - </option>
                        @foreach($classes as $class)
                            <option value="{{$class->class_code}}">{{$class->class_code}}</option>
                        @endforeach
                    </select>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
            <div id="graphx"></div>
          </div>
        </div>
    </div>
	</div>

@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/morris.css')}}">
@endsection

@section('scripts')
     <script src="{{asset('js/raphael.min.js')}}"></script>
    <script src="{{asset('js/morris.min.js')}}"></script>

    <script>
        $(document).ready(function() {
                $('#select_class').change(function(){
                    $('#class_form').submit();
                })

                Morris.Bar({
                  element: 'graphx',
                  data: [
                    {x: '2015 Q1', y: 2, z: 3, a: 4},
                  ],
                  xkey: 'x',
                  ykeys: ['y', 'z', 'a'],
                  barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                  hideHover: 'auto',
                  labels: ['Y', 'Z', 'A'],
                  resize: true
                }).on('click', function (i, row) {
                    console.log(i, row);
                });
        });
    </script>
@endsection
