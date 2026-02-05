<div
    class="flex flex-col md:flex-row md:items-center justify-between mb-8"
>
    <div>
        <h2 class="text-2xl font-bold text-gray-800"><?= $page['header'] ?? '' ?></h2>
        <p class="text-gray-600"><?= $page['subHeader'] ?? '' ?></p>
    </div>
    <div class="flex items-center space-x-4 mt-4 md:mt-0">
        <form method="POST" action="<?= route('logout') ?>" class="inline">
            <button class="flex items-center space-x-2 px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-600 hover:text-indigo-600 hover:border-indigo-600 transition-all duration-200">
                <?= icon("logout") ?>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>