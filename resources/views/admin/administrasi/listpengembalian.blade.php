@extends("admin.layouts.app")

@section("content")
<div class="container">
    <h2>List Pengembalian Mobil</h2>
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table class="table table-bordered" id="pengembalianTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Plat Nomer</th>
                <th>Mobil</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->unit->plat_nomer }}</td>
                <td>{{ $booking->car->name }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('d-m-Y') }}</td>
                <td><small class="badge badge-warning">{{ $booking->status }}</small></td>
                <td>
                    <form action="{{ route('booking.confirmReturn', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi pengembalian mobil ini?')">
                            <i class="fa fa-check"></i> Konfirmasi
                        </button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#pengembalianTable').DataTable();
    });
</script>
@endsection

@endsection
