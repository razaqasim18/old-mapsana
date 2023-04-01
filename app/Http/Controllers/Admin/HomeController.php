<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
        ]);

        $name = $request->name;
        $fileName = null;
        if (!empty($request->file('image'))) {
            $fileName = time() . '.' . $request->file('image')->extension();
            $request
                ->file('image')
                ->move(public_path('uploads/admin'), $fileName);
        } else {
            $fileName = $request->showimage;
        }
        $user = Auth::guard('admin')->user();
        $user->name = $name;
        if ($fileName) {
            $user->image = $fileName;
        } else {
            $user->image = null;
        }
        if ($user->save()) {
            return redirect()
                ->route('admin.profile')
                ->with('success', 'Profile is saved successfully');
        } else {
            return redirect()
                ->route('admin.profile')
                ->with('error', 'Something went wrong');
        }

    }

    public function password()
    {
        return view('admin.password');
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'password' =>
            'required|min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5',
        ]);

        $password = $request->password;
        $user = Auth::guard('admin')->user();
        $user->password = bcrypt($password);
        if ($user->save()) {
            return redirect()
                ->route('admin.passwords')
                ->with('success', 'Password is saved successfully');
        } else {
            return redirect()
                ->route('admin.passwords')
                ->with('error', 'Something went wrong');
        }

    }
}
