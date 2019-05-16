@extends(theme('layout.app'))
@section('content')
	<br>
	<div class="container">
		@if(!$leveltest->is_done)
			<div class="text-center">
				<a href="{{leveltest_video_url($leveltest->id, 'student')}}" target="_blank" class="btn btn-success btn-lg">@lang('button.start_level_test')</a>
			</div>
			<br>
		@endif
		<div class="columns">
			<div class="column">
				<div class="box gradient-blue">
					<small>Name</small>
					{{$leveltest->name}}
				</div>
			</div>
			<div class="column">
				<div class="box gradient-green">
					<small>Type</small>
					{{$leveltest->type}}
				</div>
			</div>
			<div class="column">
				<div class="box gradient-red">
					<small>Teacher</small>
					@if($leveltest->admin)
						{{$leveltest->admin->name}}
					@else
						No Teacher Assigned
					@endif
				</div>
			</div>
			<div class="column">
				<div class="box gradient-yellow">
					<small>Date/Time</small>
					{{date_formater('date_time_format', $leveltest->date)}}
				</div>
			</div>
		</div>
		<hr>
		<div class="columns">
			<div class="column">
				<div class="box-white">
					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
				      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="{{$leveltest->comprehension * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <g class="circle-chart__info">
				        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{$leveltest->comprehension * 10 }}%</text>
				        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.comprehension')</text>
				      </g>
				    </svg>
			    </div>
			</div>
			<div class="column">
				<div class="box-white">
					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
				      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="{{$leveltest->pronounciation * 10}},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <g class="circle-chart__info">
				        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{$leveltest->pronounciation * 10}}%</text>
				        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.pronounciation')</text>
				      </g>
				    </svg>
			    </div>
			</div>
			<div class="column">
				<div class="box-white">
					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
				      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="{{ $leveltest->fluency * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <g class="circle-chart__info">
				        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $leveltest->fluency * 10 }}%</text>
				        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.fluency')</text>
				      </g>
				    </svg>
			    </div>
			</div>
			<div class="column">
				<div class="box-white">
					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
				      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="{{ $leveltest->vocabulary * 10  }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <g class="circle-chart__info">
				        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $leveltest->vocabulary * 10  }}%</text>
				        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.vocabulary')</text>
				      </g>
				    </svg>
			    </div>
			</div>
			<div class="column">
				<div class="box-white">
					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
				      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="{{ $leveltest->grammar * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <g class="circle-chart__info">
				        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $leveltest->grammar * 10 }}%</text>
				        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.grammar')</text>
				      </g>
				    </svg>
			    </div>
			</div>
			<div class="column">
				<div class="box-white">
					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
				      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="{{ $leveltest->rate * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
				      <g class="circle-chart__info">
				        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $leveltest->rate * 10 }}%</text>
				        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.overall')</text>
				      </g>
				    </svg>
			    </div>
			</div>
		</div>
		
 		<h3>
		@lang('label.comprehension')
		</h3>
		<div class="progress">
		  <div class="progress-bar " role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->comprehension * 10 }}%">
		    {{ $leveltest->comprehension * 10 }}%
		  </div>
		</div>
		<div class="progress progressbar-average">
		  <div class="progress-bar" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:20%">
		    20% Complete
		  </div>
		</div>

		<h3>
		@lang('label.pronounciation')
		</h3>
		<div class="progress">
		  <div class="progress-bar progress-bar-warning " role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->pronounciation * 10 }}%">
		    {{ $leveltest->pronounciation * 10 }}% 
		  </div>
		</div>
		<div class="progress progressbar-average">
		  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:20%">
		    20% Complete
		  </div>
		</div>

		<h3>
		@lang('label.fluency')
		</h3>
		<div class="progress">
		  <div class="progress-bar progress-bar-success " role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->fluency * 10 }}%">
		    {{ $leveltest->fluency * 10 }}%
		  </div>
		</div>
		<div class="progress progressbar-average">
		  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:20%">
		    20% Complete
		  </div>
		</div>

		<h3>
		@lang('label.vocabulary')
		</h3>
		<div class="progress">
		  <div class="progress-bar progress-bar-danger " role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->vocabulary * 10 }}%">
		    {{ $leveltest->vocabulary * 10 }}% 
		  </div>
		</div>
		<div class="progress progressbar-average">
		  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:20%">
		    20% Complete
		  </div>
		</div>

		<h3>
		@lang('label.grammar')
		</h3>
		<div class="progress">
		  <div class="progress-bar progress-bar-info " role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->grammar * 10 }}%">
		    {{ $leveltest->grammar * 10 }}% Complete
		  </div>
		</div>
		<div class="progress progressbar-average">
		  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:20%">
		    20% Complete
		  </div>
		</div>
		

		<!-- <hr>
	        <canvas id="mybarChart"></canvas> -->
	    <hr>
					<div class="panel panel-default">
						<div class="panel-heading">Comments</div>
						<div class="panel-body">
							<div class="alert alert-success" role="alert">
								<strong>Level 1</strong>
								<p>
									Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias iste corporis ipsum sed nulla veritatis perferendis vitae? Omnis iusto pariatur deserunt perferendis earum quaerat! Voluptate totam facilis expedita assumenda dolor!
								</p>
							</div>
						</div>
					</div>
	    		<div class="panel panel-default">
						<div class="panel-heading">Mistake & Correction</div>
						<div class="panel-body">
							<div class="well">
									<span class="text-danger"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </span><br>
									<span class="text-success"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </span>
							</div>
							<div class="well">
									<span class="text-danger"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </span><br>
									<span class="text-success"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </span>
							</div>
							<div class="well">
									<span class="text-danger"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </span><br>
									<span class="text-success"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </span>
							</div>
						</div>
					</div>
	    	</div>
	    <hr>
	    <div class="text-center">
	    	<a href="{{ url('enrollment') }}" class="btn btn-lg btn-success">@lang('label.enrollment')</a>
	    </div>
	<br>	
	</div>
