<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        
    </title>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <style type="text/css">
        body{
            margin:0;
            padding: 0;
            height: 100vh;
        }

        body::-webkit-scrollbar {
        display: none;
        }

        .app-name{
            padding:10px;
            background-color: #2a3f54;
            color: white;
            font-size: 15px;
            width: 100%;
            position: absolute;
        }

        .chatbox{
            background-color: white;
        }

        .content::-webkit-scrollbar
        {
            width: 10px;
            background-color: #f4f4f4;
        }

        .content::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #ccc;
        }

        .chat-messages::-webkit-scrollbar
        {
            width: 10px;
            background-color: #f4f4f4;
        }

        .chat-messages::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #ccc;
        }


        .section .title{
            border-bottom: 1px solid #ccc; 
            border-top: 1px solid #ccc; 
            font-size: 14px;
            padding: .8em;
            color:black;
            font-weight: bold;
        }


        .team-section .title{
            border-top: none;
        }



        .chatbox .col{
            margin:0px;
            position: relative;
            border:1px solid #ccc;
            padding: 0px;
            height: 100vh;
        }

        .chatbox .col:first-child{
           border-right:none; 
        }

        .contact-chat-box{
            padding: 8px;
            padding-left: 15px;
            font-size: 1em;
            cursor: pointer;
        }

        .contact-chat-box:hover{
            background-color: #ccc;
            color:black;
        }

        .messsage-container{
            height: 500px; 
            position: relative;
        }

        .messsage-container .chat-messages{
            background-color: #f4f4f4;
            height: 80vh;
            overflow: auto;
        }

        .chat-messages .message{
            margin:15px;
       }

       .chat-messages .message small{
            color: #a2a5a5;
            padding-left: 16px;
       }

       .chat-messages .message .name{
            font-weight: bold;
       }

        .chat-messages .message p{
            padding: 10px;
            border-radius: 10px;
            background-color: white;
            line-height: 1.2;
            width: 70%;
            font-size: 16px;
            color:#3a3a3a;
            margin-bottom: 0px;
            border:1px solid #e2e2e2;    
        }

        .message p.me{
            padding: 10px;
            border-radius: 10px;
            background-color: #d7f2f2;
            line-height: 1.2;
            width: 70%;
            font-size: 16px;
            color:#3a3a3a;
            margin-bottom: 0px;  
            border:1px solid #e2e2e2;  
        }

        .team-section{
            margin-top: 40px;
            height: 25vh;
        }

        .teacher-section{
            height: 70vh;
        }

        .teacher-section .content{
            height: 94%;
            overflow: auto;
        }

        .chat-input{
            width: 100%;
            border-top:1px solid #ccc;
            height: 15vh;
        }

        .chat-recipient{
            width: 100%;
            border-bottom:1px solid #ccc;
            padding: 10px;
            color:black;
            font-size: 1.2em;
            padding-left: 20px;
            height: 5vh;
            text-align: center;
        }

        .chat-input textarea{
            resize: none;
            border: none;
            height: 93%;
        }

        .contact-chat-box .badge{
            background-color: #e03535;
            color:white;
            font-size: 9px;
        }
    </style>
</head>
<body>
    <div id="app">
            <div class="chatbox">
               
                <div class="col col-xs-3">
                     <div class="app-name">
                    {{config('app.name')}}
                </div>
                    <div class="section team-section">
                        <div class="title">@lang('label.teams')</div>
                        <div class="content">
                            @foreach($teams as $team)
                                <div class="contact-chat-box">
                                    {{$team->name}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="section teacher-section">
                        <div class="title">@lang('label.teachers')</div>
                        <div class="content">
                             @foreach($teachers as $teacher)
                                <div class="contact-chat-box">
                                    {{$teacher->name}} @if($loop->first)<span class="badge">2</span>@endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                   
                </div>
                <div class="col col-xs-9">
                    <div class="messsage-container" >
                        <div class="chat-recipient">
                            Dr. Dejuan Pfannerstill
                        </div>

                        <div class="chat-messages">
                            <div class="message">
                                <div class="name">Dr. Dejuan Pfannerstill</div>
                                <p>
                                   
                                natibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, v
                                </p>
                                <small>1:30pm | Feb 8, 2018</small>
                            </div>
                            <div class="message">
                                <div class="name">Jofie Bernas</div>
                                <p class="me">
                                natibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, v
                                </p>
                                <small>1:30pm | Feb 8, 2018</small>
                            </div>
                            <div class="message">
                                <div class="name">Dr. Dejuan Pfannerstill</div>
                                <p>
                                where is the bla12
                                </p>
                                <small>1:30pm | Feb 8, 2018</small>
                            </div>
                        </div>

                        <div class="chat-input">
                            <textarea class="form-control" placeholder="message here..."></textarea>
                        </div> 
                    </div>
                </div>
            </div>
    </div>       
</body>

</html>