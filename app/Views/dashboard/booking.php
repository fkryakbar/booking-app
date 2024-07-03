<?= $this->extend('layouts/customerlayout') ?>

<?= $this->section('title') ?>
Booking App
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div x-data="{ open: <?= (session()->has('errors') || session()->has('success')) ? 'true' : 'false' ?> }" class="mx-auto w-[60%] min-h-screen mt-10">
    <div class="mx-auto w-[50%] flex justify-end">
        <button x-text="open == true? 'Tutup': 'Booking'" x-on:click="open=!open" class="flex w-fit justify-center rounded-md bg-blue-600 px-3 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Tambah Paket</button>
    </div>
    <div class="mx-auto w-[50%]" x-show="open == true">
        <h1 class="text-slate-500 font-semibold text-xl">Booking</h1>
        <?php if (session()->has('success')) : ?>
            <div class="bg-green-200 p-3 rounded-md mt-5 text-green-700 flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        <form class="space-y-6" action="" method="POST">
            <?php if (session()->has('error')) : ?>
                <div class="bg-red-200 p-3 rounded-md mt-5 text-red-700 flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <?= session('error') ?>
                </div>
            <?php endif; ?>
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['name']) ?  session()->get('errors')['name'] : '' ?></p>

                </div>
            </div>
            <div>
                <label for="paket_id" class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Paket Wisata</label>
                <div class="mt-2">
                    <select id="paket_id" name="paket_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected value="">Pilih Paket</option>
                        <?php foreach ($pakets as $paket) : ?>
                            <option value="<?= $paket['id'] ?>"><?= $paket['name'] ?> - <?= $paket['price'] ?> IDR</option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['paket_id']) ?  session()->get('errors')['paket_id'] : '' ?></p>
                </div>
            </div>
            <div>
                <label for="tipe_id" class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Tipe Kendaraan</label>
                <div class="mt-2">
                    <select id="tipe_id" name="tipe_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected disabled value="">Pilih Tipe Kendaraan</option>
                        <?php foreach ($tipes as $tipe) : ?>
                            <option value="<?= $tipe['id'] ?>"><?= $tipe['name'] ?> - <?= $tipe['price'] ?> IDR</option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['tipe_id']) ?  session()->get('errors')['tipe_id'] : '' ?></p>
                </div>
            </div>
            <div>
                <label for="from" class="block mb-2 text-sm font-medium text-gray-900 ">Asal Daerah Keberangkatan</label>
                <div class="mt-2">
                    <select id="from" name="from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected disabled value="">Pilih Daerah</option>
                        <option>Banjarmasin</option>
                        <option>Malang</option>
                        <option>Majalengka</option>
                        <option>Surabaya</option>
                    </select>
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['from']) ?  session()->get('errors')['from'] : '' ?></p>
                </div>
            </div>
            <div>
                <label for="tour_date" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Keberangkatan</label>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker id="tour_date" name="tour_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 pl-10" placeholder="Select date">
                </div>
                <p class="text-xs text-red-500"><?= isset(session()->get('errors')['tour_date']) ?  session()->get('errors')['tour_date'] : '' ?></p>

            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Booking</button>
            </div>
        </form>
    </div>
    <div class="mx-auto w-[100%] mt-10" x-show="open == false">
        <h1 class="text-slate-500 font-semibold text-xl mb-5">Booking List</h1>
        <?php if (session()->has('successDelete')) : ?>
            <div class="bg-green-200 p-3 rounded-md mt-5 text-green-700 flex gap-2 items-center mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
                <?= session('successDelete') ?>
            </div>
        <?php endif; ?>
        <?php if (count($bookings) > 0) :  ?>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pesan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Tour
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Paket Tour
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipe Kendaraan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Paket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Bus
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($bookings as $booking) : ?>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 ">

                                <td class="px-6 py-4">
                                    <?= $booking['id'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $booking['created_at'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $booking['tour_date'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $booking['paket_name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $booking['tipe_name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $booking['paket_price'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $booking['tipe_price'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $booking['price_total'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="p-2 rounded-md <?= $booking['status'] == 'unpaid' ? 'bg-red-200 text-red-700' : 'bg-green-200 text-green-700' ?> font-bold uppercase text-sm text-center">
                                        <?= $booking['status'] ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/dashboard/booking/<?= $booking['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                                    <?php if ($booking['status'] != 'unpaid') : ?>
                                        <a href="/dashboard/booking/<?= $booking['id'] ?>/cetak" class="font-medium text-amber-500 hover:underline">Cetak</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <span class="font-medium">Belum ada data booking</span> Silahkan booking terlebih dahulu.
            </div>

        <?php endif; ?>
    </div>
    <script>
        function deletePaket(id) {
            if (confirm('Hapus Paket?')) {
                window.location.href = `/admin/paket/${id}/delete`;
            }
        }
    </script>
</div>
<?= $this->endSection() ?>