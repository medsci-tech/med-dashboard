<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading custom-style-heading">mime平台</div>
                <div class="panel-body custom-style-body">
                    <div class="row">
                        <div class="col-md-6 col-xs-6 bg-success">
                            总认证人数（人）：
                            <p>22222222</p>
                        </div>
                        <div class="col-md-6 col-xs-6 bg-warning">
                            总注册人数（人）：
                            <p>44444444447</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台PC端每日注册量</div>
                <div class="panel-body">
                    <date-time :min="minTime" :max="maxTime"></date-time>
                    <ve-line :data="chartData1" :toolbox="toolbox" :loading="chartData1.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台PC端-Daily Active User</div>
                <div class="panel-body">
                    <ve-line :data="chartData2" :toolbox="toolbox" :loading="chartData2.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台微信端每日注册人数</div>
                <div class="panel-body">
                    <ve-line :data="chartData3" :toolbox="toolbox" :loading="chartData3.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台微信端-Daily Active User</div>
                <div class="panel-body">
                    <ve-line :data="chartData4" :toolbox="toolbox" :loading="chartData4.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台用户认证人数</div>
                <div class="panel-body">
                    <ve-line :data="chartData5" :toolbox="toolbox" :loading="chartData5.loading"></ve-line>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from './common/Header'
    import DateTime from './common/DateTime'
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {pcReg,pcBro,wcReg,wcBro,userAuth} from '../service/api'

    export default {
        data() {
            return {
                minTime: '',
                maxTime: '',
                toolbox: {
                    feature: {
                        magicType: {type: ['line', 'bar']},
                        saveAsImage: {}
                    }
                },
                chartData1: {
                    columns: ['date', 'register'],
                    rows: [],
                    loading: true
                },
                chartData2: {
                    columns: ['date', 'browser'],
                    rows: [],
                    loading: true
                },
                chartData3: {
                    columns: ['date', 'register'],
                    rows: [],
                    loading: true
                },
                chartData4: {
                    columns: ['date', 'browser'],
                    rows: [],
                    loading: true
                },
                chartData5: {
                    columns: ['date', 'profile'],
                    rows: [],
                    loading: true
                }
            }
        },
        watch: {
            chartData1() {
                this.pcReg();
            },
            chartData2() {
                this.pcBro();
            },
            chartData3() {
                this.wcReg();
            },
            chartData4() {
                this.wcBro();
            },
            chartData5() {
                this.userAuth();
            },
        },
        mounted() {
            this.pcReg();
            this.pcBro();
            this.wcReg();
            this.wcBro();
            this.userAuth();
        },
        methods: {
            async pcReg() {
                let res = await pcReg('2018-2-28', '2018-4-30');
                // console.log(res)
                let data = res.data;
                for (let k in data) {
                    this.chartData1.rows.push({
                        "date": k,
                        "register": data[k]
                    });
                };
                this.minTime = this.chartData1.rows[0].date
                // this.maxTime = this.chartData1.rows[this.chartData1.rows.length-1].date
                this.maxTime = this.chartData1.rows.pop().date
                // console.log(this.chartData1.rows.pop().date)
                if (this.chartData1) {
                    this.chartData1.loading = false;
                }
            },
            async pcBro() {
                let res = await pcBro('2018-2-28', '2018-4-30');
                // console.log(res);
                let data = res.data;
                for (let k in data) {
                    this.chartData2.rows.push({
                        'date': k,
                        'browser': data[k]
                    })
                }
                ;
                if (this.chartData2) {
                    this.chartData2.loading = false;
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
                    })
                }
                ;
                if (this.chartData3) {
                    this.chartData3.loading = false;
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
                    })
                }
                ;
                if (this.chartData4) {
                    this.chartData4.loading = false;
                }
            },
            async userAuth() {
                let res = await userAuth('2018-2-28', '2018-4-30');
                // console.log(res);
                let data = res.data;
                for (let k in data) {
                    this.chartData5.rows.push({
                        'date': k,
                        'profile': data[k]
                    })
                }
                ;
                if (this.chartData5) {
                    this.chartData5.loading = false;
                }
            }
        },
        components: {Header,DateTime}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
    .custom-style-heading{background-color:#ff4949;font-size:22px;color:#fff}
    .custom-style-body{padding:0 15px;}
    .custom-style-body .row{height:100px}
    .custom-style-body .col-md-6{height:100%;padding:20px 15px;}
    .custom-style-body .col-md-6 p{color:#aa0f0f;margin:5px 0 0 10px;font-size:28px;font-weight:500;overflow:hidden}
</style>
