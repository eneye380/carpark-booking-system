@extends('admin-layout.master') @section('title') {{$price->day}} Pricing @endsection @section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="/admin-view">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">{{$price->day}} Pricing</li>
</ol>
<div class="row">
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-primary">
			<div class="card-body">
				<div class="card-text">{{$price->day}}</div>
            </div>
            <div class="card-footer">
                    <small class="card-text">Day</small>
                </div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-success">
			<div class="card-body">
				<div class="card-text">{{$price->start_time}} - {{$price->end_time}}</div>
            </div>
            <div class="card-footer">
                    <small class="card-text">Start - End Time</small>
                </div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white bg-dark">
			<div class="card-body">
				<div class="card-text"> {{$price->pricePerUnit}}</div>
            </div>
            <div class="card-footer">
                <small class="card-text">Price Per Unit</small>
            </div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark">
                    <div class="card-body">
                        <div class="card-text"> {{$price->minutesPerUnit}} | {{$price->minutesMinimumStay}}</div>
                    </div>
                    <div class="card-footer">
                        <small class="card-text">Minutes Per Unit | Minutes Minimum Stay</small>
                    </div>
                </div>
	</div>
</div>
@endsection @section('scripts') @endsection