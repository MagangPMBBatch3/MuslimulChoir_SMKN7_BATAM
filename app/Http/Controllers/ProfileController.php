<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bagian\Bagians;
use App\Models\Level\Level;
use App\Models\Status\Statuses;
use App\Models\UserProfile\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bagians = Bagians::all();
        $level = Level::all();
        $statuses = Statuses::all();


        return view('profile.index', compact( 'user', 'bagians', 'levels', 'statuses'));
    }

 
public function updateProfile(Request $request)
{
    $request->validate([
        'nrp' => 'required|string',
        'alamat' => 'required|string',
        'bagian_id' => 'required|exists:bagian,id',
        'level_id' => 'required|exists:levels,id',
        'status_id' => 'required|exists:statuses,id',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:4048'
    ]);

    $user = Auth::user();
    $userProfile = $user->userProfile ?? new UserProfile();
    
    if ($request->hasFile('foto')) {
        // Delete old photo if exists
        if ($userProfile->foto && Storage::disk('public')->exists('img/' . $userProfile->foto)) {
    Storage::disk('public')->delete('img/' . $userProfile->foto);
}


        // Simpan file ke storage/app/public/img
        $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(storage_path('app/public/img'), $fileName);

        // Simpan ke database
        $userProfile->foto = $fileName;
    }

    $userProfile->user_id = $user->id;
    $userProfile->nrp = $request->nrp;
    $userProfile->alamat = $request->alamat;
    $userProfile->bagian_id = $request->bagian_id;
    $userProfile->level_id = $request->level_id;
    $userProfile->status_id = $request->status_id;
    
    $userProfile->save();

    return back()->with('success', 'Profile updated successfully');
}

public function store(Request $request)
    {
        if (!$request->hasFile('foto')) {
            return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
        }

        $file = $request->file('foto');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('image'), $filename);

        return response()->json([
            'success' => true,
            'path' => 'image/' . $filename,
            'url' => asset('image/' . $filename) 
        ]);
    }

    public function show($id)
{
    $user = User::with('userProfile.bagian', 'userProfile.level', 'userProfile.status')
                ->findOrFail($id);

    $bagians = Bagians::all();
    $levels = Level::all();
    $statuses = Statuses::all();

    return view('profile.index', compact('user', 'bagians', 'levels', 'statuses'));
}

}