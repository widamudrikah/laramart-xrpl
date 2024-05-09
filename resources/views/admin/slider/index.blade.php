@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-12 grid-margin">
        <!-- ini untuk alert message -->
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Slider List
                    <a href="{{ route('slider-create')}}" class="btn btn-primary btn-sm text-white float-end">
                        Add Slider
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                <img src="{{ asset("$slider->image") }}" alt="img" style="width: 70px; height: 30px">
                            </td>
                            <td>{{ $slider->status == '0' ? 'Visible': 'Hidden'}}</td>
                            <td>
                                <a href="{{ route('slider-edit', $slider->id) }}" class="btn btn-warning text-white btn-sm">Edit</a>
                                <a href="{{ route('slider-delete', $slider->id) }}" class="btn btn-danger text-white btn-sm">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection