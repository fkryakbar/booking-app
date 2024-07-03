<?= $this->extend('layouts/homelayouts') ?>

<?= $this->section('title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mx-auto w-[60%] min-h-screen mt-10">
    <div class="flex">
        <div class="basis-[50%] flex items-center justify-center">
            <div class="bg-white p-4 rounded-lg shadow w-[80%] mx-auto">
                <h1 class="text-xl text-slate-600 font-semibold">Login</h1>
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
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                            <p class="text-xs text-red-500"><?= isset(session()->get('errors')['email']) ?  session()->get('errors')['email'] : '' ?></p>

                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Login</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Belum Punya akun?
                    <a href="/register" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Silahkan register</a>
                </p>
            </div>
        </div>
        <div class="basis-[50%]">
            <img src="<?= base_url('assets/login.svg') ?>" alt="">
        </div>
    </div>
</div>
<?= $this->endSection() ?>