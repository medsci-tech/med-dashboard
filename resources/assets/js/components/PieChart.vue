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
            return{
                // option:{
                //     title : {
                //         text: '某站点用户访问来源',
                //         subtext: '纯属虚构',
                //         x:'center'
                //     },
                //     tooltip : {
                //         trigger: 'item',
                //         formatter: "{a} <br/>{b} : {c} ({d}%)"
                //     },
                //     legend: {
                //         orient: 'vertical',
                //         left: 'left',
                //         data: ['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
                //     },
                //     series : [
                //         {
                //             name: '访问来源',
                //             type: 'pie',
                //             radius : '55%',
                //             center: ['50%', '60%'],
                //             data:[
                //                 {value:335, name:'直接访问'},
                //                 {value:310, name:'邮件营销'},
                //                 {value:234, name:'联盟广告'},
                //                 {value:135, name:'视频广告'},
                //                 {value:1548, name:'搜索引擎'}
                //             ],
                //             itemStyle: {
                //                 emphasis: {
                //                     shadowBlur: 10,
                //                     shadowOffsetX: 0,
                //                     shadowColor: 'rgba(0, 0, 0, 0.5)'
                //                 }
                //             }
                //         }
                //     ]
                // }
            }
        },
        methods:{
            init () {
                let echarts = require('echarts/lib/echarts');
                require('echarts/lib/chart/pie');
                require('echarts/lib/component/tooltip');
                require('echarts/lib/component/title');

                let pieChart = echarts.init(this.$refs.myPieChart);
                pieChart.setOption(this.options);
                window.onresize = pieChart.resize();
            }
        }
    }
</script>

<style scoped>
</style>