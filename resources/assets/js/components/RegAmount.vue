<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">mime平台PC端每日注册量</div>
                <div class="panel-body">
                    <ve-line :data="chartData1" :toolbox="toolbox" :loading="chartData1.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台微信端每日注册人数</div>
                <div class="panel-body">
                    <ve-line :data="chartData3" :toolbox="toolbox" :loading="chartData3.loading"></ve-line>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from './common/Header'
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {pcReg,wcReg} from '../service/api'

    export default {
        data() {
            return {
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
                chartData3: {
                    columns: ['date', 'register'],
                    rows: [],
                    loading: true
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
            async pcReg() {
                let res = await pcReg('2018-2-28', '2018-4-30');
                // console.log(res)
                let data = res.data;
                for (let k in data) {
                    this.chartData1.rows.push({
                        "date": k,
                        "register": data[k]
                    })
                };
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
                    })
                };
                if (this.chartData3) {
                    this.chartData3.loading = false;
                }
            }
        },
        components: {Header}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
</style>
