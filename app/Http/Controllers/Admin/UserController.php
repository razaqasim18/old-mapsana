<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.list', ['user' => $user]);
    }
    public function add()
    {
        // return view('admin.category.add');
    }

    public function delete($id)
    {
        $response = User::destroy($id);
        if ($response) {
            $json = [
                'type' => 1,
                'msg' => 'Patient is deleted successfully',
            ];
        } else {
            $json = [
                'type' => 0,
                'msg' => 'Something went wrong',
            ];
        }
        return response()->json($json);
    }

    public function approve($id)
    {
        $response = User::findorFail($id)->update(['status' => '2']);
        if ($response) {
            $json = [
                'type' => 1,
                'msg' => 'Patient is approved successfully',
            ];
        } else {
            $json = [
                'type' => 0,
                'msg' => 'Something went wrong',
            ];
        }
        return response()->json($json);
    }

    public function block($id, $status)
    {
        $response = User::findorFail($id)->update(['is_blocked' => $status]);
        if ($response) {
            $msg = ($status == '1') ? "Patient is blocked successfully" : "Doctor is active successfully";
            $json = [
                'type' => 1,
                'msg' => $msg,
            ];
        } else {
            $json = [
                'type' => 0,
                'msg' => 'Something went wrong',
            ];
        }
        return response()->json($json);
    }

}
