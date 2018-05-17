<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">mime平台每日注册量</div>
                <div class="panel-body">
                    <date-time1 :min="minTime" :max="maxTime" @getTime1="getDate1"></date-time1>
                    <ve-line :data="chartData1" :toolbox="toolbox" :loading="loading"></ve-line>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from './common/Header'
    import DateTime1 from './common/DateTime1'
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {pcReg,wcReg} from '../service/api'

    export default {
        data() {
            return {
                arrList1: [],
                toolbox: {
                    feature: {
                        magicType: {type: ['line', 'bar']},
                        saveAsImage: {}
                    },
                    y:'bottom'
                },
                loading: true,
                minTime: '',
                maxTime: '',
                chartData1: {
                    columns: ['date', 'pc-register','wc-register'],
                    rows: []
                }
            }
        },
        watch: {
            chartData1() {
                this.reg();
            },
        },
        mounted() {
            this.reg();
        },
        methods: {
            getDate1(date) {
                this.chartData1.rows = this.arrList1.filter((v) => {
                    return v.date >= date[0] && v.date <= date[1];
                });
            },
            async reg() {
                let nowDate = new Date();
                let localDate = nowDate.toLocaleDateString();
                let strArr = localDate.split("/").join('-');
                let pcRes = await pcReg('2018-2-28', strArr);
                let wcRes = await wcReg('2018-2-28', strArr);
                let pcData = pcRes.data;
                let wcData = wcRes.data;
                let chartArr = this.chartData1.rows;
                for(let k in pcData){
                    chartArr.push({
                        'date': k,
                        'pc-register': pcData[k]
                    });
                    this.arrList1.push({
                        'date': k,
                        'pc-register': pcData[k]
                    })
                };
                let addChartData = [];
                for(let k in wcData){
                    addChartData.push(wcData[k]);
                    for(let i = 0;i<= chartArr.length -1;i++){
                        chartArr[i]['wc-register'] = addChartData[i];
                        this.arrList1[i]['wc-register'] = addChartData[i]
                    }
                };
                this.minTime = chartArr[0].date;
                this.maxTime = chartArr.pop().date;
                if (this.chartData1) {
                    this.loading = false;
                }
            }
        },
        components: {Header,DateTime1}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
</style>
