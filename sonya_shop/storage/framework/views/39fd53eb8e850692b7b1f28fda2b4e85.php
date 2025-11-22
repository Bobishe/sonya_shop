<?php echo view_render_event('bagisto.shop.layout.footer.before'); ?>


<!--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
-->
<?php $themeCustomizationRepository = app('Webkul\Theme\Repositories\ThemeCustomizationRepository'); ?>

<!--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
-->
<?php
    $channel = core()->getCurrentChannel();

    $customization = $themeCustomizationRepository->findOneWhere([
        'type'       => 'footer_links',
        'status'     => 1,
        'theme_code' => $channel->theme,
        'channel_id' => $channel->id,
    ]);
?>

<footer class="mt-9 bg-[#f5f5f5] max-sm:mt-10">
    <div class="flex justify-between gap-x-6 gap-y-8 p-[60px] max-1060:flex-col-reverse max-md:gap-5 max-md:p-8 max-sm:px-4 max-sm:py-5">
        <!-- For Desktop View -->
        <div class="flex flex-wrap items-start gap-24 max-1180:gap-6 max-1060:hidden">
            <?php if($customization?->options): ?>
                <?php $__currentLoopData = $customization->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footerLinkSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="grid gap-5 text-sm">
                        <!-- <?php
                            usort($footerLinkSection, function ($a, $b) {
                                return $a['sort_order'] - $b['sort_order'];
                            });
                        ?> -->

                        <?php $__currentLoopData = $footerLinkSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($link['url']); ?>">
                                    <?php echo e($link['title']); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <!-- For Mobile view -->
        <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['isActive' => false,'class' => 'hidden !w-full rounded-xl max-1060:block max-sm:rounded-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'class' => 'hidden !w-full rounded-xl max-1060:block max-sm:rounded-lg']); ?>
             <?php $__env->slot('header', null, ['class' => 'rounded-t-lg bg-white font-medium max-md:p-2.5 max-sm:px-3 max-sm:py-2 max-sm:text-sm']); ?> 
                <?php echo app('translator')->get('shop::app.components.layouts.footer.footer-content'); ?>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('content', null, ['class' => 'flex justify-between !bg-transparent !p-4']); ?> 
                <?php if($customization?->options): ?>
                    <?php $__currentLoopData = $customization->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footerLinkSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="grid gap-5 text-sm">
                            <!-- <?php
                                usort($footerLinkSection, function ($a, $b) {
                                    return $a['sort_order'] - $b['sort_order'];
                                });
                            ?> -->

                            <?php $__currentLoopData = $footerLinkSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a
                                        href="<?php echo e($link['url']); ?>"
                                        class="text-sm font-medium max-sm:text-xs">
                                        <?php echo e($link['title']); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>

    </div>

    <!-- <div class="flex justify-between bg-black px-[60px] py-3.5 max-md:justify-center max-sm:px-5">
        <?php echo view_render_event('bagisto.shop.layout.footer.footer_text.before'); ?>


        <p class="text-sm text-white max-md:text-center">
            <?php echo app('translator')->get('shop::app.components.layouts.footer.footer-text', ['current_year'=> date('Y') ]); ?>
        </p>

        <?php echo view_render_event('bagisto.shop.layout.footer.footer_text.after'); ?>

    </div> -->
</footer>

<?php echo view_render_event('bagisto.shop.layout.footer.after'); ?>

<?php /**PATH D:\Work\sonya_shop\sonya_shop\packages\Webkul\Shop\src/resources/views/components/layouts/footer/index.blade.php ENDPATH**/ ?>