
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

                <form method="post" action="{{ route('admin.setting.store') }}" class="form-horizontal" role="form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="file" value="payment_setting">
                    @if(count(config('payment_setting', [])) )
                    	@foreach(config('payment_setting') as $section => $fields)
                            <div class="x_panel">
					            <div class="x_content">
					            	<fieldset>
					                 <legend>@lang('label.'. snake_case($fields['title']))</legend>
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
                </form>
            </div>
        </div>
    </div>
@endsection