<!-- Modal effects -->
<div class="modal  fade" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form action="{{ route('detail_penjualan.store') }}" method="POST">
                @csrf
            <div class="modal-header">
                <h6 class="modal-title">Form Edit Detail Penjualan</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mg-b-20">Isi Semua Form yang ada dibawah ini.</p>
                <br>
                <div class="pd-30 pd-sm-40 bg-gray-100">
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-3">
                            <label class="form-label mg-b-0">Nama Pelanggan<b style="color:red">*</b></label>
                        </div>
                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                            <select name="pelanggan_id" id="" class="form-control">
                                <option value="" selected disable>== Pilih ==</option>
                                @foreach ($pelanggan as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->nama_pelanggan }} </option>
                                @endforeach
                           </select>
                        </div>
                    </div>  
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-3">
                            <label class="form-label mg-b-0">Produk </label>
                        </div>
                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                            <select onchange="sum();" id="produk_id" name="produk_id"
                                class="form-control select2" >
                                <option value="{{ $dt->id }}" disabled selected>== Pilih ==</option>
                                @foreach ($produk as $dt)
                                    <option value="{{ $dt->id }}"
                                        data-harga="{{ $dt->harga }}">
                                        {{ $dt->nama_produk }} | {{ $dt->harga}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-3">
                            <label class="form-label mg-b-0">Jumlah Produk<b style="color:red">*</b> </label>
                        </div>
                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                            <input class="form-control" id="jumlah_produk" placeholder="Enter your Jumlah produk" onkeyup="sum();" name="jumlah_produk" type="number">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-3">
                            <label class="form-label mg-b-0">Subtotal<b style="color:red">*</b> </label>
                        </div>
                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                            <input class="form-control" id="subtotal" placeholder="Enter your Subtotal" onkeyup="sum();" name="subtotal" type="number" readonly>
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