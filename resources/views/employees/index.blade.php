@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
				<div class="card-header d-flex justify-content-between align-items-center mb-3">
					<h4>Employees List</h4>
					<a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>
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
								<th>profile pic</th>
								<th>Company</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($employees as $employee)
								<tr>
									<td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
									<td>
										@if ($employee->profile_pic)
											<img src="{{ Storage::url($employee->profile_pic) }}" alt="Profile Pic" style="width: 50px; height: 50px;">
										@else
											No Profile Pic
										@endif
									</td>
									<td>
										<a href="{{ route('companies.show', $employee->company->id) }}" class="btn btn-link">{{ $employee->company->name }}
										</a>
									</td>
									<td>{{ $employee->email }}</td>
									<td>{{ $employee->phone }}</td>
									<td>
										<a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">View</a>
										<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
										<form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					{{ $employees->links('pagination::bootstrap-5') }}
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
