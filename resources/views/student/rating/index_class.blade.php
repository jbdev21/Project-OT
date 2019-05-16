@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
	<div class="box padding-sm">

	<br>

	  <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3">
                    <form  id="class_form">
	                    <select class="form-control" id="select_class" name="class">
	                        <option value=""> - @lang('button.select_class') - </option>
	                        @foreach($classes as $class)
	                            <option @if(Request::get('class') == $class->class_code) selected @endif value="{{$class->class_code}}">{{$class->class_code}}</option>
	                        @endforeach
	                    </select>
                    </form>
                </div>
            </div>
            <br>
            <div id="chartContainer"></div>
            <br>
            <h3> @lang('label.class_session')</h3>
            <canvas id="lineChart"></canvas>
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
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('js/canvasjs.min.js')}}"></script>

    <script>
        $(document).ready(function() {
        	 	$('#select_class').change(function(){
                    $('#class_form').submit();
                })

					


             if ($('#lineChart').length ){	
			
			  var ctx = document.getElementById("lineChart");
			  var lineChart = new Chart(ctx, {
				type: 'line',
				data: {
				  labels: {!! $session_labels !!},
				  datasets: [{
					label: "Class Session",
					backgroundColor: "rgba(38, 185, 154, 0.31)",
					borderColor: "rgba(38, 185, 154, 0.7)",
					pointBorderColor: "rgba(38, 185, 154, 0.7)",
					pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					pointBorderWidth: 1,
					data: {!! $session_value !!}
				  }]
				},
			  });
			
			}

			var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					theme: "light2", // "light1", "light2", "dark1", "dark2"
					title:{
						text: "Class: 22343"
					},
					axisY: {
						title: "Class Information"
					},
					data: [{        
						type: "column",  
						showInLegend: true, 
						legendMarkerColor: "grey",
						legendText: "",
						dataPoints: {!! $class_info !!}
					}]
				});
				chart.render();
        });
    </script>
@endsection
