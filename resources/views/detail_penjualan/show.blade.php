<table class="table border-top-0">
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
                <td style="text-align:center">{{ $dt->formatRupiah('subtotal')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>