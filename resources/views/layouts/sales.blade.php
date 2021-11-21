<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>CRM - Sales</title>
    
        <!-- Styles -->
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/messi.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/fonts.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <link href="{{ URL::asset('css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/generaladmin.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/sales.css ') }}" rel="stylesheet">
    </head>
    <body>
        <div id='modal_dialog_update_background'></div>
        <div id='modal_dialog_update_box'>
            <div id='modal_dialog_content'></div>
            <input type='button' id='close_modal_dialog' class='crm_btn' value='OK' />
        </div>
        <div id="app">
            @include('layouts.navbar')
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
        <script src="{{ URL::asset('/js/sales.js' ) }}"></script>
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