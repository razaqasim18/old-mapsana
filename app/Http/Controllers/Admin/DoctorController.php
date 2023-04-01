<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctor = Doctor::all();
        return view('admin.doctor.list', ['doctor' => $doctor]);
    }
    public function add()
    {
        // return view('admin.category.add');
    }
    public function delete($id)
    {
        $response = Doctor::destroy($id);
        if ($response) {
            $json = [
                'type' => 1,
                'msg' => 'Doctor is deleted successfully',
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
        $response = Doctor::findorFail($id)->update(['status' => '2']);
        if ($response) {
            $json = [
                'type' => 1,
                'msg' => 'Doctor is approved successfully',
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
        $response = Doctor::findorFail($id)->update(['is_blocked' => $status]);
        if ($response) {
            $msg = ($status == '1') ? "Doctor is blocked successfully" : "Doctor is active successfully";
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
