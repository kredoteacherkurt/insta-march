<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return view('users.profile.show')->with('user', $user);
    }

    public function edit($id)
    {
        if (Auth::id() != $id) {
            return redirect()->route('index');
        }

        $user = $this->user->findOrFail($id);

        return view('users.profile.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {

        $user = $this->user->findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduction = $request->introduction;
        if ($request->avatar) {
            $user->avatar  = 'data:image/' . $request->avatar->extension() . ';base64,' .
                base64_encode(file_get_contents($request->avatar));
        }
        $user->save();

        return redirect()->route('profile.show', $id);
    }
    public function followers($id)
    {
        $user = $this->user->findOrFail($id);

        return view('users.profile.follower')->with('user', $user);
    }

    public function following($id)
    {
        $user = $this->user->findOrFail($id);

        return view('users.profile.following')->with('user', $user);
    }
}
