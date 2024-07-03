<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>

<body class="bg-slate-100">
    <nav class="shadow-md bg-white">
        <div class="mx-auto p-4 w-[60%] flex justify-between">
            <h1 class="text-blue-500 font-bold text-xl">Today Trip And Travel</h1>
            <div class="flex gap-5 items-center text-slate-500">
                <a href="/">Home</a>
                <a href="/paket">Paket Wisata</a>
                <a href="/tipe">Tipe Kendaraan</a>
                <a href="/contact">Contact</a>
                <a href="/login">Login</a>
            </div>
        </div>
    </nav>
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="mx-auto w-[60%] ">
        <p>&copy; 2024 My Website</p>
    </footer>

    <!-- <script src="<?= base_url('js/script.js') ?>"></script> -->
</body>

</html>