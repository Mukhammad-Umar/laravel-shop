	@extends('shop.layout')

	@section('main')

	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				
				@php
					// print_r($carts);
				@endphp

				<h3>Chec<span>kout</span></h3>

				<div class="checkout-right">
					<h4>Your shopping cart contains: <span>3 Products</span></h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody class="cart_items_list">
							@include('shop.cart-standard')
						</tbody>
					</table>
				</div>
					<button type="button" class="btn btn-danger btn-lg btn_delete_all">Clear</button>
					<form name="form_clearall" method="post" action="{{route('clearall')}}" style="display:none;">
							{{ csrf_field() }}
					</form>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<h4>Continue to basket</h4>
						<ul>
							@foreach($carts as $cart)
								<li>{{$cart->name}} <i>-</i> <span>${{$cart->price}} </span></li>
							@endforeach
								<li>Total Service Charges <i>-</i> <span>$55.00</span></li>
								<li>Total <i>-</i> <span>$1405.00</span></li>
						</ul>
					</div>
					<div class="col-md-8 address_form">
						<h4>Add a new Details</h4>
						<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Full name: </label>
											<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
										</div>
										<div class="card_number_grids">
											<div class="card_number_grid_left">
												<div class="controls">
													<label class="control-label">Mobile number:</label>
													<input class="form-control" type="text" placeholder="Mobile number">
												</div>
											</div>
											<div class="card_number_grid_right">
												<div class="controls">
													<label class="control-label">Landmark: </label>
													<input class="form-control" type="text" placeholder="Landmark">
												</div>
											</div>
											<div class="clear"> </div>
										</div>
										<div class="controls">
											<label class="control-label">Town/City: </label>
											<input class="form-control" type="text" placeholder="Town/City">
										</div>
										<div class="controls">
											<label class="control-label">Address type: </label>
											<select class="form-control option-w3ls">
												<option>Office</option>
												<option>Home</option>
												<option>Commercial</option>
											</select>
										</div>
									</div>
									<button class="submit check_out">Delivery to this Address</button>
								</div>
							</section>
						</form>
						<div class="checkout-right-basket">
							<a href="{{ route('payment')}}">Make a Payment </a>
						</div>
					</div>
 
					<div class="clearfix"> </div>


					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- //top products -->

@endsection

@section('js')

	<script>
    $(document).ready(function () {
		$('.btn_delete_all').click(function (){
			// form_clearall.submit();
			BaseRecord.removeall();
		});
		$('.listbuttonremove').click(function(){
			BaseRecord.removeone($(this).attr('id'));
		});
	});
	</script>

@endsection