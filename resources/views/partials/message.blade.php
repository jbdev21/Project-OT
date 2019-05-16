@if(Session::has('message'))
<BR>
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}" id="alert-box">{!! Session::get('message') !!}</div>
@endif