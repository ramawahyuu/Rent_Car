@extends("admin.layouts.app")

@section("content")
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Mobil</th>
                                    <th>Unit</th>
                                    <th>Driver</th>
                                    <th>Nama</th>
                                    <th>Hari</th>
                                    <th>Alamat</th>
                                    <th>Nomer HP</th>
                                    <th>Total</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Start Date</th> 
                                     <th>End Date</th>  
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($bookings as $booking)
        @include("admin.administrasi.modalreturn")
    @endforeach

    {{-- @include("admin.administrasi.modaledit") --}}
    <script>
        $(document).ready(function () {
            $("table").DataTable({
                dom:
                    "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'<'table-responsive'tr>>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                processing: true,
                serverSide: true,
                ajax: "{{ route("booking.sewa.list") }}",
                order: [],
                columns: [
                    { data: "DT_RowIndex", sortable: false, searchable: false },
                    { data: "car_name" },
                    { data: "unit" },
                    { data: "driver" },
                    { data: "name" },
                    { data: "days" },
                    { data: "alamat" },
                    { data: "nomer_hp" },
                    { data: "total_price" },
                    { data: "bukti_image", sortable: false, searchable: false },
                    { data: "status" },
                    { data: "start_date" },  
                    { data: "end_date" },   
                    { data: "action", sortable: false, searchable: false },
                    
                ],
            });
        });
    </script>
@endsection
