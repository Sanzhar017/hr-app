@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Home')

@section('content')
  <h4>Home Page Staff</h4>
  {{ $students->links() }}

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <a href="{{ route('students.create') }}" class="btn btn-primary">Create Students</a>







  <div class="card">
    <h5 class="card-header">Table Staff </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
        <tr>
          <th>Name</th>
          <th>Status </th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @foreach($students as $student)
          <tr>
            <td>{{ $student->name }}</td>
            <td class="btn btn-sm bg-light-success text-success fw-bold  ms-2 fs-8 py-2 px-3 ">{{ $student->status->name }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('students.edit', ['student' => $student->id]) }}"><i class="ti ti-pencil me-2"></i>Edit</a>
                  <form method="POST" action="{{ route('students.destroy', ['student' => $student->id]) }}" onsubmit="return confirm('Are you sure you want to delete this student?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item"><i class="ti ti-trash me-2"></i>Delete</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <p class="mt-3">Найдено {{ $students->total() }} записей</p>
@endsection
