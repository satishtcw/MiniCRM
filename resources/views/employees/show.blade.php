@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Employee Details</h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p class="card-text"><strong>Company:</strong>
			<a href="{{ route('companies.show', $employee->company->id) }}" class="btn btn-link">{{ $employee->company->name }}
										</a>
			</p>
            <p class="card-text"><strong>Document (PDF):</strong> <a href="{{ asset('storage/' . $employee->document) }}" target="_blank" class="btn btn-link">
						View Document
					</a></p>
            @if ($employee->profile_pic)
                <p><strong>Profile Picture:</strong></p>
				<img src="{{ Storage::url($employee->profile_pic) }}" alt="Employee Profile Picture" style="width: 100px; height: 100px;">
            @endif
        </div>
    </div>
</div>
@endsection