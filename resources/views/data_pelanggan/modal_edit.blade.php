<!-- Modal effects -->
<div class="modal  fade" id="modaldemo8{{ $dt->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form action="{{ route('pelanggan.update', $dt->id) }}" method="POST">
                @csrf @method('PUT')
            <div class="modal-header">
                <h6 class="modal-title">Edit Data Pelanggan</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mg-b-20">Isi Semua Form yang ada dibawah ini.</p>
                <br>
                <div class="pd-30 pd-sm-40 bg-gray-100">
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Nama Pelanggan <b style="color:red">*</b> </label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" value="{{ $dt->nama_pelanggan }}" placeholder="Enter your Nama" name="nama_pelanggan" type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Alamat <b style="color:red">*</b></label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" value="{{ $dt->alamat }}" placeholder="Enter your Alamat" name="alamat" type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Nomor Telepon <b style="color:red">*</b></label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" value="{{ $dt->nomor_tlp }}" placeholder="Enter your No Telepon" name="nomor_tlp" type="number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit">Save </button>
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End Modal effects-->