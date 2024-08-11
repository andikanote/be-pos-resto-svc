@extends('layouts.app')

@section('title', 'Add User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Add User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item"> Add Users</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Users</h2>



                <div class="card">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Form Add User</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       required> <!-- add required attribute to make the field mandatory -->
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @if($errors->has('name') && $request->input('name') === null)
                                    <div class="invalid-feedback" required>
                                        Please enter your name.
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text"
                                       class="form-control @error('description') is-invalid @enderror"
                                       name="description"
                                       required> <!-- add required attribute to make the field mandatory -->
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @if($errors->has('description') && $request->input('description') === null)
                                    <div class="invalid-feedback" required>
                                        Please enter your name.
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
