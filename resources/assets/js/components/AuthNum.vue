<template>
    <div>
        <Header></Header>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">mime平台用户认证人数</div>
                <div class="panel-body">
                    <date-time5 :min="minTime" :max="maxTime"  @getTime5="getDate5"></date-time5>
                    <ve-line :data="chartData5" :toolbox="toolbox" :loading="loading"></ve-line>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from './common/Header'
    import DateTime5 from './common/DateTime5'
    //使用loading属性需引入css
    import 'v-charts/lib/style.css'
    //使用工具箱需引入对应模块
    import 'echarts/lib/component/toolbox'
    import {userAuth} from '../service/api'

    export default {
        data() {
            return {
                arrList5: [],
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
                chartData5: {
                    columns: ['date', 'profile'],
                    rows: []
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
            getDate5(date) {
                this.chartData5.rows = this.arrList5.filter((v) => {
                    return v.date >= date[0] && v.date <= date[1];
                });
            },
            async userAuth() {
                let nowDate = new Date();
                let localDate = nowDate.toLocaleDateString();
                let strArr = localDate.split("/").join('-');
                let res = await userAuth('2018-2-28', strArr);
                let data = res.data;
                for (let k in data) {
                    this.chartData5.rows.push({
                        'date': k,
                        'profile': data[k]
                    });
                    this.arrList5.push({
                        "date": k,
                        "profile": data[k]
                    })
                };
                this.minTime = this.chartData5.rows[0].date;
                this.maxTime = this.chartData5.rows.pop().date;
                if (this.chartData5) {
                    this.loading = false;
                }
            }
        },
        components: {Header,DateTime5}
    }
</script>

<style scoped>
    .container {
        padding-top: 61px;
    }
</style>
