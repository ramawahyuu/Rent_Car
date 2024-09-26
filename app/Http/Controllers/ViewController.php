<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Unit;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function welcome()
    {
        return view('pages.home', ["cars" => Cars::inRandomOrder()->limit(3)->get(),]);
    }

    public function dashboard()
    {
        $users = User::all();
        $units = Unit::all();
        $new_order = Booking::where('status', 'Pending')->count();
        $pendapatan = Booking::sum('total_price');
        $booking = Booking::where('status', '<>', 'Selesai')->get();

        return view(
            'admin.dashboard',
            [
                'users' => $users,
                'pendapatan' => $pendapatan,
                'units' => $units,
                'booking' => $booking,
                'new_order' => $new_order
            ]
        );
    }

    public function order(Cars $car_id)
    {
        return view('pages.order', ['car' => $car_id]);
    }

    public function cars(Request $request)
    {
        if ($request->search) {
            $cars = Cars::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $cars = Cars::all();
        }

        return view('pages.cars', [
            'cars' => $cars
        ]);
    }

    public function pesanan()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->latest('created_at')->get();
        return view('pages.pesanan', ['bookings' => $bookings]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function pengembalian()
    {
        // This method returns the view for returning a car
        return view('pages.pengembalian'); // Adjust the view name if needed
    }

    public function returnCar(Request $request)
    {
        // Validate the input
        $request->validate([
            'plat_nomer' => 'required|exists:units,plat_nomer',
        ]);
    
        // Find the booking based on the car's plat_nomer and the user's active bookings
        $booking = Booking::whereHas('unit', function ($query) use ($request) {
            $query->where('plat_nomer', $request->plat_nomer);
        })
        ->where('user_id', auth()->id())
        ->where('status', 'Disewa')
        ->first();
    
        if (!$booking) {
            return redirect()->back()->withErrors(['plat_nomer' => 'Mobil tidak ditemukan atau sudah dikembalikan.']);
        }
    
        // Update the booking status to 'Returned'
        $booking->update([
            'status' => 'Returned',
            'end_date' => now(), // Set the return date
        ]);
    
        return redirect()->back()->with('status', 'Mobil berhasil dikembalikan, menunggu konfirmasi admin.');
    }
    
    public function history()
    {
        $completedBookings = Booking::where('user_id', auth()->id())
                                    ->where('status', 'Selesai')
                                    ->get();
    
        return view('pages.history', compact('completedBookings'));
    }

}
