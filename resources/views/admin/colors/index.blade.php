@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Color List
                    <a href="{{route('colors-create')}}" class="btn btn-primary btn-sm text-white float-end">Add Color</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="mb-3">
                        <label for="">Color Name</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection