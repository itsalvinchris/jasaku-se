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
        const count = "{{sizeof($hours)}}";
        var day = [];
        var hours_open = [];
        var hours_close = [];

        <?php foreach($hours as $hour){ ?>
        day.push('<?=$hour['day']?>');
        hours_open.push('<?=$hour['open']?>');
        hours_close.push('<?=$hour['closed']?>');

        <?php } ?>
        console.log(count);
        console.log(hours_open);
        console.log(hours_close);
        console.log(day);
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

            var i;
            for(i=1;i<=7;i++){
                console.log("open ke"+i+":"+hours_open[((index-1)*7)+i-1]);
                console.log("close ke"+i+":"+hours_close[((index-1)*7)+i-1]);
                $('#jamBuka'+i+' option[value="'+hours_open[((index-1)*7)+i-1]+'"]').prop("selected", true);
                $('#jamTutup'+i+' option[value="'+hours_close[((index-1)*7)+i-1]+'"]').prop("selected", true);
            }
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
                            
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                    <div class="panel-heading">
                                            <h3 class="panel-title">Jadwal Operasional</h3>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Hari</th>
                                                    <th>Jam Buka</th>
                                                    <th>Jam Tutup</th>
                                                </tr>
                                            </thead>
                                            <form id="formHour" method="POST" action="{{ url('info')}}">
                                            @csrf
                                            <tbody>
                                                <input id="checkMethod" type="hidden">
                                                <?php $count = 1 ?>
                        
                                                    <tr>
                                                       <td>Monday</td>
                                                       <td>
                                                            <select required type="text" id="jamBuka1" name="dayIn1">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup1" name="dayOut1">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tuesday</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka2" name="dayIn2">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup2" name="dayOut2">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wednesday</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka3" name="dayIn3">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup3" name="dayOut3">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thursday</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka4" name="dayIn4">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup4" name="dayOut4">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Friday</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka5" name="dayIn5">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup5" name="dayOut5">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Saturday</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka6" name="dayIn6">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup6" name="dayOut6">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sunday</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka7" name="dayIn7">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup7" name="dayOut7">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>

    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>    
                            </div>
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
                            
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                    <div class="panel-heading">
                                            <h3 class="panel-title">Jadwal Operasional</h3>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Hari</th>
                                                    <th>Jam Buka</th>
                                                    <th>Jam Tutup</th>
                                                </tr>
                                            </thead>
                                            <form id="formHour" method="POST" action="{{ url('info')}}">
                                            @csrf
                                            <tbody>
                                                <input id="checkMethod" type="hidden">
                                                <?php $count = 1 ?>
                                                    <tr>
                                                       <td>Senin</td>
                                                       <td>
                                                            <select required type="text" id="jamBuka1" name="dayIn1">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup1" name="dayOut1">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Selasa</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka2" name="dayIn2">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup2" name="dayOut2">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rabu</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka3" name="dayIn3">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup3" name="dayOut3">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kamis</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka4" name="dayIn4">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup4" name="dayOut4">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumat</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka5" name="dayIn5">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup5" name="dayOut5">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sabtu</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka6" name="dayIn6">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup6" name="dayOut6">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minggu</td>
                                                        <td>
                                                            <select required type="text" id="jamBuka7" name="dayIn7">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select required type="text" id="jamTutup7" name="dayOut7">
                                                                @foreach($dailies as $daily)
                                                                    <option value="{{$daily}}">{{$daily}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>

    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>    
                            </div>
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

    <div class="modal fade" id="modal-show">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Image</h4>
                </div>
                {{-- <form id="product-delete" action="" method="POST"> --}}
                    {{-- @csrf --}}
                    <img id="image-show" class="img-responsive" src="{{url('storage/product_images/1557770671.png')}}" alt="" srcset="">
                    <div class="modal-footer">
                        <input type="hidden" name="_method" value="DELETE">
                        <button id="modal-close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    
</div>

@endsection