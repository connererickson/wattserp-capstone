@extends('layouts.inventory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Print Inventory</div>

                <div class="panel-body" id='inventory_index'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row">
						<div class="col-md-12">
							<table class='table' id='print_inventory_table'>
								<thead>
									<th>SKU</th>
									<th>Part #</th>
									<th>Stocking Unit</th>
									<th>Units On Hand</th>
								
									
								</thead>
								<tbody>
									@foreach($repository as $part)
									<tr>
										<td>{{ $part->sku }}</td>
										<td>{{ $part->part_no }}</td>
										<td>{{ $part->stock_unit }}</td>
										<td>{{ $part->stock }}</td>
										
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

