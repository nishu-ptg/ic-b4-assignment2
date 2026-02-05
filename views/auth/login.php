<div class="text-center animate-float">
    <div
        class="mx-auto bg-gradient-to-r from-indigo-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg mb-4"
    >
        <?= icon("login-header") ?>
    </div>
    <h1
        class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent"
    >
        Welcome Back
    </h1>
    <p class="mt-2 text-gray-600">Sign in to your account to continue</p>
</div>

<div
    class="bg-white glass rounded-2xl shadow-xl p-8 transition-all duration-300 hover:shadow-2xl"
>
    <form
        method="POST"
        action="<?= route('login') ?>"
        class="space-y-6 animate-fadeIn"
    >

        <?php inputField([
            'name' => 'email',
            'label' => 'Email Address',
            'type' => 'email',
            'placeholder' => 'you@example.com',
            'iconKey' => 'email',
            'value' => old('email'),
        ]); ?>
        <?php inputField([
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password',
            'placeholder' => '••••••••',
            'iconKey' => 'lock',
            'labelRight' => '<a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Forgot password?</a>',
        ]); ?>

        <div class="flex items-center">
            <input
                id="remember-me"
                name="remember-me"
                type="checkbox"
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
            />
            <label for="remember-me" class="ml-2 block text-sm text-gray-700"
            >Remember me</label
            >
        </div>

        <button
            type="submit"
            class="group relative w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg"
        >
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <?= icon("login-button") ?>
            </span>
            Sign In
        </button>
    </form>
</div>

<div class="text-center text-sm text-gray-600">
    <p>
        Don't have an account?
        <a
            href="<?= route('signup') ?>"
            class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors"
        >Sign up</a
        >
    </p>
</div>