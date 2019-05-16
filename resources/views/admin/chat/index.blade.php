<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script type="text/javascript">
        const baseUrl = "{{url('/')}}";
        const LoggedUser = {!! Auth::user(); !!}
    </script>
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link href="{{ asset('public/css/admin.css') }}" rel="stylesheet">
    <style type="text/css">

        body{
            background-color: #fff;
        }

        #app{
          position: relative;
        }

        .wrapper{
            display: grid;
            grid-template-columns: 350px 4fr 2fr;
        }  

        .columns{
          position: relative;
        }

      
        .wrapper > div{
            height: 100vh;
        }

        .header-list{
            font-size: 18px;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            position: fixed;
            width:349px;
            z-index: 999;
            background-color: white;
            color:black;
        }

        .header-name{
            font-size: 18px;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            position: fixed;
            margin-left:350px;
            width: 100%;
            z-index: 999;
            background-color: white;
            color:black;
            /*padding-left: 20%; */
        }

        .first-col{
          border-right: 1px solid #ccc;
        }

        .messages{
          height: 100vh;
          position: relative;
          padding-top: 47px;
          padding-bottom: 70px;
        }

        .input-div{
          position: absolute;
          bottom: 0;
          padding-bottom: 10px;
          min-height: 60px;
          border-top: 1px solid #ccc;
          width: 100%;
          white-space: pre-wrap;
          word-wrap: break-word;
        }

        .input-div textarea{
          border:none;
          overflow: none;
          box-shadow:none;
          line-height: 1.2;
          overflow: hidden;
           min-height: 50px;
           padding-left:0px;
           resize:none;
        }

        .chat-message{
          padding: 10px;
          overflow: hidden;
          height: 100%;
        }

        .chat-message:hover{
          overflow: auto;
        }

        .noscroll {
            overflow: hidden;
        }

        .hiddendiv {
          display: none;
          white-space: pre-wrap;
          width: 500px;
          min-height: 50px;
          font-family: Arial, sans-serif;
          font-size: 13px;
          padding: 5px;
          word-wrap: break-word;
        }
       

       .send{
         margin-right:15px;
       }

       .search-box{
         padding:10px 25px 10px 25px;
       }

       .search-box input{
         border-radius:5px;
       }

       .chat-list{
         padding: 10px 5px 10px 10px;
         color:#999999;
         cursor:pointer;
       }

       .chat-list:hover{
         background-color:#f1f1f1f5;
       }

      .chat-list .name{
         font-size:18px;
        /* font-weight:bold;*/
        color:#1d2129;
      }

      .profile{
        padding-top:40px;
        padding-bottom:40px;
      }

      .profile img{
        width:100px;
        height:100px;
      }

       .chat-list img{
         width: 50px;
         height:50px;
         border-radius:50%;
         margin-right:10px;
       }

       .list{
         overflow:hidden;
         height:100%;
       }

       .list:hover{
         overflow:auto;
       }

       .list-wraper{
          height:100%;
          padding-top:47px;
          
       }

       .first-column{
         position:relative;
       }


       .scroll::-webkit-scrollbar-track
      {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
        background-color: white;
      }

      .scroll::-webkit-scrollbar
      {
        width: 7px;
        background-color: #F5F5F5;
      }

      .scroll::-webkit-scrollbar-thumb
      {
        background-color: #ccc;
        border-radius: 10px;
      }

      .message{
         margin-bottom:20px;
         position:relative;
      }

      .message .content{
        padding:8px 12px 8px 12px;
        font-size:14px;
        max-width:80%;
        display:inline-block;
        border-radius:20px;
        background-color:#f1f0f0;
        position:relative;
        left:10px;
        color:black;
        
      }

      .message .me{
          background-color:#009996;
          color:white;  
      } 


      .message img{
         width:25px;
        height:25px;
        border-radius:50%;
      }

      .message-left img{
        position:absolute;
        bottom: 0;
      }

      .message-right img{
        position:absolute;
        bottom: 0;
      }

      .boxing{
        padding:25px 5px 25px 20px;
        border-top: 1px solid #ccc;
        color:black;
      }

      .boxing:last-child{
        border-bottom: 1px solid #ccc;

      }
     
    </style>
  </head>
  <body>
    <div id="app">
      <div class="header-list">
        <div class="row">
          <div class="col-xs-2">
            <div class="dropdown">
              <a id="dLabel" data-target="#" type="button " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-gear"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dLabel">
                <li><a href="">Online</a></li>
                <li><a href="">Offline</a></li>
                <li><a href="">Away</a></li>
                <li><a href="">Logout</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-10">
          {{config('app.name')}}
          </div>
        </div>
      </div>
      <div class="header-name">
        <div>
          <div class="col-xs-6 text-center">Jofie Bernas</div>
          <div class="col-xs-3"></div>
        </div>
      </div>
        <div class="wrapper">
              <div class="first-col first-column">
                <div class="list-wraper">
                    <div class='list scroll'>
                      <div class="search-box">
                        <input type="text" class="form-control input-sm" placeholder=" Search name..">
                      </div>
                      @for($i=0; $i<3; $i++)
                      <div class="chat-list">
                          <img align="left" src="https://scontent.fmnl6-1.fna.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/29103348_1848284875245534_2755632352623471801_n.jpg?_nc_cat=0&oh=2130368936f20d06d19752bb15848192&oe=5B86A4F6">
                          <span class="name">
                          Angel May Bata-anon
                          </span>
                          <br>
                          simply dummy text of the printing..
                      </div>
                      @endfor
                    </div>
                </div>
              </div>
              <div class="first-col">
                  <div class="messages"> 
                    <div class="chat-message  scroll  ">
                        @for($i=0;$i < 2; $i++)
                              <div class="message"> 
                                  <img align="left"  src="https://scontent.fmnl6-1.fna.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/29103348_1848284875245534_2755632352623471801_n.jpg?_nc_cat=0&oh=2130368936f20d06d19752bb15848192&oe=5B86A4F6">
                                  <div class="content">
                                    fwefwfew
                                  </div>
                              </div>  
                              <div class="message "> 
                                  <img align="left"  src="https://scontent.fmnl6-1.fna.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/29103348_1848284875245534_2755632352623471801_n.jpg?_nc_cat=0&oh=2130368936f20d06d19752bb15848192&oe=5B86A4F6">
                                  <div class="content me">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. 
                                  </div>
                              </div>  
                        @endfor 
                    </div>
                    <div class="input-div"> 
                      <div class="col-sm-11">
                        <textarea id="textarea"  name="" autoFocus class="form-control common" placeholder=" Type a message.."></textarea>
                      </div>
                      <div class="col-sm-1">
                        <button class="btn send" ><i class="fa fa-send"></i></button>
                      </div>
                    </div>  
                  </div>
              </div>
              <div>
                <div class="profile">
                  <img src="{{asset('public/images/bg.png')}}">
                  <img class="center-block img-circle" src="https://scontent.fmnl6-1.fna.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/29103348_1848284875245534_2755632352623471801_n.jpg?_nc_cat=0&oh=2130368936f20d06d19752bb15848192&oe=5B86A4F6">
                </div> 
                <div class="boxing">
                  Basic Information
                  <i class="fa fa-user"></i> Angel May Bata-anon
                  <i class="fa fa-map-marker"></i> Robinson's Place
                  <i class="fa fa-list"></i> Cashier
                </div>    
                  
                
              </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('public/js/chat.js')}}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script>
    <script type="text/javascript">
      $(function() {
        var txt = $('#textarea'),
          hiddenDiv = $(document.createElement('div')),
          content = null;

        txt.addClass('txtstuff');
        hiddenDiv.addClass('hiddendiv common');

        $('body').append(hiddenDiv);

        txt.on('keyup change keypress', function () {
          inputDiv = $('.input-div').height();
          content = $(this).val();

          content = content.replace(/\n/g, '<br>');
          hiddenDiv.html(content + '<br class="lbr">');

          $(this).css('height', hiddenDiv.height());
          $('.messages').css('padding-bottom', inputDiv + 10);

        });
      });
    </script>
  </body>
</html>