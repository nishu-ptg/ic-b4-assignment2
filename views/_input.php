<div class="space-y-2">
    <div class="flex items-center justify-between">
        <label class="block text-sm font-semibold text-gray-700">
            <?= e($field['label']) ?>
        </label>
        <?php if ($field['labelRight']): ?>
            <?= $field['labelRight'] ?>
        <?php endif; ?>
    </div>

    <div class="relative">
        <?php if ($field['icon']): ?>
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                <?= $field['icon'] ?>
            </div>
        <?php endif; ?>
        <input
            type="<?= $field['type'] ?>"
            name="<?= $field['name'] ?>"
            class="w-full <?= $field['icon'] ? 'pl-10' : 'pl-3' ?> pr-3 py-3 border border-gray-200 rounded-xl
                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                   focus:border-transparent input-focus transition-all duration-300"
            placeholder="<?= e($field['placeholder']) ?>"
            <?php if ($field['value'] !== null): ?>
                value="<?= e($field['value']) ?>"
            <?php endif; ?>
        />
    </div>
    <?= errorMsg($field['name']) ?>
</div>