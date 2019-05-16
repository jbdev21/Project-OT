@extends('layouts.admin')

@section('content')
    @if(is_desktop())
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <label>@lang('menu.coupon')</label>
                        <a href="{{ route('admin.coupon.create') }}" class="btn btn-default btn-sm" ><i class="fa fa-plus"></i> @lang('button.create')</a>
                        <a href="{{ route('admin.coupon.unused') }}" class="btn btn-default btn-sm" ><i class="fa fa-ticket"></i> @lang('label.unused')</a>
                    </div> 
                <form action="{{route('admin.classer.destroy', 0)}}" id="delete_all" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        {!! $html->table() !!}
                    </div>
                </form>
                
            </div>
        </div>
    @else


    <label>@lang('menu.all_class')</label>
    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
     <form action="{{route('admin.classer.destroy', 0)}}" id="delete_all" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <div class="table-responsive">
            {!! $html->table() !!}
        </div>
    </form>
    @endif
@endsection

@section('styles')
    <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script> -->
    {!! $html->scripts() !!}
    <script type="text/javascript">
        $(document).ready(function(){

             $(document).on('click','#checkAll', function(){
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