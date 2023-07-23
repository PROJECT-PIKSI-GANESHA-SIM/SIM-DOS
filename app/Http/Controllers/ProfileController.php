<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {

        $user = User::findOrFail(Auth::id());
        $roles = $user->getRoleNames();

        if ($roles[0] == 'dosen') {
            return view('profile.index', compact('user'));
        } elseif ($roles[0] == 'akademik') {
            return view('akademik.profile.index', compact('user'));
        } else {
            return view('profile.index');
        }

    }

    public function update(Request $request, $id) {
        // Validate Form
        
        $this->validate($request, [
            'nidn' => 'required|min:5',
            'email' => 'email|unique:users,email',
            'name' => 'required|min:5',
            'no_telpn' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->nidn = $request->nidn;
        $user->email = $request->email;
        $user->no_telpn = $request->no_telpn;

        // Check image is uploaded
        // if($request->hasFile('profile_image')) {
        //     // Upload New Image

        //     $image = $request->file('profile_image');
        //     $image->storeAs('public/dosen/profile/', $image->hashName());

        //     // Delete Old Image
        //     Storage::delete(['public/dosen/profile/'.$user->profile]);

        //     // Update Profile with image
        //     $user->update([
        //         'nidn' => $request->nidn,
        //         'email' => $request->email,
        //         'name' => $request->name,
        //         'no_telpn' => $request->no_telpn,
        //         'profile_image' => $image->hashName()
        //     ]);
        // } else {
        //     // Update User without image
        //     $user->update([
        //         'nidn' => $request->nidn,
        //         'email' => $request->email,
        //         'name' => $request->name,
        //         'no_telpn' => $request->no_telpn,
        //     ]);
        // }
        if (request()->hasFile('image')) {
            if($user->image && file_exists(storage_path('public/dosen/profile/' . $user->image))){
                Storage::delete('public/dosen/profile/'.$user->image);
            }
    
            $file = $request->file('image');
            $fileName = $file->hashName();
            $request->image->move(storage_path('app/public/dosen/profile'), $fileName);
            $user->image = $fileName;
        }
        

        $user->save();
        // Redirect to profile page
        return redirect()->route('profile')->with(['success' => 'Data success updated']);
    }
}
