<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Watts ERP</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                /*font-size: 84px;*/
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #footer{
            	position: absolute;
            	bottom: 0;
            	text-align: center;
            	width: 100%;
            	background-color: #EEEEEE;
            }
            #software{
            	font-family: new_york_escaperegular;
            	font-size: 32px;
            	float: left;
            	font-weight: bold;
            	padding: 20px;
            	display: inline;
            	text-shadow: 0px 2px 3px rgba(255,255,255,0.5);
            	color: transparent;
            	-webkit-background-clip: text;
     			-moz-background-clip: text;
          		background-clip: text;
          		background-color: #565656;
            }
            #software span{
                font-size: 16px;
                display: block;
                font-family: aileronsregular;
            }
            #company{
            	font-family: aileronsregular;
            	font-size: 18px;
            	font-weight: bold;
            	padding: 20px;
            	width: 400px;
            	margin-left: auto;
            	margin-right: auto;
            	display: inline-block;
            	margin-top: 10px;
            }
            #version{
            	font-family: aileronsregular;
            	font-size: 18px;
            	float: right;
            	font-weight: bold;
            	padding: 20px;
            	display: inline;
            	margin-top: 10px;
            }
            .home_button{
            	background-color: #DFDFDF;
            	transition: background-color 0.5s ease-out;
            	padding: 30px 40px;
            	height: 25px;
            	width: 180px;
            }
            .home_button a{
            	font-size: 24px;
            	font-weight: bold;
            	font-family: helvetica_neue;
            	color: #222222;
            	padding: 0;
            	margin: 0;
            	text-decoration: none;
            	display: inline;
            }
            .home_button:hover{
            	background-color: #D2D2D2;
            	cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (!Auth::check())
                        <!--<a href="{{ url('/login') }}">Login</a> -->
                        <!-- <a href="{{ url('/register') }}">Register</a> -->
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <!--<img src='{{ asset('images/scp_logo.png') }}' alt='' />-->
                    <div class='home_button'>
                    	@if (!Auth::check())
                    		<a href="{{ url('/login') }}">Login</a>
                    	@else
                    		<a href="{{ url('pages/dashboard') }}">Dashboard</a>
                    	@endif
                    	
                    </div>
                </div>
            </div>
            
            <div id='footer'>
            	<div id='software'>WATTS ERP<span>AN INSTANCE OF GNOME ERP</span></div>
            	<div id='company'>NETPOINT, LLC  |  COPYRIGHT &copy; 
            		<script type='text/javascript'>
            			document.write(new Date().getFullYear());
            		</script>
            	</div>
            	<div id='version'>VERSION: 1.0</div>
            </div>
        </div>
    </body>
</html>
