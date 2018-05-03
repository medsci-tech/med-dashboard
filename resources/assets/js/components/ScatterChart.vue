<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{title}}</div>
        <div class="panel-body">
            <div ref="myScatterChart" :style="{'height': height + 'px','width': '100%'}"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
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
        data () {
            return{}
        },
        watch: {
            wChange () {
                this.init();
            }
        },
        mounted () {
            this.init();
        },
        methods:{
            init () {
                let echarts = require('echarts/lib/echarts')
                require('echarts/lib/chart/scatter')
                require('echarts/lib/component/tooltip')
                require('echarts/lib/component/title')

                let scatterChart = echarts.init(this.$refs.myScatterChart);
                scatterChart.showLoading();
                if(this.wChange){
                    scatterChart.hideLoading();
                }
                scatterChart.setOption(this.options);
                window.addEventListener('resize', function () {
                    scatterChart.resize();
                });
            }
        }
    }
</script>

<style scoped>
    .panel-body, .panel-default {width:100%}
</style>