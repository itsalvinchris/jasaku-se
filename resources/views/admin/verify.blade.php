@extends('layouts.admin')

@section('home-active-dropdown')
active
@endsection

@section('verify-active')
active-color
@endsection

{{-- @section('subtitle')
Edit Home Page
@endsection --}}

@section('css')
@parent
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/jquery.dataTables.css')}}">
@endsection

@section('js')
@parent
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        $(".btn-verify").click( (event) => {
            const id = event.currentTarget.id;
            const currIndex = id.indexOf("#");
            const index = id.substr(currIndex + 1,id.length - currIndex - 1);
            $("#payment-order-id").html($("#book_id"+index).text());

            $("#payment-date").html($("#date"+index).text());
            $("#payment-bank").html($("#bank"+index).text());
            $("#payment-receipt-number").html($("#receipt_number"+index).text());
            $("#payment-receipt-price").html($("#price"+index).text());

            $("#payment-image").attr('src','{{ url('storage')}}'+'/'+$("#payment-image"+index).val());
            
            $("#payment-verify").attr('action',"{{url('admin/verify')}}/"+$("#book_id"+index).text());
        });
    });
</script>
@endsection

@section('content')
<div class="employee">
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif
    {{-- <button data-toggle="modal" href='#modal-id'>@lang('content.Tambah')</button> --}}
    <div class="second-col">
        <p>@lang('sidebar.Verifikasi Pembayaran')</p>
        <table class="table table-responsive text-center" id="product_table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Receipt Number</th>
                    <th>@lang('input.Harga')</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $key => $payment)
                    <tr>
                        <td>{{++$key}}</td>
                        <td id="book_id{{$payment->id}}">{{$payment->book_id}}</td>
                        <td id="bank{{$payment->id}}">{{$payment->payment_bank}}</td>
                        <td id="date{{$payment->id}}">{{$payment->payment_date}}</td>
                        <td id="receipt_number{{$payment->id}}">{{$payment->payment_receipt_number}}</td>
                        {{-- {{-- <td id="price{{$payment->id}}"> --}}
                        <td id="price{{$payment->id}}">
                        @php
                            foreach($history as $key => $his){
                                if($his->book_id == $payment->book_id){
                                    $split = explode("-",$his->hour);
                                    $split_jam_before = explode(".",$split[0]);
                                    $split_jam_after = explode(".",$split[1]);
                                    $jam = $split_jam_after[0] - $split_jam_before[0];
                                    $total_price = $jam * App\Product::where('id',$his->product_id)->first()->price;
                                    if($his->status == "Paid"){
                                        $status = "Verified";
                                    } elseif($his->status == "On Payment Review") {
                                        $status = "Not Verified";
                                    }
                                    break;
                                }
                            }
                            // dd($total_price);
                        @endphp
                        {{$total_price}}
                        </td>
                        <input type="hidden" id="payment-image{{$payment->id}}" value="{{$payment->payment_receipt_image}}">  
                        <td>
                            @if($status == "Verified")
                                <button class="btn btn-success">Paid</button>
                            @elseif($status == "Not Verified") 
                                <button id="btn-buy#{{$payment->id}}" data-toggle="modal" href='#modal-verify' style="width: 140px" class="btn btn-primary btn-edit btn-verify">Show Image and Verify</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

	<div class="modal fade" id="modal-verify">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title">Verify Payment</h2>
                </div>
                <div class="modal-body">
                    <h4 for="description">Order ID</h4>
                    <h5 id="payment-order-id">a</h5>
                    <h4 for="description">Date</h4>
                    <h5 id="payment-date">a</h5>
                    <h4 for="description">Bank</h4>
                    <h5 id="payment-bank">a</h5>
                    <h4 for="description">Receipt Number</h4>
                    <h5 id="payment-receipt-number">a</h5>
                    <h4 for="description">Price</h4>
                    <h5 id="payment-receipt-price">a</h5>
                    <h4 for="description">Image</h4>
                    <img id="payment-image" class="img-responsive" src="">
                </div>
				<form id="payment-verify" action="" method="POST">
					@csrf
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Verify</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    
</div>
@endsection