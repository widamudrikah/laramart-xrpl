<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create() {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request) {
        $validatedData = $request->validated();

        // proses input image
        if($request->hasFile('image'))  {
            $file   = $request->file('image');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = time().'.'.$extension;
            $file->move('upload/slider/', $fileName);
            $validatedData['image'] = "upload/slider/$fileName";
        }

        // proses input status
        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::create([
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'],
            'image'         => $validatedData['image'],
            'status'        => $validatedData['status']
        ]);

        return redirect()->route('slider-index')->with('message', 'berhasil nambah slider');
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider) {

        $validatedData = $request->validated();

        // proses input image
        if($request->hasFile('image'))  {

            $destination = $slider->image;
            if(File::exists($destination)) {
                File::delete($destination);
            }

            $file   = $request->file('image');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = time().'.'.$extension;
            $file->move('upload/slider/', $fileName);
            $validatedData['image'] = "upload/slider/$fileName";
        } 

        // proses input status
        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::where('id', $slider->id)->update([
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'],
            'image'         => isset($validatedData['image']) ? $validatedData['image'] : $slider->image,
            'status'        => $validatedData['status']
        ]);

        return redirect()->route('slider-index')->with('message', 'berhasil update slider');
    }

    public function delete(Slider $slider) {
        // hapus data image
       if($slider->count() > 0) {
        $destination = $slider->image;
        if(File::exists($destination)) {
            File::delete($destination);
        }
        $slider->delete();
        return redirect()->route('slider-index')->with('message', 'Berhasil delete slider');
       }
       return redirect()->route('slider-index')->with('message', 'datanya ga ada buk');

    }
}
