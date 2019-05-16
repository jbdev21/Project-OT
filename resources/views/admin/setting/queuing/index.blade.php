
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <button class="btn btn-primary start" >@lang('button.start_queie')</button>
              {{--   <form method="post" action="{{ route('admin.setting.store') }}" class="form-horizontal" role="form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="file" value="general_setting">
                    @if(count(config('general_setting', [])) )
                    	@foreach(config('general_setting') as $section => $fields)
                            <div class="x_panel">
					            <div class="x_content">
					            	<fieldset>
					                <legend>{{ $fields['title'] }}</legend>
					                		@foreach($fields['elements'] as $field)
                                                @includeIf('partials.settings.fields.' . $field['type'] )
                                            @endforeach
									
					             	</fieldset>
					        	</div>
					    	</div>	
                    @endforeach

                    @endif

                    <div class="row m-b-md">
                        <div class="col-md-12">
                            <button class="btn-primary btn">
                            @lang('button.save_changes')
                            </button>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
		<script type="text/javascript">
			$('.start').click(function(){
				axios.get('{{route('admin.setting.queuingstart')}}')
					.then( response => {
						console.log('response')
					})
				var text = "<i class='fa fa-check'></i> Queue Stated"
				$(this).removeClass('btn-primary');
				$(this).addClass('btn-success');
				$(this).html(text);
			})
		</script>
@endsection	