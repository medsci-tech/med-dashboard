<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">mime平台PC端-Daily Active User</div>
                <div class="panel-body">
                    <date-time2 :min="chartData2.minTime" :max="chartData2.maxTime"  @getTime2="getDate2"></date-time2>
                    <ve-line :data="chartData2" :toolbox="toolbox" :loading="chartData2.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台微信端-Daily Active User</div>
                <div class="panel-body">
                    <date-time4 :min="chartData4.minTime" :max="chartData4.maxTime"  @getTime4="getDate4"></date-time4>
                    <ve-line :data="chartData4" :toolbox="toolbox" :loading="chartData4.loading"></ve-line>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from './common/Header'
    import DateTime2 from './common/DateTime2'
    import DateTime4 from './common/DateTime4'
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {pcBro,wcBro} from "../service/api"

    export default {
        data() {
            return {
                arrList2: [],
                arrList4: [],
                toolbox: {
                    feature: {
                        magicType: {type: ['line', 'bar']},
                        saveAsImage: {}
                    }
                },
                chartData2: {
                    columns: ['date', 'browser'],
                    rows: [],
                    loading: true,
                    minTime: '',
                    maxTime: ''
                },
                chartData4: {
                    columns: ['date', 'browser'],
                    rows: [],
                    loading: true,
                    minTime: '',
                    maxTime: ''
                }
            }
        },
        watch: {
            chartData2() {
                this.pcBro();
            },
            chartData4() {
                this.wcBro();
            }
        },
        mounted() {
            this.pcBro();
            this.wcBro();
        },
        methods: {
            getDate2(date) {
                this.chartData2.rows = this.arrList2.filter((v) => {
                    return v.date >= date[0] && v.date <= date[1];
                });
            },
            getDate4(date) {
                this.chartData4.rows = this.arrList4.filter((v) => {
                    return v.date >= date[0] && v.date <= date[1];
                });
            },
            async pcBro() {
                let res = await pcBro('2018-2-28', '2018-4-30');
                // console.log(res);
                let data = res.data;
                for (let k in data) {
                    this.chartData2.rows.push({
                        'date': k,
                        'browser': data[k]
                    });
                    this.arrList2.push({
                        "date": k,
                        "browser": data[k]
                    })
                };
                this.chartData2.minTime = this.chartData2.rows[0].date;
                this.chartData2.maxTime = this.chartData2.rows.pop().date;
                if (this.chartData2) {
                    this.chartData2.loading = false;
                }
            },
            async wcBro() {
                let res = await wcBro('2018-2-28', '2018-4-30');
                // console.log(res);
                let data = res.data;
                for (let k in data) {
                    this.chartData4.rows.push({
                        'date': k,
                        'browser': data[k]
                    });
                    this.arrList4.push({
                        "date": k,
                        "browser": data[k]
                    })
                };
                this.chartData4.minTime = this.chartData4.rows[0].date;
                this.chartData4.maxTime = this.chartData4.rows.pop().date;
                if (this.chartData4) {
                    this.chartData4.loading = false;
                }
            }
        },
        components: {Header,DateTime2,DateTime4}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
</style>
