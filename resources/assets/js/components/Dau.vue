<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">mime平台-Daily Active User</div>
                <div class="panel-body">
                    <date-time2 :min="minTime" :max="maxTime" @getTime2="getDate2"></date-time2>
                    <ve-line :data="chartData2" :toolbox="toolbox" :loading="loading"></ve-line>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from './common/Header'
    import DateTime2 from './common/DateTime2'
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {pcBro,wcBro} from "../service/api"

    export default {
        data() {
            return {
                arrList2: [],
                toolbox: {
                    feature: {
                        // magicType: {type: ['line', 'bar']},
                        saveAsImage: {}
                    }
                },
                loading: true,
                minTime: '',
                maxTime: '',
                chartData2: {
                    columns: ['date', 'pc-dau','wc-dau'],
                    rows: []
                }
            }
        },
        watch: {
            chartData2() {
                this.dau();
            }
        },
        mounted() {
            this.dau();
        },
        methods: {
            getDate2(date) {
                this.chartData2.rows = this.arrList2.filter((v) => {
                    return v.date >= date[0] && v.date <= date[1];
                });
            },
            async dau() {
                let nowDate = new Date();
                let localDate = nowDate.toLocaleDateString();
                let strArr = localDate.split("/").join('-');
                let pcRes = await pcBro('2018-2-28', strArr);
                let wcRes = await wcBro('2018-2-28', strArr);
                let pcData = pcRes.data;
                let wcData = wcRes.data;
                let chartArr = this.chartData2.rows;
                for(let k in pcData){
                    chartArr.push({
                        'date': k,
                        'pc-dau': pcData[k]
                    });
                    this.arrList2.push({
                        'date': k,
                        'pc-dau': pcData[k]
                    })
                };
                let addChartData = [];
                for(let k in wcData){
                    addChartData.push(wcData[k]);
                    for(let i = 0;i<= chartArr.length -1;i++){
                        chartArr[i]['wc-dau'] = addChartData[i];
                        this.arrList2[i]['wc-dau'] = addChartData[i]
                    }
                };
                this.minTime = chartArr[0].date;
                this.maxTime = chartArr.pop().date;
                if (this.chartData2) {
                    this.loading = false;
                }
            }
        },
        components: {Header,DateTime2}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
</style>
