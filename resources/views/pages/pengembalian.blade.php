@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h2 class="text-center mb-4" style="color: #000000;">Kembalikan Mobil</h2>
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('return.car') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="plat_nomer" class="form-label">Plat Nomer Mobil</label>
                    <input type="text" name="plat_nomer" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="border-radius: 20px;">Kembalikan Mobil</button>
            </form>
        </div>
    </div>
</div>
@endsection
