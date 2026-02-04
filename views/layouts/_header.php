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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>