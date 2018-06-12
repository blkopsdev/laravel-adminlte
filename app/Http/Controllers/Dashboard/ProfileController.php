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
       
        if ($user->update($updateValues)) {
            flash()->success('Profile updated successfully.');
        } else {
            flash()->info('Profile was not updated.');
        }

        return redirect(route('dashboard::profile'));
    }
    public function avatar_update(Request $request)
    {
        // Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
 
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
 
        return view('dashboard.profile.index', array('user' => Auth::user()) );
    }
}
