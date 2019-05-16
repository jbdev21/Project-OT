@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection

@section('content')
@if(is_desktop())
	<div class="box padding-sm">
    <h6>교재보기 </h6>
	  <div class="row">
        <div class="col-sm-12">
        <div class="table-responsive">
          @if($havebook)
            <table class="table">
                <thead>
                    <tr>
                      <th>@lang('label.book_name')</th>
                      <th>@lang('label.time')</th>
                      <th>@lang('label.minute')</th>
                      <th>@lang('label.day')</th>
                      <th>@lang('label.teacher')</th>
                      <th>@lang('label.page_number')</th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($items as $item)
                    <tr>
                      <td>{{ $item['book']->title }}</td>
                      <td>
                        {{ date('h:iA', strtotime( $item['class']->time )) }}
                        -
                        {{date('h:iA', strtotime( $item['class']->time . '+'. $item['class']->minutes .' minutes') )}}
                      </td>
                      <td>
                        {{ $item['class']->minutes}}min.
                      </td>
                      <td>
                       
                      </td>
                      <td>
                          {{ $item['class']->admin->name}}
                      </td>
                      <td>{{ $item['book']->number_of_pages}}</td>
                      <td align="right">
                        <a href="{{ route('dashboard.book.show', $item['book']->id) }}?default={{ $item['default_page'] }}" class="btn btn-success btn-sm">@lang('button.view')</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          @else
             <table class="table">
                <thead>
                    <tr>
                      <th>@lang('label.book_name')</th>
                      <th>@lang('label.page_number')</th>
                      <th></th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    {{ $item['book']->title }}
             
                    <tr>
                      <td>{{$item['book']->title}}</td>
                      <td>{{$item['book']->number_of_pages}}</td>
                      <td>
                      <small>
                      샘플교재 입니다. 정규슈업시 변경반영 됩니다.
                      </small>
                      </td>
                      <td align="right">
                        <a href="{{ route('dashboard.book.show', $item['book']->id ) }}" class="btn btn-success btn-sm">@lang('button.view')</a>
                      </td>
                    </tr>
                 
                   @endforeach 
                </tbody>
            </table>
          @endif
            </div>
        </div>
    </div>
	</div>
@else
  <h6 class="mobile-title">교재보기</h6>
  
  @foreach($items as $item)
    <div class="box-list">
      <a href="{{route('dashboard.book.show', $item['book']->id)}}?defaut={{$item['default_page']}}">
        <div class="content">
          <b style="font-size:28px">
            {{$item['book']->title}}
          </b>
          <br>
          @if(!$havebook)
          <small style="font-size:11px;">샘플교재 입니다. 정규슈업시 변경반영 됩니다.</small>
          @endif
        </div>
      </a>
    </div>
  @endforeach
@endif


@endsection
