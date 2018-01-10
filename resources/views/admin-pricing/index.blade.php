@extends('admin-layout.master') @section('title') Pricing @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Pricing</li>
</ol>
<!-- Icon Cards-->
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header bg-white">
				<h3 class="card-title">Add a Price Schedule</h3>
			</div>
			<div class="card-body">
				<form action="/admin/pricings" method="POST">
					{{ csrf_field() }} @if(session('error'))
					<div class="alert alert-danger">
						{{session('error')}}
					</div>
					@endif @if(session('success'))
					<div class="alert alert-success">
						{{session('success')}}
					</div>
					@endif
					<div class="form-group">
						<label for="exampleInputName">Day of Week</label>
						<div class="input-group">
							<select onchange="myState(this)" class="form-control" id="exampleType" name="day" required>
								<option value="">Day of Week</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="exampleType">Start Time</label>
								<div class="input-group">
									<input class="form-control" min="00" max="23" value="00" id="exampleInputName" name="start_time" type="number" aria-describedby="emailHelp"
									 placeholder="Enter Start Time" required>
								</div>
							</div>
							<div class="col-md-6">
								<label for="exampleType">End Time</label>
								<div class="input-group">
									<input class="form-control" min="00" max="23" value="00" id="exampleInputName" name="end_time" type="number" aria-describedby="emailHelp"
									 placeholder="Enter End Time" required>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								<label for="exampleType">Price per Unit</label>
								<div class="input-group">
									<input class="form-control" min="00" max="23" value="00" id="exampleInputName" name="pricePerUnit" type="number" aria-describedby="emailHelp"
									 placeholder="Enter Start Time" required>
								</div>
							</div>
							<div class="col-md-4">
								<label for="exampleType">Minutes per Unit</label>
								<div class="input-group">
									<input class="form-control" min="00" max="23" value="00" id="exampleInputName" name="minutesPerUnit" type="number" aria-describedby="emailHelp"
									 placeholder="Enter End Time" required>
								</div>
							</div>
							<div class="col-md-4">
								<label for="exampleType">Minutes Minimum Stay</label>
								<div class="input-group">
									<input class="form-control" min="00" max="23" value="00" id="exampleInputName" name="minutesMinimumStay" type="number" aria-describedby="emailHelp"
									 placeholder="Enter End Time" required>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<!--a- class="btn btn-primary btn-block" href="login.html">Register</a-->
						<input type="submit" value="Add" class="btn btn-secondary btn-block">
					</div>
				</form>

			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Day Of Week</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Price Per Unit</th>
						<th>Minutes Per Unit</th>
						<th>Minutes Minimum Stay</th>
						<th></th>
						<th></th>
						<!--th></th>
						<!th></th-->
					</tr>
				</thead>
				<tbody>
					@forelse($prices as $price)
					<tr>
						<td>{{$price->day}}</td>
						<td>{{$price->start_time}}</td>
						<td>{{$price->end_time}}</td>
						<td>{{$price->pricePerUnit}}</td>
						<td>{{$price->minutesPerUnit}}</td>
						<td>{{$price->minutesMinimumStay}}</td>
						<td>{{$price->created_at->diffForHumans()}}.</td>
						<td>
							<a href="/admin/pricings/{{$price->id}}" class="btn btn-sm btn-secondary">View</a>
						</td>
						<!--td>
							<a href="/admin/pricings/{{$price->id}}/edit" class="">Edit</a>
						</td-->
						<td>
							<form action="/admin/pricings/{{$price->id}}" method="POST">
								{{method_field('DELETE')}} {{ csrf_field() }}
								<input type="submit" class="btn btn-sm btn-danger" value="Remove">
							</form>
						</td>
						<!--td>
									<a href="/admin/parkinglots/manage/{{$price->id}}" class="btn btn-sm btn-primary">Manage</a>
								</td-->
					</tr>
					@empty
					<tr>
						<td colspan="9">No Parking Lots.</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection @section('scripts') @endsection