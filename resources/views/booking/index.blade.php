@extends('admin-layout.master') @section('title') Booking @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Booking</li>
</ol>
<!-- Icon Cards-->
<div class="row">
	<div class="card-body m-lg-5">
		<div class="card-header">
			My Bookings
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Lot</th>
						<th>Space</th>
						<th>License</th>
						<th>Booked</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($bookings as $booking)
					<tr>
						<td>{{$booking->parking_lot_id}}</td>
						<td>{{$booking->space_number}}</td>
						<td>{{$booking->plate_number}}</td>
						<td>{{$booking->created_at->diffForHumans()}}.</td>
						<td>
							<a href="/carowner/booking/{{$booking->id}}" class="btn btn-sm btn-dark">Ticket</a>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="5">No Parking Lots.</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection @section('scripts') @endsection