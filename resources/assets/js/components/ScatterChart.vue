<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{title}}</div>
        <div class="panel-body">
            <div ref="myScatterChart" :style="{'height': height + 'px'}"></div>
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
            return{
                // option:{
                //     xAxis: {},
                //     yAxis: {},
                //     series: [{
                //         symbolSize: 20,
                //         data: [
                //             [10.0, 8.04],
                //             [8.0, 6.95],
                //             [13.0, 7.58],
                //             [9.0, 8.81],
                //             [11.0, 8.33],
                //             [14.0, 9.96],
                //             [6.0, 7.24],
                //             [4.0, 4.26],
                //             [12.0, 10.84],
                //             [7.0, 4.82],
                //             [5.0, 5.68]
                //         ],
                //         type: 'scatter'
                //     }]
                // }
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
        methods:{
            init () {
                let echarts = require('echarts/lib/echarts')
                require('echarts/lib/chart/scatter')
                require('echarts/lib/component/tooltip')
                require('echarts/lib/component/title')

                let scatterChart = echarts.init(this.$refs.myScatterChart);
                scatterChart.setOption(this.options);
                window.onresize = scatterChart.resize();
            }
        }
    }
</script>

<style scoped>
    .bar-chart-list{background: #ccc}
    .bar-chart-list li{padding: 10px;background: #fff;border-bottom: 1px solid #999}
    .bar-chart-list li h4{border-bottom: 1px dotted #ccc;padding-bottom: 10px}
    .bar-chart-list li p{text-align: right}
</style>