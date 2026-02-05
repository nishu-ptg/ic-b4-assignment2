<div class="text-center animate-float">
    <div
        class="mx-auto bg-gradient-to-r from-indigo-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg mb-4"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6 text-white"
        >
            <path
                fill-rule="evenodd"
                d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                clip-rule="evenodd"
            />
        </svg>
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
        <div>
            <div class="flex items-center justify-between mb-2">
                <label class="block text-sm font-semibold text-gray-700">
                    Password
                </label>
                <a href="#"
                   class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
                    Forgot password?
                </a>
            </div>
            <?php inputField([
                'name' => 'password',
                'label' => '',
                'type' => 'password',
                'placeholder' => '••••••••',
                'iconKey' => 'lock',
            ]); ?>
        </div>

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
              <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-5 h-5 text-indigo-300 group-hover:text-white transition-colors"
              >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"
                />
              </svg>
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