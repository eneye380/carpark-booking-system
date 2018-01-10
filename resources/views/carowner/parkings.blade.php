@extends('carowner-layout.master') @section('content')
@include('carowner-layout.style')
<h1>Dashboard</h1>

@if(session('error'))
<div class="alert alert-danger">
	{{session('error')}}
</div>
@endif @if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
<input type="hidden" value="{{$parking->id}}" name="parking_lot_id">
<input type="hidden" value="2" name="pricing_id">
<input type="hidden" value="{{Sentinel::check()->id}}" name="user_id">
<div class="card">
	<div class="card-body">
		<?php 
                    $count = count($spaces);
                    $i = 0;
                    ?> @forelse($spaces as $space)
		<?php $available = true; ?> @if($i%4 == 0)
		<div class="row">
			@endif
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="padding:2px">
				@forelse($booked as $booking) @if($space == $booking->space_number) @if($booking->user_id == Sentinel::check()->id)
				<!--button onclick="unbook(this)" id="{{$booking->id}}" class="btn btn-primary btn-block">Unbook {{$space}}</button-->
				<form action="/admin/bookings/{{$booking->id}}" method="POST">
					{{method_field('DELETE')}} {{ csrf_field() }}
					<input id="{{$booking->id}}" type="submit" class="btn btn-primary btn-block" value="Unbook {{$space}}">
				</form>
				@else
				<button onclick="" id="{{$space}}" class="btn btn-dark btn-block">{{$space}}</button>
				@endif
				<?php $available = false; ?> @break @endif @empty @endforelse @if($available)
				<button onclick="booking(this)" id="{{$space}}" class="btn btn-warning btn-block">{{$space}}</button>
				@endif
			</div>
			@if($i%4==3||$i==$count)
		</div>
		@endif
		<?php $i++ ?> @empty @endforelse

	</div>
</div>
@endsection @section('scripts')
<script>
	function unbook(obj){
            swal(obj.id);
        }
    
        function booking(obj){
            
            $.ajaxSetup({
                headers:{
                    'X-CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal("Enter Vehicle Plate Number To Make Booking.", {
                content: "input",
              })
              .then((value) => {
    
                var postData = {
                    'plate_number': value,
                    'pricing_id': $('input[name=pricing_id]').val(),
                    'parking_lot_id': $('input[name=parking_lot_id]').val(),
                    'user_id': $('input[name=user_id]').val(),
                    'space_number': obj.id,
                };
            
                $.ajax({
                    type:'POST',
                    url:'/carowner/parkinglots',
                    data:postData,
                    success: function(response){
                       //console.log(response.redirect);
                       if(response.redirect == "true"){
                        var space = document.getElementById(obj.id);
                        space.setAttribute('class','btn btn-primary btn-block');
                        space.setAttribute('onclick','unbook(this)');
                        space.innerHTML = "Unbook "+obj.id
                        var i = response.booking;
                        var no = obj.id;
                        space.setAttribute('id',i.id);
                           return swal("Space "+no+" booked successfully.")
                           .then(() => {
                            document.location.reload();
                         });
                       }
                       return swal(response.redirect);
                       
                    },
                    error: function(response){
                        //$('.alert-danger').text(response.responseJSON.error);
                        //$('.alert-danger').show();
                        return swal(response.responseJSON.error);
                    }
                })
              });
        }
</script>
@endsection