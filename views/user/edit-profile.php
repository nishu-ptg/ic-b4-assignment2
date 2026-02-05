<div class="max-w-4xl">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div
            class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"
        ></div>
        <div class="p-6">
            <form
                method="POST"
                action="<?= route('edit-profile') ?>"
                class="space-y-6"
            >
                <div class="grid grid-cols-1 gap-6">
                    <?php inputField([
                        'name' => 'name',
                        'label' => 'Full Name',
                        'type' => 'text',
                        'placeholder' => 'John Doe',
                        'iconKey' => 'user',
                        'value' => old('name', $user['name']),
                    ]); ?>

                    <?php inputField([
                        'name' => 'email',
                        'label' => 'Email Address',
                        'type' => 'email',
                        'placeholder' => 'you@example.com',
                        'iconKey' => 'email',
                        'value' => old('email', $user['email']),
                    ]); ?>

                </div>

                <div class="flex justify-end pt-4">
                    <button
                        type="submit"
                        class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                    >
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>