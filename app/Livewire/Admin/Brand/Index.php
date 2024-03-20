<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{

    public $name, $slug, $status;

    // ini untuk validasi
    public function rules() {
        return [
            'name'      => 'required|string',
            'slug'      => 'required|string',
            'status'    => 'nullable'
        ];
    }

    // tambah data
    public function storeBrand() {
        $validateData = $this->validate();
        Brand::create([
            'name'  =>$this->name,
            'slug'  =>Str::slug($this->slug),
            'status'    =>$this->status == true ? '1':'0'
        ]);
        session()->flash('message', 'Brand Added');
        $this->dispatch('close-modal');

    }



    public function render()
    {
        return view('livewire.admin.brand.index')
        ->extends('layouts.admin')
        ->section('content');
    }
}
