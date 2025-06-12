<!DOCTYPE html>
<html>
<head>
    <title>Student Grades App</title>
    <style>
    /* Reset & basics */
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f7fa;
        width: 960px;
        height:700px;
        margin: 0 auto;
        padding: 20px 40px;
        color: #333;
    }

    nav {
        margin-bottom: 25px;
    }

    nav a {
        color: #1a73e8;
        text-decoration: none;
        font-weight: 600;
        margin-right: 20px;
        transition: color 0.3s ease;
    }

    nav a:hover {
        color: #0c47b7;
        text-decoration: underline;
    }

    h1 {
        font-weight: 700;
        color: #222;
        margin-bottom: 25px;
    }

    /* Table styles */
    table {
        width: 100%;
        max-width: 900px;
        border-collapse: collapse;
        margin-bottom: 25px;
        background: #fff;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
        border-radius: 6px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 18px;
        text-align: left;
        border-bottom: 1px solid #e1e5eb;
    }

    th {
        background-color: #1a73e8;
        color: #fff;
        font-weight: 600;
        user-select: none;
    }

    tr:hover {
        background-color: #f1f6fb;
    }

    /* Buttons & links */
    a.button,
    button {
        background-color: #1a73e8;
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    a.button:hover,
    button:hover {
        background-color: #0c47b7;
    }

    button {
        border: none;
        font-size: 14px;
    }

    /* Forms */
    form {
        max-width: 500px;
        background: #fff;
        padding: 25px;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 8px 12px;
        margin-bottom: 20px;
        border: 1px solid #cbd2d9;
        border-radius: 4px;
        font-size: 15px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus {
        outline: none;
        border-color: #1a73e8;
        box-shadow: 0 0 5px rgba(26, 115, 232, 0.5);
    }

    /* Success & error messages */
    .success-message {
        background-color: #d4edda;
        border-left: 6px solid #28a745;
        padding: 15px 20px;
        margin-bottom: 20px;
        color: #155724;
        border-radius: 4px;
        max-width: 900px;
    }

    .error-messages {
        background-color: #f8d7da;
        border-left: 6px solid #dc3545;
        padding: 15px 20px;
        margin-bottom: 20px;
        color: #721c24;
        border-radius: 4px;
        max-width: 900px;
    }

    /* Pagination */
    .pagination {
        display: flex;
        list-style: none;
        padding-left: 0;
        gap: 6px;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination li a,
    .pagination li span {
        padding: 8px 14px;
        border-radius: 4px;
        border: 1px solid #1a73e8;
        color: #1a73e8;
        text-decoration: none;
        font-weight: 600;
        user-select: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .pagination li a:hover {
        background-color: #1a73e8;
        color: #fff;
    }

    .pagination li.active span {
        background-color: #1a73e8;
        color: white;
        border-color: #1a73e8;
    }
</style>

</head>
<body>
    <nav>
        <a href="{{ route('grades.index') }}">Grades</a> |
        <a href="{{ route('students.index') }}">Students</a> |
        <a href="{{ route('subjects.index') }}">Subjects</a>
    </nav>
    <hr>
    <div>
        @yield('content')
    </div>
</body>
</html>
