<?= $this->extend('layouts/customerlayout') ?>

<?= $this->section('title') ?>
Booking App
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mx-auto w-[60%] min-h-screen mt-10">
    <div class="mx-auto w-[100%]" x-show="open == true">
        <h1 class="text-slate-500 font-semibold text-xl mb-5">Booking</h1>
        <?php if (session()->has('success')) : ?>
            <div class="bg-green-200 p-3 rounded-md mt-5 text-green-700 flex gap-2 items-center mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        <form class="space-y-6" action="" method="POST" enctype="multipart/form-data">
            <?php if (session()->has('error')) : ?>
                <div class="bg-red-200 p-3 rounded-md mt-5 text-red-700 flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <?= session('error') ?>
                </div>
            <?php endif; ?>

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
                            <div class="p-2 rounded-md <?= $booking['status'] == 'unpaid' ? 'bg-red-200 text-red-700' : 'bg-green-200 text-green-700' ?> font-bold uppercase text-sm">
                                <?= $booking['status'] ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <?php if ($booking['status'] != 'unpaid') : ?>
                                <a href="/dashboard/booking/<?= $booking['id'] ?>/cetak" class="font-medium text-amber-500 hover:underline">Cetak</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php if ($booking['invoice_path']) : ?>
                <div>
                    <label for="invoice" class="block text-sm font-medium leading-6 text-gray-900">Bukti Pembayaran</label>
                    <img src="/<?= $booking['invoice_path'] ?>" class="w-[40%]" alt="">
                </div>
            <?php else : ?>
                <div>
                    <label for="invoice" class="block text-sm font-medium leading-6 text-gray-900">Upload Bukti Pembayaran</label>
                    <div class="mt-2">
                        <input name="invoice" class="block max-w-sm text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="invoice" type="file">
                        <p class="text-xs text-red-500"><?= isset(session()->get('errors')['invoice']) ?  session()->get('errors')['invoice'] : '' ?></p>
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex max-w-sm justify-center rounded-md bg-blue-600 px-3 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Upload Bukti Pembayaran</button>
                </div>
            <?php endif; ?>
        </form>
    </div>

</div>
<?= $this->endSection() ?>