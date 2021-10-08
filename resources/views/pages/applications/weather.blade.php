@extends('layouts.applications')

@section('content')
<div class="container">
    <div class="row" id="weather_application">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Weather Station</p>
                    <a href='' class='crm_btn' id='weather_add_location'>Add Location</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('created_weather_location'))
                                <p class='bg_success'>{{ Session('created_weather_location') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row" id="add_location_form_container">
                        {!! Form::open(['method'=>'POST', 'action'=>'ApplicationsController@store_location', 'class'=>'crm_form', 'id'=>'add_location_form']) !!}
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        {!! Form::hidden('org_id', $org_id, ['class'=>'form-control']) !!}
                                        {!! Form::hidden('location_id', null, ['class'=>'form-control', 'id'=>'location_id']) !!}
                                        {!! Form::label('city', 'City') !!}
                                        {!! Form::text('city', null, ['class'=>'form-control']) !!}
                                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class='form-group'>
                                        {!! Form::label('latitude', 'Latitude') !!}
                                        {!! Form::text('latitude', null, ['class'=>'form-control']) !!}
                                        {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class='form-group'>
                                        {!! Form::submit('Add Location', ['class'=>'crm_btn', 'id'=>'submit_new_location']) !!}
                                        {!! Form::submit('Update Location', ['class'=>'crm_btn', 'id'=>'submit_location_update']) !!}
                                        <a class='crm_btn2' href='#' id='cancel_add_location'>Cancel</a>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        {!! Form::label('state', 'State') !!}
                                        <select id='state' name='state' class='form-control'>
                                            <option value='select'>-- Select --</option>
                                            @foreach($states as $state)
                                                <option value='{{ $state }}'>{{ $state }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class='form-group'>
                                        {!! Form::label('longitude', 'Longitude') !!}
                                        {!! Form::text('longitude', null, ['class'=>'form-control']) !!}
                                        {!! $errors->first('longitude', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="row">
                        <ul id="weather_locations">
                        @foreach($weather_locations as $weather_location)
                            <li>
                                {{ $weather_location->city }}, {{ $weather_location->state }}
                                <a class='weather_edit_location' id='{{ $weather_location->id }}' data-city='{{ $weather_location->city }}' data-state='{{ $weather_location->state }}' data-latitude='{{ $weather_location->latitude }}' data-longitude='{{ $weather_location->longitude }}'>
                                    <img src="{{ URL::asset('/images/edit.png' )}}" alt="" class="action_icon" />
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class='row' id='weather_container'>
                        <?php
                        //echo '<pre>';
                        //var_dump($forecasts[0]->daily->data);
                        //echo '</pre>';
                        $counter = 0;
                        $day_of_week = date('N', time())-1;
                        ?>
                        @foreach($weather_locations as $weather_location)
                            <div class="row weather_data">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">7-Day Forcast</div>
                                        <div class="panel-body seven_day">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <?php $icon = $forecasts[$counter]->daily->data[0]->icon; ?>
                                                    <p><?php echo date('l', $forecasts[$counter]->daily->data[0]->time); ?></p>
                                                    <img src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                    <span>{{ $forecasts[$counter]->daily->data[0]->summary }}</span>
                                                    <div class='high_temp'>High {{ $forecasts[$counter]->daily->data[0]->temperatureHigh }}°</div>
                                                    <div class='low_temp'>High {{ $forecasts[$counter]->daily->data[0]->temperatureLow }}°</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php $icon = $forecasts[$counter]->daily->data[1]->icon; ?>
                                                    <p><?php echo date('l', $forecasts[$counter]->daily->data[1]->time); ?></p>
                                                   <img src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                    <span>{{ $forecasts[$counter]->daily->data[1]->summary }}</span>
                                                    <div class='high_temp'>High {{ $forecasts[$counter]->daily->data[1]->temperatureHigh }}°</div>
                                                    <div class='low_temp'>High {{ $forecasts[$counter]->daily->data[1]->temperatureLow }}°</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php $icon = $forecasts[$counter]->daily->data[2]->icon; ?>
                                                    <p><?php echo date('l', $forecasts[$counter]->daily->data[2]->time); ?></p>
                                                    <img src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                    <span>{{ $forecasts[$counter]->daily->data[2]->summary }}</span>
                                                    <div class='high_temp'>High {{ $forecasts[$counter]->daily->data[2]->temperatureHigh }}°</div>
                                                    <div class='low_temp'>High {{ $forecasts[$counter]->daily->data[2]->temperatureLow }}°</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php $icon = $forecasts[$counter]->daily->data[3]->icon; ?>
                                                    <p><?php echo date('l', $forecasts[$counter]->daily->data[3]->time); ?></p>
                                                    <img src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                    <span>{{ $forecasts[$counter]->daily->data[3]->summary }}</span>
                                                    <div class='high_temp'>High {{ $forecasts[$counter]->daily->data[3]->temperatureHigh }}°</div>
                                                    <div class='low_temp'>High {{ $forecasts[$counter]->daily->data[3]->temperatureLow }}°</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php $icon = $forecasts[$counter]->daily->data[4]->icon; ?>
                                                    <p><?php echo date('l', $forecasts[$counter]->daily->data[4]->time); ?></p>
                                                    <img src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                    <span>{{ $forecasts[$counter]->daily->data[4]->summary }}</span>
                                                    <div class='high_temp'>High {{ $forecasts[$counter]->daily->data[4]->temperatureHigh }}°</div>
                                                    <div class='low_temp'>High {{ $forecasts[$counter]->daily->data[4]->temperatureLow }}°</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php $icon = $forecasts[$counter]->daily->data[5]->icon; ?>
                                                    <p><?php echo date('l', $forecasts[$counter]->daily->data[5]->time); ?></p>
                                                    <img src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                    <span>{{ $forecasts[$counter]->daily->data[5]->summary }}</span>
                                                    <div class='high_temp'>High {{ $forecasts[$counter]->daily->data[5]->temperatureHigh }}°</div>
                                                    <div class='low_temp'>High {{ $forecasts[$counter]->daily->data[5]->temperatureLow }}°</div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php $icon = $forecasts[$counter]->daily->data[6]->icon; ?>
                                                    <p><?php echo date('l', $forecasts[$counter]->daily->data[6]->time); ?></p>
                                                    <img src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                    <span>{{ $forecasts[$counter]->daily->data[6]->summary }}</span>
                                                    <div class='high_temp'>High {{ $forecasts[$counter]->daily->data[6]->temperatureHigh }}°</div>
                                                    <div class='low_temp'>High {{ $forecasts[$counter]->daily->data[6]->temperatureLow }}°</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id='current_conditions'>
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Current Conditions</div>
                                                <div class="panel-body current_conditions">
                                                    <div class="row">
                                                        <div class="col-md-6 location_data">
                                                            <span>{{ $weather_location->city }}, {{ $weather_location->state }}</span><br />
                                                            <span>{{ $weather_location->latitude }}, {{ $weather_location->longitude }}</span><br />
                                                            <span><?php echo date('D M d, Y', $forecasts[$counter]->currently->time); ?></span><br />
                                                            <span class="time"></span><br />
                                                            <span>GMT -7</span>
                                                        </div>
                                                        <div class="col-md-6 current_temperature">
                                                            <?php $icon = $forecasts[$counter]->currently->icon; ?>
                                                            <img data-icon='{{ $forecasts[$counter]->currently->icon }}' src="<?php echo URL::asset('/images/weather/' . $icon . '.png') ?>" alt="" />
                                                            <p>{{ $forecasts[$counter]->currently->summary }}</p>
                                                            <div>{{ $forecasts[$counter]->currently->temperature }}°</div>
                                                            <span>Feels Like {{ $forecasts[$counter]->currently->apparentTemperature }}°</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Today</div>
                                                <div class="panel-body today">
                                                    <div class="row">
                                                        <div class="col-md-4 day_times">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>Sunrise</p>
                                                                    <img src="{{ URL::asset('/images/weather/sunrise.png' )}}" alt="" />
                                                                    <span>{{ date('g:i A', $forecasts[$counter]->daily->data[$day_of_week]->sunriseTime) }}</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Sunset</p>
                                                                    <img src="{{ URL::asset('/images/weather/sunset.png' )}}" alt="" />
                                                                    <span>{{ date('g:i A', $forecasts[$counter]->daily->data[$day_of_week]->sunsetTime) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 wind_data">
                                                            <h4>Wind Data</h4>
                                                            <ul>
                                                                <li class='wind_speed'><span>Wind Speed:</span>{{ $forecasts[$counter]->currently->windSpeed }}</li>
                                                                <li class='wind_gust'><span>Wind Gust:</span>{{ $forecasts[$counter]->currently->windGust }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-4 wind_bearing">
                                                            <h4>Wind Bearing</h4>
                                                            <div class='bearing_container'>
                                                                <img class='compass' src="{{ URL::asset('/images/weather/compass.png' )}}" alt="" />
                                                                <img data-angle='{{ $forecasts[$counter]->currently->windBearing }}' class='needle' src="{{ URL::asset('/images/weather/needle.png' )}}" alt="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-md-4 cloud_cover">
                                                            <h4>Cloud Cover</h4>
                                                            <i data-cloud='{{ $forecasts[$counter]->currently->cloudCover * 100 }}' class="fas fa-cloud"></i>
                                                            <p>{{ $forecasts[$counter]->currently->cloudCover * 100 }}%</p>
                                                        </div>
                                                        <div class="col-md-4 humidity">
                                                            <h4>Humidity</h4>
                                                            <ul>
                                                                <li class='dew_point'><span>Dew Point:</span>{{ $forecasts[$counter]->currently->dewPoint }}°</li>
                                                                <li class='humidity'><span>Humidity:</span>{{ $forecasts[$counter]->currently->humidity * 100 }}%</li>
                                                                <li class='pressure'><span>Pressure:</span>{{ $forecasts[$counter]->currently->pressure }} mb</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-4 environment">
                                                            <h4>Environment</h4>
                                                            <ul>
                                                                <li class='uvindex'><span>UV Index:</span>{{ $forecasts[$counter]->currently->uvIndex }}</li>
                                                                <li class='visibility'><span>Visibility:</span>{{ $forecasts[$counter]->currently->visibility }} Miles</li>
                                                                <li class='ozone'><span>Ozone:</span>{{ $forecasts[$counter]->currently->ozone }} du</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $counter++;
                            ?>
                        @endforeach
                    </div>
                    <div class="row">
                        <?php //var_dump($forecasts[0]); ?>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
