<h1>Edit Lapangan</h1>

<form action="{{ route('fields.update', $field->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_lapangan" value="{{ $field->nama_lapangan }}">
    <br>

    <input type="number" name="harga" value="{{ $field->harga }}">
    <br>

    <button type="submit">Update</button>
</form>