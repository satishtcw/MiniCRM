@extends('layouts.app')

@section('content')
<div class="container">
    
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1>Edit Employee</h1>
		<a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
	</div>

    <!-- Form for editing the employee -->
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- employee First Name -->
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
            @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
		
		<!-- employee Last Name -->
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- phone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
		
		<!-- Company -->
		<div class="mb-3">
			<label for="company_id" class="form-label">Company</label>
			<select class="form-select @error('company_id') is-invalid @enderror" id="company_id" name="company_id" required>
				<option value="">Select a company</option>
				@foreach($companies as $company)
					<option value="{{ $company->id }}" {{ (old('company_id', $employee->company_id) == $company->id) ? 'selected' : '' }}>
						{{ $company->name }}
					</option>
				@endforeach
			</select>
			@error('company_id')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		
        <!-- profile_pic -->
        <div class="mb-3">
            <label for="profile_pic" class="form-label">Profile Picture</label>
            <input type="file" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" name="profile_pic" accept="image/jpeg, image/png">
            @error('profile_pic')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Display the existing logo -->
            @if($employee->profile_pic)
                <img src="{{ Storage::url($employee->profile_pic) }}" alt="Profile Picture" style="width: 100px; height: 100px;">
            @endif
        </div>
		
		<!-- Document Upload -->
		<div class="mb-3">
			<label for="document" class="form-label">Document (PDF)</label>

			<!-- Display Existing Document if Available -->
			@if($employee->document)
				<div class="mb-2">
					<a href="{{ asset('storage/' . $employee->document) }}" target="_blank" class="btn btn-link">
						View Current Document
					</a>
				</div>
			@endif

			<!-- Upload New Document -->
			<input type="file" class="form-control @error('document') is-invalid @enderror" id="document" name="document" accept="application/pdf">
			@error('document')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
@endsection