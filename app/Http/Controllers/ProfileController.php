<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'country' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        // Upload foto
        if ($request->hasFile('profile_photo')) {
            $filename = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('profile_photos'), $filename);
            $user->profile_photo = $filename;
        }

        // Update data lain
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->country = $request->country;

        // Nama yang muncul di sidebar
        $user->name = $request->first_name . ' ' . $request->last_name;

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
