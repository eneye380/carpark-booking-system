@extends('admin-layout.master') @section('title') Parking Lots @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Parking Lots</li>
</ol>
<!-- Icon Cards-->
<div class="row">
	<div class="col-xl-3 col-sm-6 mb-3">
		<a href="/admin/parkinglots/create" class="btn btn-lg btn-warning btn-block">Add Parking Lot</a>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<a href="/admin/pricings" class="btn btn-lg btn-dark btn-block text-white">Pricing Schedules</a>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<a href="/admin/bookings" class="btn btn-lg btn-danger btn-block">Bookings</a>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<!--a class="btn btn-lg btn-primary btn-block">Value</a-->
	</div>
</div>
@if(session('success'))
					<div class="alert alert-success">
						{{session('success')}}
					</div>
					@endif
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Capacity</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<!--th></th-->
			</tr>
		</thead>
		<tbody>
			@forelse($parkingLots as $parking)
			<tr>
				<td>{{$parking->name}}</td>
				<td>{{$parking->address}}</td>
				<td>{{$parking->capacity}}</td>
				<td>{{$parking->created_at->diffForHumans()}}.</td>
				<td>
					<a href="/admin/parkinglots/{{$parking->id}}" class="btn btn-sm btn-secondary">View</a>
				</td>
				<td>
					<a href="/admin/parkinglots/{{$parking->id}}/edit" class="">Edit</a>
				</td>
				<td>
					<form action="/admin/parkinglots/{{$parking->id}}" method="POST">
						{{method_field('DELETE')}} {{ csrf_field() }}
						<input type="submit" class="btn btn-sm btn-danger" value="Remove">
					</form>
				</td>
				<!--td>
					<a href="/admin/parkinglots/manage/{{$parking->id}}" class="btn btn-sm btn-primary">Manage</a>
				</td-->
			</tr>
			@empty
			<tr>
				<td colspan="8">No Parking Lots.</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>


@endsection @section('scripts') @endsection