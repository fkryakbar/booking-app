<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('title') ?>
Admin
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div x-data="{ open: <?= (session()->has('errors') || session()->has('success')) ? 'true' : 'false' ?> }" class="mx-auto w-[60%] min-h-screen mt-10">
    <div class="mx-auto w-[50%] flex justify-end">
        <button x-text="open == true? 'Tutup': 'Tambah Paket'" x-on:click="open=!open" class="flex w-fit justify-center rounded-md bg-blue-600 px-3 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Tambah Paket</button>
    </div>
    <div class="mx-auto w-[50%]" x-show="open == true">
        <h1 class="text-slate-500 font-semibold text-xl">Tambah Paket</h1>
        <?php if (session()->has('success')) : ?>
            <div class="bg-green-200 p-3 rounded-md mt-5 text-green-700 flex gap-2 items-center">
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
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama Paket</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['name']) ?  session()->get('errors')['name'] : '' ?></p>

                </div>
            </div>
            <div>
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Harga Paket</label>
                <div class="mt-2">
                    <input id="price" name="price" type="text" autocomplete="price" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['price']) ?  session()->get('errors')['price'] : '' ?></p>

                </div>
            </div>
            <div>
                <label for="destination" class="block text-sm font-medium leading-6 text-gray-900">Tempat Destinasi</label>
                <div class="mt-2">
                    <input id="destination" name="destination" type="text" autocomplete="destination" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['destination']) ?  session()->get('errors')['destination'] : '' ?></p>
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
                <div class="mt-2">
                    <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['image']) ?  session()->get('errors')['image'] : '' ?></p>

                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Keterangan</label>
                <div class="mt-2">
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Keterangan"></textarea>
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['description']) ?  session()->get('errors')['description'] : '' ?></p>

                </div>
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Buat Paket</button>
            </div>
        </form>
    </div>
    <div class="mx-auto w-[50%] mt-10" x-show="open == false">
        <h1 class="text-slate-500 font-semibold text-xl mb-5">Paket Wisata</h1>
        <?php if (session()->has('successDelete')) : ?>
            <div class="bg-green-200 p-3 rounded-md mt-5 text-green-700 flex gap-2 items-center mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
                <?= session('successDelete') ?>
            </div>
        <?php endif; ?>
        <?php if (count($pakets) > 0) :  ?>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Paket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Destinasi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($pakets as $paket) : ?>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $index++ ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $paket['name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $paket['price'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $paket['destination'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/admin/paket/<?= $paket['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <button onclick="return deletePaket(<?= $paket['id'] ?>)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <span class="font-medium">Belum ada paket wisata</span> Silahkan buat terlebih dahulu.
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