@extends('template_back.layout')

@section('content')
   <!-- breadcrumb -->
   <div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">Data Produk</h4>
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
									<--ROUTE CREATE PRODUK-->
									<a href="{{ route('produk.create') }}" class="btn btn-primary">TAMBAH DATA</a>
									<a href="{{ route('export_excel_produk') }}" class="btn btn-success">EXPORT EXCEL</a>
									<a href="{{ route('export_pdf_produk') }}" class="btn btn-danger">EXPORT PDF</a>
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
												<th>Nama Porduk</th>
												<th>Harga</th>
												<th>Stok</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach ($produk as $dt)
											<tr>
												<th scope="row">{{$loop->iteration}}</th>
												<td>{{ $dt->foto }}</td>
												<td>{{ $dt->nama_produk }}</td>
												<td>{{ $dt->harga }}</td>
												<td>{{ $dt->stok }}</td>
												
												
												<td>

													<a href="{{ route('produk.edit', $dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
													<form onsubmit="return confirm('Apakah anda yakin ingin hapus data ini?')" action=" {{ route('produk.destroy',$dt->id) }}" method="post" class="d-inline">
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