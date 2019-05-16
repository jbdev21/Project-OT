<div class="form-group" style="display: none;">
	<div class="row">
        <div class="col-sm-3 col-xs-12"> 
        	 <label for="{{ $field['name'] }}">@lang('label.'. snake_case($field['label']))</label><br>
        	<small>
        		@lang('label.'. snake_case($field['description']))
        	</small>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="{{ $field['type'] }}" disabled="disabled" 
           name="{{ $field['name'] }}"
           value="{{ old($field['name'], \setting($field['name'])) }}"
           class="form-control {{ array_get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           placeholder="@lang('label.'. snake_case($field['label']))">
        </div>
    </div>
</div>
<br>

