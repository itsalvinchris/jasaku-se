@extends('layouts.admin')

@section('home-active-dropdown')
active
@endsection

@section('contact-active')
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
        <p>Contact Us</p>
        <table class="table table-responsive text-center" id="product_table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $key => $histo)
                    <tr>
                        <td>{{++$key}}</td>
                        <td id="name{{$histo->id}}">{{$histo->name}}</td>
                        <td id="email{{$histo->id}}">{{$histo->email}}</td>
                        <td id="message{{$histo->id}}">{{$histo->message}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection