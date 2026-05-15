<h1>Booking Lapangan</h1>

{{-- PESAN SUCCESS & ERROR --}}
@if(session('error'))
    <p style="color:red; font-weight:bold;">
        {{ session('error') }}
    </p>
@endif

@if(session('success'))
    <p style="color:green; font-weight:bold;">
        {{ session('success') }}
    </p>
@endif

{{-- FORM BOOKING --}}
<form action="{{ route('bookings.store') }}" method="POST">
    @csrf

    {{-- PILIH LAPANGAN --}}
    <label>Pilih Lapangan</label>
    <br>
    <select name="field_id" required>
        <option value="">-- Pilih Lapangan --</option>
        @foreach($fields as $field)
            <option value="{{ $field->id }}">
                {{ $field->nama_lapangan }}
            </option>
        @endforeach
    </select>

    <br><br>

    {{-- TANGGAL --}}
    <label>Tanggal</label>
    <br>
    <input type="date" name="tanggal" required>

    <br><br>

    {{-- JAM MULAI --}}
    <label>Jam Mulai</label>
    <br>
    <input type="time" name="jam_mulai" required>

    <br><br>

    {{-- JAM SELESAI --}}
    <label>Jam Selesai</label>
    <br>
    <input type="time" name="jam_selesai" required>

    <br><br>

    {{-- BUTTON --}}
    <button type="submit">
        Booking Sekarang
    </button>
</form>