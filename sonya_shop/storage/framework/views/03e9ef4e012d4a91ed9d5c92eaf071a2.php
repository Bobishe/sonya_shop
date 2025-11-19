<v-charts-line <?php echo e($attributes); ?>></v-charts-line>

<?php if (! $__env->hasRenderedOnce('347a8ec5-520b-4e21-b7ec-fac9b3adf89f')): $__env->markAsRenderedOnce('347a8ec5-520b-4e21-b7ec-fac9b3adf89f');
$__env->startPush('scripts'); ?>
    <!-- SEO Vue Component Template -->
    <script
        type="text/x-template"
        id="v-charts-line-template"
    >
        <canvas
            :id="$.uid + '_chart'"
            class="flex w-full items-end"
            :style="'aspect-ratio:' + aspectRatio + '/1'"
        ></canvas>
    </script>

    <script type="module">
        app.component('v-charts-line', {
            template: '#v-charts-line-template',

            props: {
                labels: {
                    type: Array, 
                    default: [],
                },

                datasets: {
                    type: Array, 
                    default: true,
                },

                aspectRatio: {
                    type: Number, 
                    default: 3.23,
                },
            },

            data() {
                return {
                    chart: undefined,
                }
            },

            mounted() {
                this.prepare();
            },

            methods: {
                prepare() {
                    if (this.chart) {
                        this.chart.destroy();
                    }

                    this.chart = new Chart(document.getElementById(this.$.uid + '_chart'), {
                        type: 'line',
                        
                        data: {
                            labels: this.labels,

                            datasets: this.datasets,
                        },
                
                        options: {
                            aspectRatio: this.aspectRatio,
                            
                            plugins: {
                                legend: {
                                    display: false
                                },

                                
                            },
                            
                            scales: {
                                x: {
                                    beginAtZero: true,

                                    border: {
                                        dash: [8, 4],
                                    }
                                },

                                y: {
                                    beginAtZero: true,
                                    border: {
                                        dash: [8, 4],
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\Work\sonya_site\sonya_shop\packages\Webkul\Admin\src/resources/views/components/charts/line.blade.php ENDPATH**/ ?>