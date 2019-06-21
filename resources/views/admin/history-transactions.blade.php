@extends('layouts.admin')

@section('home-active-dropdown')
active
@endsection

@section('history-active')
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
        $('#product_table').DataTable();

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
        <p>@lang('sidebar.Sejarah Transaksi')</p>
        <table class="table table-responsive text-center" id="product_table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>@lang('input.Harga')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $key => $histo)
                    <tr>
                        <td>{{++$key}}</td>
                        <td id="book_id{{$histo->id}}">{{$histo->book_id}}</td>
                        <td id="date{{$histo->id}}">{{$histo->date}}</td>
                        <td id="time{{$histo->id}}">{{$histo->hour}}</td>
                        <td id="status{{$histo->id}}">
                        @php
                            $split = explode("-",$histo->hour);
                            $split_jam_before = explode(".",$split[0]);
                            $split_jam_after = explode(".",$split[1]);
                            $jam = $split_jam_after[0] - $split_jam_before[0];
                            $total_price = $jam * App\Product::where('id',$histo->product_id)->first()->price;
                            if($histo->status == "Paid"){
                                $status = "Verified";
                            } elseif($histo->status == "On Payment Review") {
                                $status = "Not Verified";
                            } elseif($histo->status == "Not paid") {
                                $status = "Not Yet Paid";
                            } 
                        @endphp
                        {{$status}}
                        </td>
                        {{-- {{-- <td id="price{{$histo->id}}"> --}}
                        <td id="price{{$histo->id}}">

                        {{$total_price}}
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