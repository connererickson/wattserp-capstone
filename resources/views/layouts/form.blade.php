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
	    <link href="{{ URL::asset('css/generaladmin.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/messi.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/draggie.css') }}" rel="stylesheet">
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	    <link href="{{ URL::asset('css/fontawesome.min.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	    <link href="{{ URL::asset('css/inventory.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/projects.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/directory.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset('css/Chart.css') }}" rel="stylesheet">
	</head>
	<body>
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
	                        @if (Auth::user()->authorizeRoles(array('Administrator', 'Executive', 'Field lead', 'Field Coordinator', 'Project Manager', 'Human Resources', 'Safety')))
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
	                        @endif
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
	                    </ul>
	                </div>
	            </div>
	        </nav>
	
	        @yield('content')
	    </div>
	
	    <!-- Scripts -->
	    <script src="{{ asset('js/app.js') }}"></script>
	    <script src="{{ asset('js/messi.js') }}"></script>
	    @if (isset($auth) && $auth == 0)      		
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
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script src="{{ URL::asset('/js/draggabilly.js') }}"></script>
		<script src="{{ URL::asset('/js/packery.js') }}"></script>
		<script src="{{ URL::asset('/js/draggie.js') }}"></script>
		<script src="{{ URL::asset('/js/config.js' ) }}"></script>
		<script src="{{ URL::asset('/js/messi.js') }}"></script>
		<script src="{{ URL::asset('/js/fontawesome.min.js') }}"></script>
		<script src="{{ URL::asset('/js/Chart.bundle.js?ver=1.0' ) }}"></script>
		<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
		<script src="{{ URL::asset('/js/custom.js' ) }}"></script>
		<script src="{{ URL::asset('/js/ajax_functions.js' ) }}"></script>
		<script src="{{ URL::asset('/js/employees.js' ) }}"></script>
		<script src="{{ URL::asset('/js/training_course.js' ) }}"></script>
		<script src="{{ URL::asset('/js/inventory.js' ) }}"></script>
		<script src="{{ URL::asset('/js/projects.js?ver=1.0' ) }}"></script>
		<script src="{{ URL::asset('/js/directory.js?ver=1.3' ) }}"></script>
		<script src="{{ URL::asset('/js/charts.js?ver=1.0' ) }}"></script>
		<!-- DATE PICKER -->
		<script type="text/javascript">
			$(function() {
				$( ".datepicker" ).datepicker({
					changeYear: true,
					yearRange: "-65Y:-0Y" 
				});
                $('.timepicker').datetimepicker({
                    format: 'HH:mm:ss'
                });
			});
		</script>
		<!-- AJAX FORM VALIDATION -->
		<script type='text/javascript'>
			$(document).ready(function(){
				//ADD THIS STUFF TO THE FORM
				//<div class='error hidden'><div>
				//{!! Form::hidden('url', url('pages/admin/users/store'), ['id'=>'url']) !!}
				
				$('#submit_ajax_form').on('click', function(e){
					e.preventDefault();
					var url = $(this).parent().find('#url').val();
					$.ajaxSetup({
						headers: {
					  		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						type : 'POST',
						url : url,
						data : $( ".ajax_form" ).serializeObject(),
						contentType : 'application/json',
						error:function(){ 
				            alert($( ".ajax_form" ).serialize());
				        },
						success : function(data){
							console.log(data);
							if ((data.errors)) {
								$('.error').removeClass('hidden');
								$('.error').html(data.errors.title);
;								$('.error').html(data.errors.body);
							}
							else {
								$('.error').remove();
							}
						}
					});
				});
			});
			(function($){
			    $.fn.serializeObject = function(){
			
			        var self = this,
			            json = {},
			            push_counters = {},
			            patterns = {
			                "validate": /^[a-zA-Z][a-zA-Z0-9_]*(?:\[(?:\d*|[a-zA-Z0-9_]+)\])*$/,
			                "key":      /[a-zA-Z0-9_]+|(?=\[\])/g,
			                "push":     /^$/,
			                "fixed":    /^\d+$/,
			                "named":    /^[a-zA-Z0-9_]+$/
			            };
			
			
			        this.build = function(base, key, value){
			            base[key] = value;
			            return base;
			        };
			
			        this.push_counter = function(key){
			            if(push_counters[key] === undefined){
			                push_counters[key] = 0;
			            }
			            return push_counters[key]++;
			        };
			
			        $.each($(this).serializeArray(), function(){
			
			            // skip invalid keys
			            if(!patterns.validate.test(this.name)){
			                return;
			            }
			
			            var k,
			                keys = this.name.match(patterns.key),
			                merge = this.value,
			                reverse_key = this.name;
			
			            while((k = keys.pop()) !== undefined){
			
			                // adjust reverse_key
			                reverse_key = reverse_key.replace(new RegExp("\\[" + k + "\\]$"), '');
			
			                // push
			                if(k.match(patterns.push)){
			                    merge = self.build([], self.push_counter(reverse_key), merge);
			                }
			
			                // fixed
			                else if(k.match(patterns.fixed)){
			                    merge = self.build([], k, merge);
			                }
			
			                // named
			                else if(k.match(patterns.named)){
			                    merge = self.build({}, k, merge);
			                }
			            }
			
			            json = $.extend(true, json, merge);
			        });
			
			        return json;
			    };
			})(jQuery);
		</script>
	</body>
</html>
