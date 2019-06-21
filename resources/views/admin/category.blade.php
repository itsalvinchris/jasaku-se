@extends('layouts.admin')

@section('home-active-dropdown')
active
@endsection

@section('product-active')
active-color
@endsection

{{-- @section('subtitle')
Edit Home Page
@endsection --}}

@section('css')
@parent
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/jquery.dataTables.css')}}">
<link rel="stylesheet" href="{{ asset('css/admin/customdashboard.css')}}">
@endsection

@section('js')
@parent
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#product_table').DataTable();

        $('.btn-delete').click(function(){
            const id = this.id;
            const currIndex = id.indexOf("#");
            const index = id.substr(currIndex + 1,id.length - currIndex - 1);
            $('#product-delete').attr('action',"{{url('admin/product')}}/"+index);
	    });

        $(".btn-edit").click( (event) => {
            const id = event.currentTarget.id;
            const currIndex = id.indexOf("#");
            const index = id.substr(currIndex + 1,id.length - currIndex - 1);
            $("#edit-modal-title").text("Edit Produk");
            $("#edit-name").val($("#name"+index).text());
            $("#edit-description").val($("#description"+index).text());
            $("#edit-price").val($("#price"+index).text());
            $("#edit-person").val($("#person"+index).text());
            $(".file-name").html($("#filename"+index).val());
            $('#edit-pay-img').attr('src', "{{url('storage/product_images/')}}/"+$("#filename"+index).val());

            $("#product-edit").attr('action',"{{url('admin/product')}}/"+index);
        });

        $(".btn-show").click( (event) => {
            const id = event.currentTarget.id;
            const currIndex = id.indexOf("#");
            const index = id.substr(currIndex + 1,id.length - currIndex - 1);
            $('#image-show').attr('src', "{{url('storage/product_images/')}}/"+$("#filename"+index).val());
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pay-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#edit-images").change(function(){
            readURL(this);
        });

        $("#images").change(function(){
            readURL(this);
        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $("#modal-id").on("hidden.bs.modal", function () {
            $('#pay-img').attr('src', "./images/img-placeholder.png");
            // put your default event here
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
    <button data-toggle="modal" href='#modal-id'>@lang('content.Tambah')</button>
    <div class="second-col">
        <p>@lang('content.Produk')</p>
        <table class="table table-responsive text-center" id="product_table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>@lang('input.Nama')</th>
                    <th>@lang('input.Deskripsi')</th>
                    <th>@lang('input.Harga')</th>
                    <th>Nama Orang</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                    @php
                        $images = explode("/",$product->images);
                        $image = $images[1];
                    @endphp
                    <tr>
                        <td>{{++$key}}</td>
                        <td id="name{{$product->id}}">{{$product->name}}</td>
                        <td id="description{{$product->id}}">{{$product->description}}</td>
                        <td id="price{{$product->id}}">{{$product->price}}</td>
                        <td id="person{{$product->id}}">{{$product->person_name}}</td>  
                        <td>
                            <input type="hidden" id="filename{{$product->id}}" value="{{$image}}">
                            <button id="btn-show#{{$product->id}}" data-toggle="modal" href='#modal-show' class="btn btn-primary btn-show" style="width: 85px;">Show Image</button>
                            <button id="btn-edit#{{$product->id}}" data-toggle="modal" href='#modal-current' class="btn btn-primary btn-edit">@lang('content.Edit')</button>
                            <button id="btn-delete#{{$product->id}}" data-toggle="modal" href='#modal-delete' class="btn btn-danger btn-delete">@lang('content.Hapus')</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">@lang('content.Tambah Produk')</h4>
                </div>
                <form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="body-content">
    
                            <label for="description">@lang('input.Nama')</label>
                            <textarea required rows="3" id="description" name="product_name"></textarea>

                            <label for="description">@lang('input.Deskripsi')</label>
                            <textarea required rows="3" id="description" name="product_description"></textarea>

                            <label for="description">@lang('input.Harga')</label>
                            <textarea required rows="3" id="description" name="product_price"></textarea>
                            
                            <label for="description">Nama Orang</label>
                            <textarea required rows="3" id="description" name="person_name"></textarea>

                            <label for="course_image">Image</label>
                            <div class="custom-file mb-3" style="margin-bottom: 30px; margin-top: -20px;">
                                <input type="file" class="custom-file-input" id="images" name="images">
                                <label class="custom-file-label text-left" for="customFile" id="file-name">Choose File</label>
                            </div>
                            
                            <img src="{{url('/images/img-placeholder.png')}}" id="pay-img" class="payment-image img-responsive" alt="...">
                        
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">@lang('content.Tambah')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-current">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id="edit-modal-title" class="modal-title">@lang('content.Edit') @lang('content.Produk')</h4>
                </div>
                <form id="product-edit" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-body">
                        <div class="body-content">
                            <label for="description">@lang('input.Nama')</label>
                            <textarea required rows="3" id="edit-name" name="product_name"></textarea>
    
                            <label for="description">@lang('input.Deskripsi')</label>
                            <textarea required rows="3" id="edit-description" name="product_description"></textarea>

                            <label for="description">@lang('input.Harga')</label>
                            <textarea required rows="3" id="edit-price" name="product_price"></textarea>

                            <label for="description">Nama Orang</label>
                            <textarea required rows="3" id="edit-person" name="person_name"></textarea>

                            <label for="course_image">Image</label>
                            <div class="custom-file mb-3" style="margin-bottom: 30px; margin-top: -20px;">
                                <input type="file" class="custom-file-input" id="edit-images" name="images">
                                <label class="custom-file-label text-left file-name" for="customFile" id="file-name">Choose File</label>
                            </div>
                            
                            <img src="{{url('/images/img-placeholder.png')}}" id="edit-pay-img" class="payment-image img-responsive" alt="...">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">@lang('content.Simpan')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

	<div class="modal fade" id="modal-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">@lang('content.Anda Yakin Ingin Menghapus ini ?')</h4>
				</div>
				<form id="product-delete" action="" method="POST">
					@csrf
					<div class="modal-footer">
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-danger">@lang('content.Hapus')</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    
</div>

@endsection