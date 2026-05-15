<h1>Tambah Lapangan</h1>

<form action="{{ route('fields.store') }}" method="POST">
    @csrf

    <input type="text" name="nama_lapangan" placeholder="Nama Lapangan">
    <br>

    <input type="number" name="harga" placeholder="Harga">
    <br>

    <button type="submit">Simpan</button>
</form>