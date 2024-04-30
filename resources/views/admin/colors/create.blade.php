@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Add Colors
                    <a href="" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            
            <div class="card-body">
                <form action="{{route('colors-store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Color Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Color Code</label>
                        <input type="text" name="code" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection