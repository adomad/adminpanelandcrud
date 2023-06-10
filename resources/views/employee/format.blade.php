<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>simple crud in laravel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">simple crud in laravel</div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Ticket List</div>
            <div>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Create</a>
                {{-- <a href="{{ route('logout') }}" class="btn btn-danger my-3">Logout</a> --}}
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Ticket No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    @if ($employees->isNotEmpty())
                        @foreach ($employees as $employee)
                            <tr valign="middle">
                                <td>{{ $employee->id }}</td>
                                <td>
                                    @if ($employee->image != '' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                                        <img src="{{ url('uploads/employees/'.$employee->image) }}" alt="" width="50" height="50" class="rounded-circle">
                                    @else
                                        <img src="{{ url('assets/images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                                    @endif
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>
                                   
                                    <a href="{{ route('download.pdf', [$employee->id]) }}" class="btn btn-primary btn-sm">Download PDF</a>
                                    <form id="employee-edit-action-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Record Not Found</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
        <div class="mt-3">
            {{ $employees->links() }}
        </div>
    </div>

    <script>
        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete?")) {
                document.getElementById('employee-edit-action-' + id).submit();
            }
        }
    </script>
</body>
</html>
