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
    // Profil milik user login
    public function index()
    {
$user = User::with(['userProfile.bagian', 'userProfile.level', 'userProfile.status'])
            ->findOrFail(Auth::id());
        $bagians  = Bagians::all();
        $levels   = Level::all();
        $statuses = Statuses::all();

        return view('profile.index', compact('user', 'bagians', 'levels', 'statuses'));
    }

    // Tampilkan profil user lain
    public function show($id)
    {
        $user = User::with(['userProfile.bagian', 'userProfile.level', 'userProfile.status'])
            ->findOrFail($id);

        $bagians  = Bagians::all();
        $levels   = Level::all();
        $statuses = Statuses::all();

        return view('profile.index', compact('user', 'bagians', 'levels', 'statuses'));
    }

    // Update profil (user sendiri atau user lain jika admin)
    public function updateProfile(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'nrp'       => 'required|string',
            'alamat'    => 'required|string',
            'bagian_id' => 'required|exists:bagian,id',   // <- perbaikan nama tabel
            'level_id'  => 'required|exists:levels,id',
            'status_id' => 'required|exists:statuses,id',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $targetUser = User::findOrFail($request->user_id);

        // Hanya boleh: pemilik profil atau admin
        $auth = Auth::user();
        $isAdmin = strtolower((string) $auth->role) === 'admin';
        if (!$isAdmin && $auth->id !== $targetUser->id) {
            abort(403, 'Unauthorized action.');
        }

        $profile = $targetUser->userProfile ?: new UserProfile(['user_id' => $targetUser->id]);

        // Handle foto
        if ($request->hasFile('foto')) {
            if ($profile->foto && Storage::disk('public')->exists('img/'.$profile->foto)) {
                Storage::disk('public')->delete('img/'.$profile->foto);
            }
            $fileName = time().'_'.uniqid().'.'.$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('img', $fileName, 'public');
            $profile->foto = $fileName;
        }

        // Update field
        $profile->nrp       = $request->nrp;
        $profile->alamat    = $request->alamat;
        $profile->bagian_id = $request->bagian_id;
        $profile->level_id  = $request->level_id;
        $profile->status_id = $request->status_id;
        $profile->save();

        return back()->with('success', 'Profile updated successfully');
    }

    // Upload via AJAX (opsional)
    public function store(Request $request)
    {
        if (!$request->hasFile('foto')) {
            return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
        }

        $file = $request->file('foto');
        $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('image', $filename, 'public');

        return response()->json([
            'success' => true,
            'path' => 'storage/image/'.$filename,
            'url'  => asset('storage/image/'.$filename),
        ]);
    }
}
