<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />


</head>

<body class="">
    <div class="border-[1px] border-gray-200 p-5">
        <h1 class="text-center font-semibold">Tiket Travel</h1>
        <h1 class="text-center font-semibold">Today Trip and Travel</h1>
        <table>
            <tr>
                <td>Nama</td>
                <td>: <?= $booking['name'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Keberangkatan</td>
                <td>: <?= $booking['tour_date'] ?></td>
            </tr>
        </table>
    </div>
</body>

</html>