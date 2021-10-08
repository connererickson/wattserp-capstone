@extends('layouts.employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Channel Partners</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif	
                    <div class="row">
	                	<div class="col-md-9">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'channel_partners'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('channel_partners') }}">Channel Partners</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					@if (Auth::user()->hasPermission('view_channel_partners_admin'))
	                					<th>ID</th>
	                					@endif
	                					<th>Channel Partner Name</th>
	                					<th>Channel Partner Phone</th>
	                					<th>Channel Partner Website</th>
	                					@if (Auth::user()->hasPermission('view_channel_partners_admin'))
	                					<th>Created At</th>
	                					<th>Update At</th>
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<?php $curr_email = ""; ?>
	                				@if ($channel_partners)
	                					@foreach($channel_partners as $channel_partner)
	                						@foreach($users as $user)
	                							@if ($channel_partner->user_id == $user->id)
	                								<?php $curr_email = $user->email; ?>
	                							@endif
	                						@endforeach
	                						<tr>
	                							@if (Auth::user()->hasPermission('view_channel_partners_admin'))
	                							<td> {{ $channel_partner->id }} </td>
	                							@endif
	                							<td>
	                								<a href="{{ route('channel_partners.member', $channel_partner->id) }}"> 
	                									{{ $channel_partner->cp_company_name }}
	                								</a>
	                							</td>
	                							<td>
	                								<a href="{{ route('channel_partners.member', $channel_partner->id) }}">
	                									{{ $channel_partner->cp_main_phone }}
	                								</a>
	                							</td>
	                							<td>
	                								<a href='tel:{{ $channel_partner->phone }}'>
	                									<span class='phone'> {{ $channel_partner->cp_website }} </span>
	                								</a>
	                							</td>
	                							@if (Auth::user()->hasPermission('view_channel_partners_admin'))
	                							<td>{{ $channel_partner->created_at->diffForHumans() }}</td>
	                							<td>{{ $channel_partner->updated_at->diffForHumans() }}</td>
	                							@endif
	                						</tr>
	                					@endforeach
	                				@endif
	                				{{ $channel_partners->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$channel_partners->count())
        						<div style='padding-left: 5px;'>No Results to Display</div>
        					@endif
	                		<hr />
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
