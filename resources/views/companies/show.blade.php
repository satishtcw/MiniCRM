@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Company Details</h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>
            <p class="card-text"><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            @if ($company->logo)
                <p><strong>Logo:</strong></p>
				<img src="{{ Storage::url($company->logo) }}" alt="Company Logo" style="width: 100px; height: 100px;">
            @endif
        </div>
    </div>
</div>
@endsection