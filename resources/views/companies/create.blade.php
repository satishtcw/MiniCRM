@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1>Create New Company</h1>
		<a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
	</div>
	
    <!-- Form for creating a new company -->
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Company Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Website -->
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}">
            @error('website')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Logo -->
        <div class="mb-3">
            <label for="logo" class="form-label">Company Logo (min 100x100)</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/jpeg, image/png">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Company</button>
    </form>
</div>
@endsection
