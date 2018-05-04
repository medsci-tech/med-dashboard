<template>
     <div class="panel panel-default">
        <div class="panel-heading">{{title}}</div>
        <div class="panel-body">
            <div ref="myLineChart" :style="{'height': height + 'px'}"></div>
        </div>
    </div>
</template>

<script>


    export default {
        data () {
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
            go(path) {
                this.$router.push(path)
            },
            init(){
                let echarts = require('echarts/lib/echarts');
                require('echarts/lib/chart/line');
                require('echarts/lib/component/tooltip');
                require('echarts/lib/component/title');
                //初始化图表
                let lineChart = echarts.init(this.$refs.myLineChart);
                //加载中
                lineChart.showLoading();
                if (this.wChange) {
                    lineChart.hideLoading();
                }
                //绘制图表
                lineChart.setOption(this.options);
                //图表自适应
                window.addEventListener('resize',function () {
                    lineChart.resize();
                })
            }
        }
    }
</script>
