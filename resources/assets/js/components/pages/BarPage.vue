<template>
    <div class="container" style="padding-top: 61px;padding-bottom: 45px">
        <bar-chart  :wChange="watchChange" :options="barData1.option" :title="barData1.title" :height="barData1.height" :id="barData1.id"></bar-chart>
        <bar-chart  :wChange="watchChange" :options="barData2.option" :title="barData2.title" :height="barData2.height" :id="barData2.id"></bar-chart>
        <bar-chart  :wChange="watchChange" :options="barData3.option" :title="barData3.title" :height="barData3.height" :id="barData3.id"></bar-chart>
        <bar-chart  :wChange="watchChange" :options="barData4.option" :title="barData4.title" :height="barData4.height" :id="barData4.id"></bar-chart>
        <bar-chart  :wChange="watchChange" :options="barData5.option" :title="barData5.title" :height="barData5.height" :id="barData5.id"></bar-chart>
    </div>
</template>

<script>
    import BarChart from '../BarChart'
    import {pcReg} from '../../service/api'
    import {pcBro} from '../../service/api'
    import {wcReg} from '../../service/api'
    import {wcBro} from '../../service/api'
    import {userAuth} from '../../service/api'

    export default {
        data(){
            return{
                watchChange: null, // 监听变化
                barData1:{
                    height:300,
                    title:'mime平台PC端每日注册量',
                    id:0,
                    option :{
                        xAxis: {
                            data: [],
                            axisTick: {
                                alignWithLabel: true
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                name: 'register',
                                data: [],
                                type: 'bar',
                                barWidth: '50%'
                            }
                        ],
                        tooltip : {
                            trigger: 'axis'
                        }
                    }
                },
                barData2:{
                    height:300,
                    title:'mime平台PC端-Daily Active User',
                    id:1,
                    option:{
                        xAxis: {
                            data: [],
                            axisTick: {
                                alignWithLabel: true
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                name: 'browser',
                                data: [],
                                type: 'bar',
                                barWidth: '50%'
                            }
                        ],
                        tooltip : {
                            trigger: 'axis'
                        }
                    }
                },
                barData3:{
                    height:300,
                    title:'mime平台微信端每日注册人数',
                    id:2,
                    option:{
                        xAxis: {
                            data: [],
                            axisTick: {
                                alignWithLabel: true
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                name: 'register',
                                data: [],
                                type: 'bar',
                                barWidth: '50%'
                            }
                        ],
                        tooltip : {
                            trigger: 'axis'
                        }
                    }
                },
                barData4:{
                    height:300,
                    title:'mime平台微信端-Daily Active User',
                    id:3,
                    option:{
                        xAxis: {
                            data: [],
                            axisTick: {
                                alignWithLabel: true
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                name: 'browser',
                                data: [],
                                type: 'bar',
                                barWidth: '50%'
                            }
                        ],
                        tooltip : {
                            trigger: 'axis'
                        }
                    }
                },
                barData5:{
                    height:300,
                    title:'mime平台用户认证人数',
                    id:4,
                    option:{
                        xAxis: {
                            data: [],
                            axisTick: {
                                alignWithLabel: true
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                name: 'profile',
                                data: [],
                                type: 'bar',
                                barWidth: '50%'
                            }
                        ],
                        tooltip : {
                            trigger: 'axis'
                        }
                    }
                }
            }
        },
        methods: {
            async pcReg () {
                let res = await pcReg('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(data[k])
                }
                this.barData1.option.xAxis.data = arrx;
                this.barData1.option.series[0].data = arr;
                this.watchChange = this.barData1.id;
            },
            async pcBro () {
                let res = await pcBro('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(data[k])
                }
                this.barData2.option.xAxis.data = arrx;
                this.barData2.option.series[0].data = arr;
                this.watchChange = this.barData2.id;
            },
            async wcReg () {
                let res = await wcReg('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(data[k])
                }
                this.barData3.option.xAxis.data = arrx;
                this.barData3.option.series[0].data = arr;
                this.watchChange = this.barData3.id;
            },
            async wcBro () {
                let res = await wcBro('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(data[k])
                }
                this.barData4.option.xAxis.data = arrx;
                this.barData4.option.series[0].data = arr;
                this.watchChange = this.barData4.id;
            },
            async userAuth () {
                let res = await userAuth('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(data[k])
                }
                this.barData5.option.xAxis.data = arrx;
                this.barData5.option.series[0].data = arr;
                this.watchChange = this.barData5.id;
            }
        },
        mounted () {
            this.pcReg();
            this.pcBro();
            this.wcReg();
            this.wcBro();
            this.userAuth()
        },
        components: {BarChart}
    }
</script>

