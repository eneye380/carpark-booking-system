@extends('admin-layout.master')
@section('title')
Parking Lots
@endsection
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Parking Lot</li>
</ol>
<!-- Icon Cards-->
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header bg-white">
				<h3 class="card-title">Update Parking Lot</h3>
			</div>
			<div class="card-body">
				<form action="/admin/parkinglots/{{$parking->id}}" method="POST">

					{{method_field('PUT')}}
					{{ csrf_field() }} @if(session('error'))
					<div class="alert alert-danger">
						{{session('error')}}
					</div>
					@endif @if(session('update'))
					<div class="alert alert-success">
						{{session('update')}}
					</div>
					@endif
					<div class="form-group">
						<label for="exampleInputName">Name</label>
						<div class="input-group">
							<input class="form-control" id="exampleInputName" name="name" type="text" aria-describedby="emailHelp" placeholder="Enter name" value="{{$parking->name}}" required readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputAddress">Address</label>
						<div class="input-group">
							<input class="form-control" id="exampleInputAddress" name="address" type="text" aria-describedby="emailHelp" placeholder="Enter address" value="{{$parking->address}}" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="exampleType">Capacity</label>
								<div class="input-group">
								<input class="form-control" type="number" min="1" name="capacity" value="{{$parking->capacity}}" required>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" value="{{Sentinel::check()->id}}" name="user_id">
					<input type="hidden" value="{{}}" name="property_id">
					<div class="card-footer">
						<!--a- class="btn btn-primary btn-block" href="login.html">Register</a-->
						<input type="submit" value="Update" class="btn btn-secondary btn-block">
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection
@section('scripts')

@endsection
