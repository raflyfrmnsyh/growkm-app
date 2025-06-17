<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - GrowKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;800&family=Syne:wght@600&family=Urbanist:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
    <style>
        body { background-color: #FDFDFD; font-family: 'Urbanist', sans-serif; }
        .jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
        .syne { font-family: 'Syne', sans-serif; }
        .urbanist { font-family: 'Urbanist', sans-serif; }
        .auth-card { box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); }
        .teal-primary { color: #003C43; }
        .teal-secondary { color: #007F73; }
        .bg-teal-primary { background-color: #003C43; }
        .border-teal-primary { border-color: #003C43; }
        .bg-teal-secondary { background-color: #007F73; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-[547px] mx-auto p-10 bg-white auth-card rounded-xl">
        {{ $slot }}
    </div>
</body>
</html>
