<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.all_class')</label>
            </div>
            <div class="row">
               <div class="col-sm-1">
                    <button class="btn btn-default btn-sm"><i class="fa fa-send"></i> Resend Request</button>
                </div>
            </div>
               <table class="table table-stripped table-hover">
                   <thead>
                    <tr>
                        <td><input type="checkbox" name="" id="checkAll"></td>
                        <td>@lang('label_student')</td>
                        <td>@lang('label.type')</td>
                        <td>>@lang('label.datetime')</td>
                        <td>>@lang('label.message')</td>
                        <td>>@lang('label.datetime_failed')</td>
                        <td></td>
                    </tr>
                   </thead>
                   <tbody>
                   <?php count($fails);?>
                      @foreach($fails as $fail)
                        
                          <tr id="tr_{{$fail->id}}">
                            <td><input type="checkbox" name="fails[]"></td>

                            @if($fail->failedbraincertable_type == "Ap\Leveltest")
                            	<td>{{ $fail->failedbraincertable->classer->user->korean_name }}</td>
                            	<td>{{ $fail->failedbraincertable->classer->type }}</td>
                            	<td>{{ date_formater('date_time_format', $fail->failedbraincertable->date_time) }}</td>
                            @else
                              <td>
                                {{ $fail->failedbraincertable->korean_name }}<br>
                                {{ $fail->failedbraincertable->name }}
                              </td>
                              <td> Level Test</td>
                              <td>
                                {{ date_formater('date_time_format', $fail->failedbraincertable->date . ' ' . $fail->failedbraincertable->time) }}
                              </td>
                            @endif

                          	<td>{!! $fail->message !!}</td>
                          	<td>{{ date_formater('date_time_format', $fail->created_at) }}</td>
                          	<td>
                          		<button class="btn btn-warning retry btn-block" id="{{$fail->id}}" >@lang('button.retry')</button>
                          	</td>
                          </tr>
                       
                      @endforeach
                   </tbody>
               </table>
                {{$fails->links()}}
                <div id="snackbar"></div>
        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        <input type="hidden" name="teacher_id" id="teacher_id_input">
    </form>
@endsection



@section('scripts')
    <script src="{{asset('js/pnotify.js')}}"></script>
    <script src="{{asset('js/pnotify.buttons.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('.retry').click(function(){
                //$('#snackbar').fadeOut('fast');
                var loader = "<i class='fa fa-spin fa-spinner '></i>"
                var id = $(this).attr('id')
                $(this).html(loader)
               
                axios.get('{{url('admin/classer/requestSchedule')}}/' + id)
                  .then( response => {
                      //console.log(response.data)
                      if(response.data.status == 'ok')
                      {
                          $('#tr_' + id).css('background-color', '#3ec45a')
                          $('#tr_' + id).fadeOut();
                      }else{
                          $('#snackbar').html(response.data.error)  
                          popUp()

                          $(this).html('Retry')
                      }
                  })
            })

            function popUp() {
                  // Get the snackbar DIV
                  var x = document.getElementById("snackbar")

                  // Add the "show" class to DIV
                  x.className = "show";

                  // After 3 seconds, remove the show class from DIV
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
              }
          });
    </script>
@endsection
@section('styles')
  <style type="text/css">
    /* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
    visibility: hidden; /* Hidden by default. Visible on click */
    min-width: 250px; /* Set a default minimum width */
    font-size: 18px;
    margin-left: -125px; /* Divide value of min-width by 2 */
    background-color: #d20000; /* Black background color */
    color: #fff; /* White text color */
    text-align: center; /* Centered text */
    border-radius: 2px; /* Rounded borders */
    padding: 16px; /* Padding */
    position: fixed; /* Sit on top of the screen */
    z-index: 1; /* Add a z-index if needed */
    left: 50%; /* Center the snackbar */
    bottom: 30px; /* 30px from the bottom */
}

#snackbar a{
  color:#1abb9c;
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
    visibility: visible; /* Show the snackbar */

      /* Add animation: Take 0.5 seconds to fade in and out the snackbar. 
      However, delay the fade out process for 2.5 seconds */
          -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
          animation: fadein 0.5s, fadeout 0.5s 2.5s;
      }

      /* Animations to fade the snackbar in and out */
      @-webkit-keyframes fadein {
          from {bottom: 0; opacity: 0;} 
          to {bottom: 30px; opacity: 1;}
      }

      @keyframes fadein {
          from {bottom: 0; opacity: 0;}
          to {bottom: 30px; opacity: 1;}
      }

      @-webkit-keyframes fadeout {
          from {bottom: 30px; opacity: 1;} 
          to {bottom: 0; opacity: 0;}
      }

      @keyframes fadeout {
          from {bottom: 30px; opacity: 1;}
          to {bottom: 0; opacity: 0;}
      }
  </style>
@endsection