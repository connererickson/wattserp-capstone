<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	    <title>CRM - Incidents</title>
	
	    <!-- Styles -->
	    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/messi.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/fonts.css') }}" rel="stylesheet">
	    <script src="{{ URL::asset('js/app.js') }}"></script>
	    <link href="{{ URL::asset('css/fontawesome.min.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/draggie.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/generaladmin.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/incidents.css') }}" rel="stylesheet"
	</head>
	<body>
		<div id='modal_dialog_update_background'></div>
		<div id='modal_dialog_update_box'>
			<div id='modal_dialog_content'></div>
			<input type='button' id='close_modal_dialog' class='crm_btn' value='OK' />
		</div>
	    <div id="app">
	        <nav class="navbar navbar-default navbar-static-top" id="erp_main_nav">
	            <div class="container">
	                <div class="navbar-header">
	
	                    <!-- Collapsed Hamburger -->
	                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
	                        <span class="sr-only">Toggle Navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	
	                    <!-- Branding Image -->
	                    <!--<a class="navbar-brand" href="{{ url('/') }}">-->
	                    <img src="{{ URL::asset( 'storage/' . $org_dir . '/logo.png' ) }}" alt='' />
	                    <!--</a>-->
	                </div>
	
	                <div class="collapse navbar-collapse" id="app-navbar-collapse">
	                    <!-- Left Side Of Navbar -->
	                    <ul class="nav navbar-nav">
	                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
	                        
	                        <li class="dropdown">
	                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                            	Human Resources <span class="caret"></span>
	                            </a>
	                            <ul class="dropdown-menu" role="menu">
	                                <li>
	                                	<a href="{{ route('employees') }}">Employees</a>
	                                </li>
	                                @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Field Coordinator', 'Human Resources', 'Safety')))
	                                <li>
	                                	<a href="{{ route('safety') }}">Safety</a>
	                                </li>
	                                @endif
	                                @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Sales Manager', 'Human Resources', 'Contracts')))
	                                <li>
	                                	<a href="{{ route('channel_partners') }}">Channel Partners</a>
	                                </li>
	                                @endif
	                        	</ul>
	                        </li>
	                       
	                        @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Field Lead', 'Field Coordinator', 'Project Manager', 'Field Crew')))
	                        <li class="dropdown">
	                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                            	Project <span class="caret"></span>
	                            </a>
	                            <ul class="dropdown-menu" role="menu">
	                            	@if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Project Manager')))
	                                <li>
	                                	<a href="{{ route('leads') }}">Leads</a>
	                                </li>
	                                @endif
	                                <li>
	                                	<a href="{{ route('projects') }}">Projects</a>
	                                </li>
	                                <li>
	                                	<a href="{{ route('archive') }}">Archive</a>
	                                </li>
	                        	</ul>
	                    	</li>
	                    	@endif
	                    	@if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Field Lead', 'Field Coordinator', 'Project Manager', 'Inventories', 'Safety')))
	                    	<li class="dropdown">
	                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                            	Inventory <span class="caret"></span>
	                            </a>
	                            <ul class="dropdown-menu" role="menu">
	                            	
	                            	<li>
	                                	<a href="{{ route('inventory') }}">Inventory</a>
	                                </li>
	                                @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Contracts', 'Project Manager', 'Inventories', 'Safety')))
	                                <li>
	                                	<a href="{{ route('repository') }}">Repository</a>
	                                </li>
	                                @endif
	                        	</ul>
	                    	</li>
	                    	@endif
	                    	@if (Auth::user()->authorizeRoles(array('Internal', 'Sales')))
	                    		<li>
	                    			<a href="{{ route('directory') }}">Directory</a>
	                    		</li>
	                    	@endif
	                    	<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Applications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                    <li>
                                        <a href="{{ route('weather') }}">Weather Station</a>
                                    </li>
                                </ul>
                            </li>
	                    </ul>
	
	                    <!-- Right Side Of Navbar -->
	                    <ul class="nav navbar-nav navbar-right">
	                        <!-- Authentication Links -->
	                        @if (Auth::guest())
	                            <li><a href="{{ route('login') }}">Login</a></li>
	                            <!--<li><a href="{{ route('register') }}">Register</a></li>-->
	                        @else
	                        	@if (Auth::user()->authorizeRoles(array('Super Admin')))
	                        	<li class="dropdown">
	                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                    Switch Organization <span class="caret"></span>
	                                </a>
	                                <ul class="dropdown-menu" role="menu">
	                                	@foreach ($all_orgs as $organization)
	                                		@if ($organization->name != 'All Organizations')
	                                			<li><a href="{{ route('dashboard', ['org_id' => $organization->id]) }}">{{ $organization->name }}</a></li>
	                                		@endif
	                                	@endforeach
	                                </ul>
	                            </li>
	                            @endif
	                            
	                            <li class="dropdown">
	                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                    {{ Auth::user()->name }} <span class="caret"></span>
	                                </a>
	
	                                <ul class="dropdown-menu" role="menu">
	                                	@if (Auth::user()->authorizeRoles('Administrator'))
		                            		<li>
		                                    	<a href="{{ route('admin') }}">Admin</a>
		                                	</li>
		                                @endif
		                                <li>
		                                	<a href="{{ route('settings') }}">My Settings</a>
		                                </li>
	                                    <li>
	                                        <a href="{{ route('logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
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
	    <script src="{{ URL::asset('/js/config.js') }}"></script>
	    <script src="{{ URL::asset('/js/custom.js') }}"></script>
	    <script src="{{ URL::asset('/js/ajax_functions.js' ) }}"></script>
	    <script src="{{ URL::asset('/js/draggie.js') }}"></script>
	    <script src="{{ URL::asset('/js/incidents.js') }}"></script>
	    <script type='text/javascript'>
	    	$('.phone').text(function(i, text) {
			    return text.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
			});
	    </script>
	    @if (null !== session('auth_result') && session('auth_result') == 0)
		    <script type='text/javascript'>
				var dialog = new Messi(
				    'You are not authorized to view this page. You have been returned to Safety',
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
