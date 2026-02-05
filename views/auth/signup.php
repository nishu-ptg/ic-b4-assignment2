<div class="text-center animate-float">
    <div
        class="mx-auto bg-gradient-to-r from-indigo-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg mb-4"
    >
        <?= icon("signup-header") ?>
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
                    <?= icon("signup-button") ?>
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
