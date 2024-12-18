@extends('layouts.app')

@section('content')
<div class="container">
    
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1>Edit Company</h1>
		<a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
	</div>

    <!-- Form for editing the company -->
    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Company Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $company->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $company->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Website -->
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $company->website) }}">
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

            <!-- Display the existing logo -->
            @if($company->logo)
                <img src="{{ Storage::url($company->logo) }}" alt="Company Logo" style="width: 100px; height: 100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
</div>
@endsection