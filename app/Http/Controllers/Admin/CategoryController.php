<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.list', ['category' => $category]);
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'image' => 'image',
        ]);

        $category = new Category;
        $category->category = $request->category;
        if (!empty($request->file('image'))) {
            $fileName = time() . '.' . $request->file('image')->extension();
            $request
                ->file('image')
                ->move(public_path('uploads/category'), $fileName);
        } else {
            $fileName = $request->showimage;
        }
        $category->image = $fileName;
        if ($category->save()) {
            return redirect()
                ->route('admin.category.add')
                ->with('success', 'Data is saved successfully');
        } else {
            return redirect()
                ->route('admin.category.add')
                ->with('error', 'Something went wrong');
        }

    }
    public function edit($id)
    {
        $category = Category::findorFail($id);
        return view('admin.category.edit', ['category' => $category]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'image' => 'image',
        ]);

        $category = Category::findOrFail($id);
        $category->category = $request->category;
        if (!empty($request->file('image'))) {
            $fileName = time() . '.' . $request->file('image')->extension();
            $request
                ->file('image')
                ->move(public_path('uploads/category'), $fileName);
        } else {
            $fileName = $request->showimage;
        }
        $category->image = $fileName;
        if ($category->update()) {
            return redirect()
                ->route('admin.category.edit', $id)
                ->with('success', 'Data is updated successfully');
        } else {
            return redirect()
                ->route('admin.category.edit', $id)
                ->with('error', 'Something went wrong');
        }
    }
    public function delete($id)
    {
        $response = Category::destroy($id);
        if ($response) {
            $json = [
                'type' => 1,
                'msg' => 'Data is deleted successfully',
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
