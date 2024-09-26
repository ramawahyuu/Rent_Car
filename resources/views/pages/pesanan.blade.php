@extends("layouts.app")

@section("content")
    <section class="container mt-3" style="max-width: 800px; margin: auto;">
        <h3 style="margin-bottom: 20px;">Pemesanan</h3>
        <hr style="border: 1px solid #e0e0e0; margin-bottom: 20px;">
        @foreach($bookings as $booking)
        
            @if($booking->status != "Selesai")
                <div class="card mb-3 mx-auto" style="max-width: 720px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                              
                                <table class="table table-borderless" style="width: 100%;">
                                    <tr>
                                        <td style="padding: 8px 0;">Nama : {{ $booking->name }}</td>
                                        <td style="padding: 8px 0;">Dengan Sopir: {{ $booking->driver == "1" ? "Ya" : "Tidak" }}</td>
                                        <td style="padding: 8px 0;"></td> <!-- Empty cell for alignment -->
                                    </tr>
                                    <tr>
                                        <td colspan="3"><hr style="border: 0.5px solid #e0e0e0; margin: 0;"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0;">HP: {{ $booking->nomer_hp }}</td>
                                        <td colspan="2" style="padding: 8px 0;">Hari Sewa: {{ $booking->days }} Hari</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><hr style="border: 0.5px solid #e0e0e0; margin: 0;"></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0;">Tanggal Booking: {{ $booking->start_date }}</td>
                                        <td style="padding: 8px 0;">Tanggal Selesai: {{ $booking->end_date }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="padding: 8px 0;">
                                            Alamat:
                                            <textarea class="form-control" rows="3" readonly>{{ $booking->alamat }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0;">Nama Mobil: {{ $booking->car->name }}</td>
                                        <td style="padding: 8px 0;">Plat Nomor: {{ $booking->unit ? $booking->unit->plat_nomer : 'N/A' }}</td>
                                    </tr>
                                </table>
                                <hr style="border: 1px solid #e0e0e0; margin: 20px 0;">
                                <small class="text-muted d-flex justify-content-between align-items-center">
                                    {{ $booking->created_at }}
                                    <td style="padding: 8px 0;">
                                        <span class="badge bg-primary" style="font-size: 1.2em; margin-left: 40%;">Rp. {{ $booking->total_price }}</span>
                                    </td>
                                    <small class="btn btn-sm {{ $booking->status == "Selesai" ? "btn-success" : "btn-warning" }}" style="border-radius: 20px; padding: 5px 10px;">
                                        {{ $booking->status }}
                                    </small>
                                    
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <form class="row" action="{{ route('booking.input') }}" method="POST" enctype="multipart/form-data">
            @csrf
        </form>
    </section>
@endsection
