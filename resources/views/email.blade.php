<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Yuborish</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 480px;
            margin-top: 70px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .container:hover {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #495057;
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-size: 0.95rem;
            color: #6c757d;
            font-weight: 500;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            padding: 10px;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            transform: scale(1.02);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            padding: 10px;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: scale(1.02);
        }

        .text-center a {
            color: #007bff;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .text-center a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Email Yuborish</h1>
        <form id="emailForm" method="POST" action="/send-email">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email Manzili</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com"
                    required>
            </div>
            <div class="mb-4">
                <label for="message" class="form-label">Xabar</label>
                <textarea name="message" id="message" class="form-control" rows="5" placeholder="Xabar matnini kiriting..."
                    required></textarea>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Yuborish</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Ortga qaytish</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
