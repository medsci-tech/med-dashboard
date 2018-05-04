<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{title}}</div>
        <div class="panel-body">
            <div ref="myBarChart" :style="{'height': height + 'px'}"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{}
        },
        props: {
            options: {
                type: Object
            },
            title: {
                default: '首页'
            },
            height: {
                request: true
            },
            id: {
                type: Number
            },
            wChange: {
                request: true
            }
        },
        watch: {
            wChange () {
                this.init();
            }
        },
        mounted () {
            this.init();
        },
        methods: {
            init () {
                let echarts = require('echarts/lib/echarts');
                require('echarts/lib/chart/bar');
                require('echarts/lib/component/tooltip');
                require('echarts/lib/component/title');

                let barChart = echarts.init(this.$refs.myBarChart);
                //加载中
                barChart.showLoading();
                if (this.wChange) {
                    barChart.hideLoading();
                };
                barChart.setOption(this.options);
                window.addEventListener('resize',function(){
                    barChart.resize();
                })
            }
        }
    }
</script>
