<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">mime平台PC端-Daily Active User</div>
                <div class="panel-body">
                    <ve-line :data="chartData2" :toolbox="toolbox" :loading="chartData2.loading"></ve-line>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">mime平台微信端-Daily Active User</div>
                <div class="panel-body">
                    <ve-line :data="chartData4" :toolbox="toolbox" :loading="chartData4.loading"></ve-line>
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
    import {pcBro,wcBro} from "../service/api"

    export default {
        data() {
            return {
                toolbox: {
                    feature: {
                        magicType: {type: ['line', 'bar']},
                        saveAsImage: {}
                    }
                },
                chartData2: {
                    columns: ['date', 'browser'],
                    rows: [],
                    loading: true
                },
                chartData4: {
                    columns: ['date', 'browser'],
                    rows: [],
                    loading: true
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
