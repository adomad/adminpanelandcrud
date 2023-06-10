<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styles for the PDF content */
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        h1 {
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <!-- HTML content for the PDF -->
    <h1>Namaste!</h1>
    <table>
        <tr>
            <th>Ticket No.</th>
           
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            
        </tr>
        <!-- Table rows with employee data -->
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
        
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->address }}</td>
           
        </tr>
        @endforeach
    </table>
</body>
</html>
