@extends('template_back.layout')

@section('content')
    <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">INPUT PRODUK</h4>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a   href="javascript:void(0);">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page"> Basic Tables</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- /breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Form Input Data Produk
								</div>
								<div class="pd-30 pd-sm-40 bg-gray-100">
                                <form action="{{ route('produk.store') }}" method="post">
                                    @csrf
									 
                          
									<div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Nama Produk </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your Nama Produk" name="nama_produk" type="text">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Harga </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your harga" name="harga" type="number">
										</div>
									</div>
									<div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Stok</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your stok" name="stok" type="number">
										</div>
									</div>
							
									<button class="btn btn-primary pd-x-30 mg-e-5 mg-t-5" type="submit">SIMPAN</button>
									<a href="{{ route('produk.index') }}" class="btn btn-dark pd-x-30 mg-t-5"> << BACK </a>
                                </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

@endsection