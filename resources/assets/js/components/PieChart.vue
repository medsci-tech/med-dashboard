<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{title}}</div>
        <div class="panel-body">
            <div ref="myPieChart" :style="{'height': height + 'px'}"></div>
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
        watch:{
            wChange () {
                this.init();
            }
        },
        mounted(){
            this.init();
        },
        data(){
            return{ }
        },
        methods:{
            init () {
                let echarts = require('echarts/lib/echarts');
                require('echarts/lib/chart/pie');
                require('echarts/lib/component/tooltip');
                require('echarts/lib/component/title');

                let pieChart = echarts.init(this.$refs.myPieChart);

                pieChart.showLoading();
                if(this.wChange){
                    pieChart.hideLoading()
                };
                pieChart.setOption(this.options);
                window.addEventListener('resize',function(){
                    pieChart.resize();
                })
            }
        }
    }
</script>

<style scoped>
</style>