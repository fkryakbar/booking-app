<?= $this->extend('layouts/homelayouts') ?>

<?= $this->section('title') ?>
Register
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mx-auto w-[60%] min-h-screen mt-10">
    <div class="flex">
        <div class="basis-[50%] flex items-center justify-center">
            <div class="bg-white p-4 rounded-lg shadow w-[80%] mx-auto">
                <h1 class="text-xl text-slate-600 font-semibold">Register</h1>
                <?php if (session()->has('success')) : ?>
                    <div class="bg-green-200 p-3 rounded-md mt-5 text-green-700 flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>
                <form class="space-y-6" action="" method="POST" autocomplete="off">
                    <?= csrf_field() ?>
                    <div>
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                        <div class="mt-2">
                            <input value="<?= old('name') ?>" id="name" name="name" type="text" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                            <p class="text-xs text-red-500"><?= isset(session()->get('errors')['name']) ?  session()->get('errors')['name'] : '' ?></p>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input value="<?= old('email') ?>" id="email" name="email" type="email" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                            <p class="text-xs text-red-500"><?= isset(session()->get('errors')['email']) ?  session()->get('errors')['email'] : '' ?></p>

                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input value="<?= old('password') ?>" id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                            <p class="text-xs text-red-500"><?= isset(session()->get('errors')['password']) ?  session()->get('errors')['password'] : '' ?></p>

                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password_confirmed" class="block text-sm font-medium leading-6 text-gray-900">Tulis Ulang Password</label>
                        </div>
                        <div class="mt-2">
                            <input value="<?= old('password_confirmed') ?>" id="password_confirmed" name="password_confirmed" type="password_confirmed" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                            <p class="text-xs text-red-500"><?= isset(session()->get('errors')['password_confirmed']) ?  session()->get('errors')['password_confirmed'] : '' ?></p>

                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Register</button>
                    </div>
                </form>
                <p class="mt-10 text-center text-sm text-gray-500">
                    Sudah Punya akun?
                    <a href="/login" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Silahkan login</a>
                </p>
            </div>
        </div>
        <div class="basis-[50%]">
            <img src="<?= base_url('assets/login.svg') ?>" alt="">
        </div>
    </div>
</div>
<?= $this->endSection() ?>