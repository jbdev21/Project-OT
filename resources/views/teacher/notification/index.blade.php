@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.notification')</label>
                <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
                <a href="{{route('admin.blog.create')}}" class="btn btn-default btn-sm pull-right" ><i class="fa fa-plus"></i>  @lang('button.create')</a>
            </div>
            <form action="{{route('teacher.notification.destroy')}}" id="delete_all" method="post">
                 {{csrf_field()}}
                {{method_field('DELETE')}}
    
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th>@lang('label.title')</th>
                            <th>@lang('label.message')</th>
                            <th>@lang('label.date_time')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $notification)
                            
                                <tr>
                                    <th>
                                        <input type="checkbox" name="notifications[]" value="{{ $notification->id }}">
                                    </th>
                                    <td>
                                        <a href="{{ $notification->data['url'] }}">
                                            {{ $notification->data['title'] }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ $notification->data['url'] }}">
                                            {{ $notification->data['message'] }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ $notification->data['url'] }}">
                                            {{ date_formater('date_time_format',$notification->created_at) }}
                                        </a>
                                    </td>
                                </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </form>
            {{ $notifications->links() }}
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#delete_all_btn').click(function(){
                if(confirm("@lang('label.are_you_sure_to_delete')")){
                    $('#delete_all').submit();
                }
            })
        });
    </script>
@endsection