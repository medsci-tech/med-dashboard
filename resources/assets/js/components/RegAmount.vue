<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">mime平台PC端每日注册量</div>
                <div class="panel-body">
                    <date-time1 :min="chartData1.minTime" :max="chartData1.maxTime"  @getTime1="getDate1"></date-time1>
                    <ve-line :data="chartData1" :toolbox="toolbox" :loading="chartData1.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台微信端每日注册人数</div>
                <div class="panel-body">
                    <date-time3 :min="chartData3.minTime" :max="chartData3.maxTime"  @getTime3="getDate3"></date-time3>
                    <ve-line :data="chartData3" :toolbox="toolbox" :loading="chartData3.loading"></ve-line>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from './common/Header'
    import DateTime1 from './common/DateTime1'
    import DateTime3 from './common/DateTime3'
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {pcReg,wcReg} from '../service/api'

    export default {
        data() {
            return {
                arrList1: [],
                arrList3: [],
                toolbox: {
                    feature: {
                        magicType: {type: ['line', 'bar']},
                        saveAsImage: {}
                    }
                },
                chartData1: {
                    columns: ['date', 'register'],
                    rows: [],
                    loading: true,
                    minTime: '',
                    maxTime: ''
                },
                chartData3: {
                    columns: ['date', 'register'],
                    rows: [],
                    loading: true,
                    minTime: '',
                    maxTime: ''
                }
            }
        },
        watch: {
            chartData1() {
                this.pcReg();
            },
            chartData3() {
                this.wcReg();
            }
        },
        mounted() {
            this.pcReg();
            this.wcReg();
        },
        methods: {
            getDate1(date) {
                // console.log(date)
                this.chartData1.rows = this.arrList1.filter((v) => {
                    return v.date >= date[0] && v.date <= date[1];
                });
            },
            getDate3(date) {
                this.chartData3.rows = this.arrList3.filter((v) => {
                    return v.date >= date[0] && v.date <= date[1];
                });
            },
            async pcReg() {
                let res = await pcReg('2018-2-28', '2018-4-30');
                // console.log(res)
                let data = res.data;
                for (let k in data) {
                    this.chartData1.rows.push({
                        "date": k,
                        "register": data[k]
                    });
                    this.arrList1.push({
                        "date": k,
                        "register": data[k]
                    })
                };
                this.chartData1.minTime = this.chartData1.rows[0].date;
                this.chartData1.maxTime = this.chartData1.rows.pop().date;
                if (this.chartData1) {
                    this.chartData1.loading = false;
                }
            },
            async wcReg() {
                let res = await wcReg('2018-2-28', '2018-4-30');
                // console.log(res);
                let data = res.data;
                for (let k in data) {
                    this.chartData3.rows.push({
                        'date': k,
                        'register': data[k]
                    });
                    this.arrList3.push({
                        "date": k,
                        "register": data[k]
                    })
                };
                this.chartData3.minTime = this.chartData3.rows[0].date;
                this.chartData3.maxTime = this.chartData3.rows.pop().date;
                if (this.chartData3) {
                    this.chartData3.loading = false;
                }
            }
        },
        components: {Header,DateTime1,DateTime3}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
</style>
