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
                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
            />
        </svg>
    </div>
    <h1
        class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent"
    >
        Create Account
    </h1>
    <p class="mt-2 text-gray-600">Join us today to get started</p>
</div>

<div
    class="bg-white glass rounded-2xl shadow-xl p-8 transition-all duration-300 hover:shadow-2xl"
>
    <form
        method="POST"
        action="<?= route('signup') ?>"
        class="space-y-6 animate-fadeIn"
    >
        <div class="grid grid-cols-1 gap-4">

            <?php inputField([
                'name' => 'name',
                'label' => 'Full Name',
                'type' => 'text',
                'placeholder' => 'John Doe',
                'iconKey' => 'user',
                'value' => old('name'),
            ]); ?>

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
            ]); ?>

            <?php inputField([
                'name' => 'confirm_password',
                'label' => 'Confirm Password',
                'type' => 'password',
                'placeholder' => '••••••••',
                'iconKey' => 'lock',
            ]); ?>

            <div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input
                            id="terms"
                            name="terms"
                            type="checkbox"
                            <?= old('terms') ? 'checked' : '' ?>
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        />
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-700"
                        >I agree to the
                            <a
                                href="#"
                                class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors"
                            >Terms and Conditions</a
                            >
                            and
                            <a
                                href="#"
                                class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors"
                            >Privacy Policy</a
                            ></label
                        >
                    </div>
                </div>
                <?= errorMsg('terms') ?>
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
                        d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM3 15.75h3m0 0h3m-3 0V12m0 3.75V18"
                    />
                  </svg>
                </span>
                Create Account
            </button>

        </div>
    </form>
</div>

<div class="text-center text-sm text-gray-600">
    <p>
        Already have an account?
        <a
            href="<?= route('login') ?>"
            class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors"
        >Sign in</a
        >
    </p>
</div>

<!--
<?php // dump($_SESSION); ?>
-->
