<?php

namespace App\Http\Controllers\Dashboard;

use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return Response
     */
    public function showProfile()
    {
        return view('dashboard.profile.index', array('user' => Auth::user()));
    }

    /**
     * Edit the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|confirmed|min:6',
            
        ]);
        
        $updateValues = [
            'name' => $request->input('name', $user->name),
            'email' => $request->input('email', $user->email),
        ];
        $password = $request->input('password', null);
        if (!empty($password)) {
            $updateValues['password'] = Hash::make($password);
        }
        $update_avatar = false;
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filename = '/uploads/avatars/' . $filename;
            Image::make($avatar)->resize(300, 300)->save( public_path($filename) );
            $user->avatar = $filename;
            $user->save();
            $update_avatar = true;
        }

        if ($user->update($updateValues) || $update_avatar == true ) {
            flash()->success('Profile updated successfully.');
        } else {
            flash()->info('Profile was not updated.');
        }

        return redirect(route('dashboard::profile'));
    }
}
