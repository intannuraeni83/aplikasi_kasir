@extends('template_back.layout')

@section('content')
   <!-- breadcrumb -->
   <div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">Data detail_penjualan</h4>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a   href="javascript:void(0);">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page"> Basic Tables</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- /breadcrumb -->

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex my-auto btn-list justify-content-end">
									<--ROUTE CREATE PENJUALAN-->
									<a href="{{ route('detail_penjualan.create') }}" class="btn btn-primary">TAMBAH DATA</a>
								</div>
								@include('_component.pesan')
							</div>
							<div class="card-body mt-3">
								<div class="table-responsive">
									<table class="table table-bordered table-hover table-striped mg-b-0 text-md-nowrap"> 
										<thead>
											<tr>
												<th>No</th>
												<th>Foto</th>
												<th>ID Penjualan</th>
												<th>ID Produk</th>
												<th>Jumlah Produk</th>
												<th>Subtotal</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										@foreach($detail_penjualan as $detail_penjualan)
										<tr>
											<td>{{ $detail_penjualan->penjualan_id }}</td>
											<td>{{ $detail_penjualan->produk_id }}</td>
											<td>{{ $detail_penjualan->jumlah_produk }}</td>
											<td>{{ $detail_penjualan->subtotal }}</td>
											<td>

													<a href="{{ route('detail_penjualan.edit', $dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
													<form onsubmit="return confirm('Apakah anda yakin ingin hapus data ini?')" action=" {{ route('detail_penjualan.destroy',$dt->id) }}" method="post" class="d-inline">
														@csrf @method('DELETE')
														<button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
					<!--/div-->
@endsection