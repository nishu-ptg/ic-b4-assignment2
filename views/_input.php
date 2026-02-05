<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        <?= e($field['label']) ?>
    </label>
    <div class="relative">
        <?php if (!empty($field['icon'])): ?>
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
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