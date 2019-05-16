
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{{config('app.name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/css/app.css')}}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{asset('public/css/narrow.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

       	<nav class="navbar">
	      	<div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed menu-burger" style="background-color: #ccc" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <i class="fa fa-navicon"></i>
		          </button>
		          <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/site/img/logo1.png')}}" height="30"></a>
		        </div>
		        <div id="navbar" class="collapse navbar-collapse">
		          <ul class="nav navbar-nav navbar-right">
		            <li class="active"><a href="#">수업소개</a></li>
		            <li><a href="#about">수업소개</a></li>
		            <li><a href="#contact">수강신청/수강료</a></li>
		            <li><a href="#contact">고객센터</a></li>
		            <li><a href="#contact">마이페이지</a></li>
		            <li><a href="#contact">LOGIN</a></li>
		          </ul>
		        </div><!--/.nav-collapse -->
	      	</div>
    	</nav>
    	<div id="menu-tab" style="background-image:url('{{asset('public/site/img/menu-bg.jpg')}}'); background-position: left">
    		<div class="container">
	    		<div class="flex">
	    			<div style="background-color: transparent;width: 125px;">
	    				
	    				<img src="{{asset('public/site/img/logo1.png')}}" class="img-reponsive" style="width: 115px; ">
	    				<br>
	    				<h4 style="color:white;">LMS</h4>
	    			</div>
	    			<div class="">
	    				<a href="">화상영어</a>
	    				<a href=""> 전화영어 </a>
	    				<a href=""> 무료체험 </a>
	    			</div>
	    			<div class="">
	    				<a href="">수업후기</a>
	    				<a href="">수업후기</a>
	    				<a href="">강사소개</a>
	    			</div>
	    			<div class="">
	    			</div>
	    			<div class="">
	    				<a href="">공지사항</a>
	    				<a href="">자주하는 질문</a>
	    				<a href="">1:1문의</a>
	    				<a href="">블로그</a>
	    				<a href="">기업/단체수강 문의</a>
	    				<a href="">학원/공부방 제휴문의</a>
	    			</div>
	    			<div class="">fwef</div>
	    			<div class="">fwef</div>
	    		</div>
    		</div>
		</div>
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position: relative;">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				    	<div class="jumbotron" style="background-color:#63c6b9; color:black;">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-6 text-left">

						      		<h2>민족문화의</h2>
						      		<p>및 민족문화의 창달에 노력하여 대통령으로서의 직책을 성실히 수행할 것을 국민 앞에 엄숙히 선서합니다</p>
						      		<button class="btn btn-primary btn-sm">수강신청</button>

						      	</div>
						      	<div class="col-sm-6">
						      		<img src="{{asset('public/site/img/global-networking-responsive-img.png')}}" class="img-reponsive">
						      	</div>
						      </div>
							</div>
						</div>
				    </div>
				    <div class="item">
				      <div class="jumbotron" style="background-color:#dfdef4; color:black;">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-5 text-left">
						      		<h2>민족문화의</h2>
						      		<p>및 민족문화의 창달에 노력하여 대통령으로서의 직책을 성실히 수행할 것을 국민 앞에 엄숙히 선서합니다</p>
						      	</div>
						      	<div class="col-sm-7">
						      		<img src="{{asset('public/site/img/CompetencyDevelopmentSPLMSblue.png')}}" class="img-reponsive">
						      	</div>
						      </div>
							</div>
						</div>
				    </div>
				    <div class="item">
				      <div class="jumbotron" style="background-color:#dfdef4; color:black;">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-5 text-left">
						      		<h2>민족문화의</h2>
						      		<p>및 민족문화의 창달에 노력하여 대통령으로서의 직책을 성실히 수행할 것을 국민 앞에 엄숙히 선서합니다</p>
						      	</div>
						      	<div class="col-sm-7">
						      		<img src="{{asset('public/site/img/language.png')}}" class="img-reponsive">
						      	</div>
						      </div>
							</div>
						</div>
				    </div>
				  </div>
			</div>
		<div class="container">
			<div class="featurite">
				<div>
					<h3 class="text-center">
						화상영어
					</h3>
					<div class="featurite-child">
							
					</div> 
				</div>
				<div>
					<h3 class="text-center">
						전화영어 
					</h3>
					<div class="featurite-child">
							<div></div>
					</div>
				</div>
				<div>
					<h3 class="text-center">
						무료체험
					</h3>
					<div class="featurite-child">
							<div></div>
						</div>
				</div>
			</div>
		</div>
		<br>
		<div style="background-color: #f7f7f7; color:black">
			<div class="container">
				<div class="row" style="padding: 30px; padding-top: 10px">
					<div class="col-sm-8">
						<h2>Notice</h2>
						<table class="table table-hovered">
							<tr>
								<td>창달에 노력하여야 한다.</td>
								<td align="right">2018-03-24</td>
							</tr>
							<tr>
								<td>창달에 노력하여야 한다.</td>
								<td align="right">2018-03-24</td>
							</tr>
							<tr>
								<td>창달에 노력하여야 한다.</td>
								<td align="right">2018-03-24</td>
							</tr>
							<tr>
								<td>창달에 노력하여야 한다.</td>
								<td align="right">2018-03-24</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-4 text-center">
						<br>
						<br>
						<h4 class="line"><span>CONTACT US</span></h4>
						<h1 class="text-success">1661-5350</h1>
						<p>
							Class time: 6 am - 12 midnight  <br> 
							Consultation time: 11 am - 7 pm <br>
							Lunch time: 12 pm - 1 pm 
						</p>
						<hr>
					</div>
				</div>
			</div>
		</div>	
      <div class="row footer">
      	<div class="container">
      		<div class="row">
	      		<div class="col-lg-3 t text-center">
	      			<img src="{{asset('public/site/img/logo1.png')}}" ><br>
	      			<h2>SUNDAY2PM LMS</h2>
	      		</div>
		        <div class="col-lg-4">
		          <h4>ONLINE CUSTOMER SERVICE</h4>
		          <small>
		          	The manager of the international school working career answers. <br>
					KakaoTalk: happybd512 <br>
					line: skyccpp  <br>
					consultation time outside 1: 1 inquiry bulletin board / mobile message
		          </small>
				</div>

				 <div class="col-lg-5">
		          <h4>Corporate / Academy Partnership</h4>
		          <small>
		          	Provide LMS, homepage Provide 
					classroom, company, group
		          </small>
				</div>
			</div>
			<hr>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
						<p>&copy;{{date('Y')}} s2PM , Inc.</p>
				</div>
				<div class="col-sm-10">
					<small><small>
					© 2006 ONTALK . All Rights Reserved (Renewed 2014) mutongjang: National Bank 470701-04-249658 gimgyeongdeok <br>
					Sunday piem English center-to-Match beongil 26 29 Call dong, Jung-gu mokjung: 1661-5350 President: gimgyeongdeok Business Registration Number: 305-31-87449 
					</small></small>
				</div>
			</div>
        
        </div>
	    </div>
      </div>



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('public/js/app.js')}}"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.navbar, #menu-tab').hover(function(){
    			$('#menu-tab').show()
    		}, function(){
    			$('#menu-tab').hide()
    		})
    	})
    </script>
  </body>
</html>
