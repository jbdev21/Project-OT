<div class="form-group">
	<div class="row">
        <div class="col-sm-3 col-xs-12"> 
        	 <label for="{{ $field['name'] }}">@lang('label.'. snake_case($field['label']))</label><br>
        	<small>
        		@lang('label.'. snake_case($field['description']))
        	</small>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
        	<div class="input-group">
	        	<span class="input-group-addon" id="basic-addon3">http://</span>

	        	<input type="{{ $field['type'] }}"
	           name="{{ $field['name'] }}"
	           value="{{ old($field['name'], \setting($field['name'])) }}"
	           class="form-control {{ array_get( $field, 'class') }}"
	           id="{{ $field['name'] }}"
	           placeholder="@lang('label.'. snake_case($field['label']))"
	           aria-describedby="basic-addon3">

	  			<span class="input-group-addon" id="basic-addon3">..videoware.kr/sso/type1.do</span>
        	</div>
        </div>
    </div>
</div>
<br>

