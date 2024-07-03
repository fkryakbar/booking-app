<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('title') ?>
Admin
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mx-auto w-[60%] min-h-screen mt-10">
    <div class="mx-auto w-[50%]" x-show="open == true">
        <h1 class="text-slate-500 font-semibold text-xl">Edit Tipe</h1>
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
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama Tipe</label>
                <div class="mt-2">
                    <input id="name" name="name" value="<?= $tipe['name'] ?>" type="text" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['name']) ?  session()->get('errors')['name'] : '' ?></p>

                </div>
            </div>
            <div>
                <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Kendaraan</label>
                <div class="mt-2">
                    <input id="type" name="type" value="<?= $tipe['type'] ?>" type="text" autocomplete="type" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['type']) ?  session()->get('errors')['type'] : '' ?></p>
                </div>
            </div>
            <div>
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Harga</label>
                <div class="mt-2">
                    <input id="price" name="price" value="<?= $tipe['price'] ?>" type="number" autocomplete="price" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['price']) ?  session()->get('errors')['price'] : '' ?></p>
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
                <img src="/<?= $tipe['image_path'] ?>" alt="" class="w-[50%]">

                <div class="mt-2">
                    <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file">
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['image']) ?  session()->get('errors')['image'] : '' ?></p>

                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Keterangan</label>
                <div class="mt-2">
                    <textarea id="description" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Keterangan"><?= $tipe['description'] ?></textarea>
                    <p class="text-xs text-red-500"><?= isset(session()->get('errors')['description']) ?  session()->get('errors')['description'] : '' ?></p>

                </div>
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</div>
<?= $this->endSection() ?>