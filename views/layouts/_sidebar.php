<aside
    class="lg:w-64 bg-white shadow-lg z-10 lg:h-screen lg:sticky lg:top-0"
>
    <div class="p-6 border-b">
        <div class="flex items-center space-x-3">
            <div
                class="bg-gradient-to-r from-indigo-500 to-purple-600 w-10 h-10 rounded-xl flex items-center justify-center"
            >
                <?= icon("main") ?>
            </div>
            <div>
                <h1
                    class="font-bold text-lg bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent"
                >
                    <?= config('app_name', 'APP_NAME') ?>
                </h1>
                <p class="text-xs text-gray-500">Dashboard</p>
            </div>
        </div>
    </div>

    <div class="p-4">
        <nav class="space-y-1">
            <a
                href="<?= route('dashboard') ?>"
                class="flex items-center space-x-3 p-3 rounded-lg sidebar-link <?= activeClass('dashboard') ?>"
            >
                <?= icon("profile") ?>
                <span class="font-medium">My Profile</span>
            </a>
            <a
                href="<?= route('edit-profile') ?>"
                class="flex items-center space-x-3 p-3 rounded-lg sidebar-link <?= activeClass('edit-profile') ?>"
            >
                <?= icon("edit") ?>
                <span class="font-medium">Edit Profile</span>
            </a>
            <a
                href="<?= route('change-password') ?>"
                class="flex items-center space-x-3 p-3 rounded-lg sidebar-link <?= activeClass('change-password') ?>"
            >
                <?= icon("password") ?>
                <span class="font-medium">Change Password</span>
            </a>
            <a
                href="#"
                onclick="document.getElementById('logout-form').submit(); return false;"
                class="flex items-center space-x-3 p-3 rounded-lg sidebar-link"
            >
                <?= icon("logout") ?>
                <span class="font-medium">Logout</span>
            </a>
        </nav>
        <form id="logout-form" action="<?= route("logout") ?>" method="POST" style="display: none;"></form>
    </div>
</aside>