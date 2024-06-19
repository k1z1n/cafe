<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $addresses = DeliveryAddress::where('user_id', auth()->id())->get();
        if ($user->date) {
            $user->formatted_date = Carbon::parse($user->date)->format('d.m.Y');
        } else {
            $user->formatted_date = null;
        }
        $orders = $user->orders()->latest()->get();

        return view('profile', compact('user', 'orders', 'addresses'));
    }

    public function updateUser(Request $request)
    {
        $user = auth()->user();
        $userId = auth()->id();
        $data = $request->validate([
            'username' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . $userId,
            'date' => 'nullable|date',
        ]);

        $user->update($data);

        return redirect()->route('profile');
    }
}