@endsection
@section('styles')
	<style type="text/css">
		.progressbar-average{
			height: 20px !important;
			margin-top: -15px;
		}
		.columns{
			display: flex;
		}

		.column{
			flex-direction: column;
			flex:1;
			flex-wrap:wrap;
		}

		.column small{
			display: block;
			font-weight: normal;
			color:#ccc;
		}

		.box-white{
			padding:10px;
			border:1px solid #ccc;
			margin:5px;
		}

		.box{
			color:white;
			padding:10px;
			margin:5px;
			padding-top: 30px;
			font-size: 1.3em;
			
		}

		.gradient-blue{
			background: #00B4DB;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}

		.gradient-red{
			background: #333333;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to bottom, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to bottom, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}
		
		.gradient-green{
			background: #ad5389;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to bottom, #3c1053, #ad5389);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to bottom, #3c1053, #ad5389); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}

		.gradient-yellow{
			background: #F2994A;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to bottom, #F2C94C, #F2994A);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to bottom, #F2C94C, #F2994A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}

		.circle-chart__circle {
		  animation: circle-chart-fill 2s reverse; /* 1 */ 
		  transform: rotate(-90deg); /* 2, 3 */
		  transform-origin: center; /* 4 */
		}

		.circle-chart__circle--negative {
		  transform: rotate(-90deg) scale(1,-1); /* 1, 2, 3 */
		}

		.circle-chart__info {
		  animation: circle-chart-appear 2s forwards;
		  opacity: 0;
		  transform: translateY(0.3em);
		}

		@keyframes circle-chart-fill {
		  to { stroke-dasharray: 0 100; }
		}

		@keyframes circle-chart-appear {
		  to {
		    opacity: 1;
		    transform: translateY(0);
		  }
		}

		table td{
			padding:5px;
		}

	</style>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset("js/chart.min.js") }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}



	
		if ($('#mybarChart').length ){ 
			  
			  var ctx = document.getElementById("mybarChart");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				orientation:"vertical",
				data: {
				  labels: [
				  	"@lang('label.comprehension')", 
				  	"@lang('label.pronounciation')", 
				  	"@lang('label.fluency')", 
				  	"@lang('label.vocabulary')", 
				  	"@lang('label.grammar')", 
				  	"@lang('label.overall')", 
				  	],
				  datasets: [
					  {
						label: 'My Score',
						backgroundColor: "#03586A",
						data: [
								{{$leveltest->comprehension * 10}}, 
								{{$leveltest->pronounciation * 10}}, 
								{{$leveltest->fluency * 10}}, 
								{{$leveltest->vocabulary * 10}}, 
								{{$leveltest->grammar * 10}}, 
								{{$leveltest->rate * 10}}, 
							]
					  },
					  {
						label: 'Overall Score',
						backgroundColor: "#26B99A",
						data: [51, 30, 40, 28,50, 80]
					  }, 
				  ]
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						suggestedMin: 0,
                        suggestedMax: 110
					  }
					}]
				  }
				}
				
			  });
			  
			} 

			
			
    </script>
@endsection