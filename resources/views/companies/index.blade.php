@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
				<div class="card-header d-flex justify-content-between align-items-center mb-3">
					<h4>Companies List</h4>
					<a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>
				</div>
				

                <div class="card-body">
					@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Logo</th>
								<th>Email</th>
								<th>Website</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($companies as $company)
								<tr>
									<td>{{ $company->name }}</td>
									<td>
										@if ($company->logo)
											<img src="{{ Storage::url($company->logo) }}" alt="Logo" style="width: 50px; height: 50px;">
										@else
											No logo
										@endif
									</td>
									<td>{{ $company->email }}</td>
									<td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
									<td>
										<a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">View</a>
										<a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
										<form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					{{ $companies->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
