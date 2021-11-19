<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	    <title>CRM</title>
	
	    <!-- Styles -->
	    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/messi.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/fonts.css') }}" rel="stylesheet">
	    <script src="{{ URL::asset('js/app.js') }}"></script>
	    <link href="{{ URL::asset('css/fontawesome.min.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/generaladmin.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/module_styles.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/form_builder.css ') }}" rel="stylesheet">
		<script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
		<!-- <script src="/js/jquery.min.js"></script>
    	<script src="/js/bootstrap.min.js"></script> -->
	</head>
	<body>
		<div id='modal_dialog_update_background'></div>
		<div id='modal_dialog_update_box'>
			<div id='modal_dialog_content'></div>
			<input type='button' id='close_modal_dialog' class='crm_btn' value='OK' />
		</div>
	    <div id="app">
	        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="erp_main_nav">
	        <!-- <nav class="navbar navbar-default navbar-static-top" id="erp_main_nav"> -->
	            <div class="container">
	                <div class="navbar-header">

					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                		<span class="navbar-toggler-icon"></span>
           			</button>
	                    <!-- Collapsed Hamburger
	                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
	                        <span class="sr-only">Toggle Navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button> -->
	
	                    <!-- Branding Image -->
	                    <!--<a class="navbar-brand" href="{{ url('/') }}">-->
	                    <img src="{{ URL::asset( 'storage/' . $org_dir . '/logo.png' ) }}" alt='' />
	                    <!--</a>-->
	                </div>
	
	                <div class="collapse navbar-collapse" id="app-navbar-collapse">
	                    <!-- Left Side Of Navbar -->
	                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
	                        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
	                        @if (Auth::user()->authorizeRoles(array('Sales')))
	                           <li class="nav-item"><a href="{{ route('resources') }}">Resources</a></li>
	                           <li class="nav-item"><a href="{{ route('profile') }}">My Profile</a></li>
	                        @endif
	                        @if (Auth::user()->authorizeRoles(array('Internal')))
	                        <li class="nav-item dropdown">
	                        	<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
	                            	Human Resources
									<!-- <span class="caret"></span> -->
	                            </a>
	                            <ul class="dropdown-menu" role="menu">
	                                <li>
	                                	<a href="{{ route('employees') }}" class="dropdown-item">Employees</a>
	                                </li>
	                                @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Field Coordinator', 'Human Resources', 'Safety')))
	                                <li>
	                                	<a href="{{ route('safety') }}" class="dropdown-item">Safety</a>
	                                </li>
	                                @endif
	                                @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Sales Manager', 'Human Resources', 'Contracts')))
	                                <li>
	                                	<a href="{{ route('channel_partners') }}" class="dropdown-item">Channel Partners</a>
	                                </li>
	                                @endif
	                        	</ul>
	                        </li>
	                        @endif
	                        @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Field Lead', 'Field Coordinator', 'Project Manager', 'Field Crew')))
	                        <li class="nav-item dropdown">
	                        	<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
	                            	Project <span class="caret"></span>
	                            </a>
	                            <ul class="dropdown-menu" role="menu">
	                            	@if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Project Manager')))
	                                <li class="nav-item">
	                                	<a href="{{ route('leads') }}" class="nav-link">Leads</a>
	                                </li>
	                                @endif
	                                <li class="nav-item">
	                                	<a href="{{ route('projects') }}" class="nav-link">Projects</a>
	                                </li>
	                                <li class="nav-item">
	                                	<a href="{{ route('archive') }}" class="nav-link">Archive</a>
	                                </li>
	                        	</ul>
	                    	</li>
	                    	@endif
	                    	@if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Field Lead', 'Field Coordinator', 'Project Manager', 'Inventories', 'Safety')))
	                    	<li class="nav-item dropdown">
	                        	<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
	                            	Inventory <span class="caret"></span>
	                            </a>
	                            <ul class="dropdown-menu" role="menu">
	                            	
	                            	<li class="nav-item">
	                                	<a href="{{ route('inventory') }}" class="nav-link">Inventory</a>
	                                </li>
	                                @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Project Manager', 'Inventories', 'Safety')))
	                                <li class="nav-item">
	                                	<a href="{{ route('repository') }}" class="nav-link">Repository</a>
	                                </li>
	                                @endif
	                        	</ul>
	                    	</li>
	                    	@endif
	                    	@if (Auth::user()->authorizeRoles(array('Internal', 'Sales')))
	                    		<li class="nav-item">
	                    			<a href="{{ route('directory') }}" class="nav-link">Directory</a>
	                    		</li>
	                    	@endif
	                    	@if (Auth::user()->authorizeRoles(array('Internal')))
	                    	<li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                    Applications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                    <li class="nav-item">
                                        <a href="{{ route('weather') }}" class="nav-link">Weather Station</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
	                    </ul>
	
	                    <!-- Right Side Of Navbar -->
	                    <ul class="nav navbar-nav navbar-right">
	                        <!-- Authentication Links -->
	                        @if (Auth::guest())
	                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
	                            <!--<li><a href="{{ route('register') }}">Register</a></li>-->
	                        @else
	                        	@if (Auth::user()->authorizeRoles(array('Super Admin')))
	                        	<li class="nav-item dropdown">
	                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
	                                    Switch Organization <span class="caret"></span>
	                                </a>
	                                <ul class="dropdown-menu" role="menu">
	                                	@foreach ($all_orgs as $organization)
	                                		<li><a href="{{ route('dashboard', ['org_id' => $organization->id]) }}" class="nav-link">{{ $organization->name }}</a></li>
	                                	@endforeach
	                                </ul>
	                            </li>
	                            @endif
	                            <li class="nav-item dropdown">
	                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
	                                    {{ Auth::user()->name }} <span class="caret"></span>
	                                </a>
	
	                                <ul class="dropdown-menu" role="menu">
	                                	@if (Auth::user()->authorizeRoles('Administrator'))
		                            		<li class="nav-item">
		                                    	<a href="{{ route('admin') }}" class="nav-link">Admin</a>
		                                	</li>
		                                @endif
		                                <li class="nav-item">
		                                	<a href="{{ route('settings') }}" class="nav-link">My Settings</a>
		                                </li>
	                                    <li class="nav-item">
	                                        <a href="{{ route('logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();" class="nav-link">
	                                            Logout
	                                        </a>
	
	                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                            {{ csrf_field() }}
	                                        </form>
	                                    </li>
	                                </ul>
	                    		</li>
	                        @endif
	                    </ul>
	                </div>
	            </div>
	        </nav>
	
	        @yield('content')
	    </div>
	
	    <!-- Scripts -->
	    <script src="{{ URL::asset('/js/messi.js') }}"></script>
	    <script src="{{ URL::asset('/js/fontawesome.min.js') }}"></script>
	    <script src="{{ URL::asset('/js/draggabilly.js') }}"></script>
	    <script src="{{ URL::asset('/js/packery.js') }}"></script>
	    <script src="{{ URL::asset('/js/draggie.js' ) }}"></script>
	    <script src="{{ URL::asset('/js/config.js' ) }}"></script>
	    <script src="{{ URL::asset('/js/custom.js' ) }}"></script>
	    <script src="{{ URL::asset('/js/modules.js' ) }}"></script>
	    <script src="{{ URL::asset('/js/ajax_functions.js' ) }}"></script>
	    <script src="{{ URL::asset('/js/form_builder.js' ) }}"></script>
	    <script type='text/javascript'>
	    	$('.phone').text(function(i, text) {
			    return text.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
			});
	    </script>
	    @if (null !== session('auth_result') && session('auth_result') == 0)
		    <script type='text/javascript'>
				var dialog = new Messi(
				    'You are not authorized to view this page. You have been returned to the dashboard',
				    {
				        title: 'Authentication',
				        titleClass: 'anim error',
				        buttons: [ {id: 0, label: 'Close', val: 'X'} ]
				    }
				);
			</script>
		@endif
	</body>
</html>
