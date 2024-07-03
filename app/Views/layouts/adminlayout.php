<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
</head>

<body class="bg-slate-100">
    <nav class="shadow-md bg-white">
        <div class="mx-auto p-4 w-[60%] flex justify-between">
            <h1 class="text-blue-500 font-bold text-xl">Today Trip And Travel</h1>
            <div class="flex gap-5 items-center text-slate-500">
                <a href="/">Home</a>
                <a href="/admin/paket">Paket Wisata</a>
                <a href="/admin/tipe">Tipe Kendaraan</a>
                <a href="/admin/booking">Booking</a>
                <a href="/logout">Logout</a>
            </div>
        </div>
    </nav>
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="mx-auto w-[60%] ">
        <p>&copy; 2024 My Website</p>
    </footer>
</body>

</html>