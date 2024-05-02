<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index() {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create() {
        return view('admin.colors.create');
    }

    public function store(ColorRequest $request) {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::create($validatedData);
        return redirect()->route('colors-index')->with('message', 'Color Added Successfully');
    }

    public function edit( $id){
        $color = Color::findOrFail($id);
        return view('admin.colors.edit', compact('color'));
     }

     public function update(ColorRequest $request, $id) {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Color::findOrFail($id)->update($validatedData);
        return redirect()->route('colors-index')->with('message', 'Berhasil update warna');
     }

     public function delete($id) {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->route('colors-index')->with('message', 'Berhasil delete data ');
     }
}
