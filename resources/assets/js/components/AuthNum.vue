<template>
    <div>
        <Header></Header>
        <div class="container">
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
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {userAuth} from '../service/api'

    export default {
        data() {
            return {
                toolbox: {
                    feature: {
                        magicType: {type: ['line', 'bar']},
                        saveAsImage: {}
                    }
                },
                chartData5: {
                    columns: ['date', 'profile'],
                    rows: [],
                    loading: true
                }
            }
        },
        watch: {
            chartData5() {
                this.userAuth();
            },
        },
        mounted() {
            this.userAuth();
        },
        methods: {
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
        components: {Header}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
</style>
