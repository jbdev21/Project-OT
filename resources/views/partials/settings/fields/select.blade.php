<div class="form-group">
	<div class="row">
        <div class="col-sm-3 col-xs-12"> 
        	 <label for="{{ $field['name'] }}">@lang('label.'. snake_case($field['label']))</label><br>
        	<small>
        		@lang('label.'. snake_case($field['description']))
        	</small>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
        	<select name="{{ $field['name'] }}" class="form-control {{ array_get( $field, 'class') }}" id="{{ $field['name'] }}">
		        @foreach(array_get($field, 'options', []) as $val => $label)
		            <option @if( old($field['name'], \setting($field['name'])) == $val ) selected  @endif value="{{ $val }}">{{$label}}</option>
		        @endforeach
		    </select>
        </div>
    </div>
</div>
<br>
