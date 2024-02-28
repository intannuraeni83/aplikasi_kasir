@extends('template_back.layout')
<title>Detail Penjualan</title>
@section('content')

<div class="main-container container-fluid">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Detail Penjualan</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a   href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Detail Penjualan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" >
                    {{-- <h1 class="card-title">Produk </h1> --}}
                    <div class="d-flex my-auto btn-list justify-content-end">            
                        <a class="modal-effect btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8"> Tambah Data </a>
                    </div>
                    @include('_component.pesan') 
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-top-0 table-bordered table-striped text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0" style="text-align:center">No</th>
                                    <th class="wd-20p border-bottom-0" style="text-align:center">Nama Pelanggan</th>
                                    <th class="wd-15p border-bottom-0" style="text-align:center">Nama Produk</th>
                                    <th class="wd-10p border-bottom-0" style="text-align:center">Jumlah Produk </th>
                                    <th class="wd-15p border-bottom-0" style="text-align:center">Subtotal</th>
                                    <th class="wd-10p border-bottom-0" style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detpenjualan as $dt)
                                    <tr>
                                        <td style="text-align:center">{{ $loop->iteration }}</td>
                                        <td style="text-align:center">{{ $dt->penjualan->pelanggan->nama_pelanggan }}</td>
                                        <td style="text-align:center">{{ $dt->produk->nama_produk }}</td>
                                        <td style="text-align:center">{{ $dt->jumlah_produk }}</td>
                                        <td style="text-align:center">{{ $dt->subtotal}}</td>
                                        <td style="text-align:center">
                                            {{-- <a href="{{ route('detail_penjualan.show', $dt->id ) }}">Lihat Detail</a> --}}
                                            <form action="{{ route('detail_penjualan.destroy', $dt->id) }}" method="post" onsubmit="return confirm('Apakah adna yakin akan mengahpus data ini')" class="d-inline">
                                                @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>

@include('detail_penjualan.modal_create')

  <script>
                $(function() {
                // formelement
                $('.select2').select2({ width: 'resolve' });
                
                // init datatable.
                $('#tbl_list').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });

            });
            </script>
<script>
    function sum() {
            var produk = document.getElementById('produk_id');
            var jumlahProduk = document.getElementById('jumlah_produk').value;

            // Mengambil opsi yang dipilih
            var selectedOption = produk.options[produk.selectedIndex];

            // Mengambil nilai data-harga dari opsi yang dipilih
            var hargaProduk = selectedOption.getAttribute('data-harga');

           var result = parseInt(hargaProduk) * parseInt(jumlahProduk);
 
           if (!isNaN(result)) {
                document.getElementById('subtotal').value=result;
           }
        }
</script>
            

@endsection