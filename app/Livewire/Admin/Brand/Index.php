<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id;

    // ini untuk validasi
    public function rules() {
        return [
            'name'      => 'required|string',
            'slug'      => 'required|string',
            'status'    => 'nullable'
        ];
    }

    public function resetInput() {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
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
        $this->resetInput();
    }

    // ini untuk modal
    public function closeModal() {
        $this->resetInput();
    }

    function openModal() {
        $this->resetInput();
    }

    // proses mendapatkan data yang akan diupdate
    public function editBrand($brand_id) {
        $this->brand_id = $brand_id;

        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    // proses update data
    function updateBrand() {
        $validateData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'  =>$this->name,
            'slug'  =>Str::slug($this->slug),
            'status'    =>$this->status == true ? '1':'0'
        ]);
        session()->flash('message', 'Brand Added');
        $this->dispatch('close-modal');
        $this->resetInput();
    }



    public function render()
    {
        $brands = Brand::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands])
        ->extends('layouts.admin')
        ->section('content');
    }
}
