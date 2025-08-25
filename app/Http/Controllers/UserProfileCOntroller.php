<?

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Models\UserProfile\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function updateFoto(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $userProfile = UserProfile::findOrFail($id);

        // simpan ke storage/app/public/users_profile
        $pathFoto = $request->file('foto')->store('users_profile', 'public');

        // update kolom foto di database
        $userProfile->update([
            'foto' => $pathFoto,
        ]);

        return response()->json([
            'message' => 'Foto berhasil diupdate!',
            'foto' => $pathFoto,
        ]);
    }
}
