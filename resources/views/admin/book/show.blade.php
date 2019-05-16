@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
             <div class="x_title">
               @lang('label.book')
            </div>
            
            <a href="{{ route('admin.book.index') }}" class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-ban"></i> @lang('button.back')</a>
            <div class="row">
                <div class="col-sm-4">
                    <h1>{{$book->title}}</h1>
                    @if(is_desktop())
                        <table class="table">
                            <tr>
                                <td>@lang('label.location')</td>
                                <td>: {{ $book->location}}</td>
                            </tr>
                            <tr>
                                <td>@lang('label.page_code')</td>
                                <td>: <code>{{ $book->page_code}}</code></td>
                            </tr>
                            <tr>
                                <td>@lang('label.page')</td>
                                <td>: {{ $book->starting}} - {{ $book->number_of_pages }}</td>
                            </tr>
                        </table>
                    @else
                        <label for="">{{ $book->location}}</label> <br>
                        @lang('label.location')
                        <br><br>

                        <code>{{ $book->page_code}}</code> <br>
                        @lang('label.page_code')
                        <br><br>

                        <label>{{ $book->starting}} - {{ $book->number_of_pages }}</label> <br>
                        @lang('label.page')
                        <br>
                        <br>
                    @endif
                    <a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-default"> <i class="fa fa-pencil"></i> @lang('button.edit') </a>
                </div>
                <div class="col-sm-8">
                    <div id="image-preview">
                        @if($book->id == null && app('request')->input('page') == "")
                                <br>
                                <div class="text-center">
                                <label>@lang('label.no_book_been_set')</label>
                                </div>
                        @elseif( $book->id != null &&  app('request')->input('page') == Null)
                                {{$book->page()->paginate(1)->links()}}
                                <img id="book_preview" src="{{ App\BookPage::where('book_id', $book->id)->where('page_number', "1")->first()->url}}" class="img img-responsive">
                        @elseif( $book->id != null &&  app('request')->input('page') != Null)

                                {{$book->page()->paginate(1)->links()}}
                                <img id="book_preview" src="{{ App\BookPage::where('book_id', $book->id)->where('page_number', app('request')->input('page'))->first()->url}}" class="img img-responsive">
                        @else
                            <br>
                                <div class="text-center">
                                    <label>@lang('label.no_book_been_set')</label>
                                </div>
                        @endif
                            <div class="center-block" id="loading-image" style="display: none">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif">
                            </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
@endsection