@extends('template_back.layout')

@section('content')
   <!-- breadcrumb -->
   <div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">FORM EDIT detail pelanggan</h4>
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
									Form Input Edit detail pelanggan
								</div>
								<p class="mg-b-20">Harap untuk mengisi semua input.</p>
								@include('_component.pesan')
								<div class="pd-30 pd-sm-40 bg-gray-100">
                                <form action="{{ route('detail pelanggan.update', $detail pelanggan->id) }}" method="post">
                                    @csrf @method('PUT')
									<div class="row row-xs align-items-top mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Foto </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="img" type="file">
                                            <small><p class="text-muted">* File Extention .png/.jpg/.jpeg  | size image Max 2MB : (1125px x 792px) &nbsp;</p></small>
                                        </div>
                                    </div>    
                          
									<div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Nama detail pelanggan </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your Nama detail pelanggan" name="nama_detail pelanggan" type="text">
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
									<button class="btn btn-primary pd-x-30 mg-e-5 mg-t-5" type="submit">Simpan</button>
									<a href="{{ route('detail pelanggan.index') }}" class="btn btn-dark pd-x-30 mg-t-5"> << BACK </a>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

@endsection@extends('template_back.layout')

@section('content')
   <!-- breadcrumb -->
   <div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">FORM EDIT detail pelanggan</h4>
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
									Form Input Edit detail pelanggan
								</div>
								<p class="mg-b-20">Harap untuk mengisi semua input.</p>
								@include('_component.pesan')
								<div class="pd-30 pd-sm-40 bg-gray-100">
                                <form action="{{ route('detail pelanggan.update', $detail pelanggan->id) }}" method="post">
                                    @csrf @method('PUT')
									<div class="row row-xs align-items-top mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Foto </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="img" type="file">
                                            <small><p class="text-muted">* File Extention .png/.jpg/.jpeg  | size image Max 2MB : (1125px x 792px) &nbsp;</p></small>
                                        </div>
                                    </div>    
                          
									<div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Nama detail pelanggan </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
											<input class="form-control" placeholder="Enter your Nama detail pelanggan" name="nama_detail pelanggan" type="text">
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
									<button class="btn btn-primary pd-x-30 mg-e-5 mg-t-5" type="submit">Simpan</button>
									<a href="{{ route('detail pelanggan.index') }}" class="btn btn-dark pd-x-30 mg-t-5"> << BACK </a>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

@endsection