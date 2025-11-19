<v-shimmer-image <?php echo e($attributes); ?>>
    <div <?php echo e($attributes->merge(['class' => 'shimmer bg-neutral-100'])); ?>></div>
</v-shimmer-image>

<?php if (! $__env->hasRenderedOnce('06944942-91a8-41c0-aca8-e1ac66984828')): $__env->markAsRenderedOnce('06944942-91a8-41c0-aca8-e1ac66984828');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-shimmer-image-template"
    >
        <div
            class="shimmer"
            v-bind="$attrs"
            v-show="isLoading"
        >
        </div>

        <img
            v-bind="$attrs"
            :src="src"
            @load="onLoad"
            v-show="! isLoading"
        >
    </script>

    <script type="module">
        app.component('v-shimmer-image', {
            template: '#v-shimmer-image-template',

            props: ['src'],

            data() {
                return {
                    isLoading: true,
                };
            },
            
            methods: {
                onLoad() {
                    this.isLoading = false;
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\Work\sonya_site\sonya_shop\packages\Webkul\Admin\src/resources/views/components/shimmer/image/index.blade.php ENDPATH**/ ?>