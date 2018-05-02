<template>
    <div class="container" style="padding-top: 61px;padding-bottom: 45px">
        <line-chart  :wChange="watchChange" :options="lineData1.option" :title="lineData1.title" :height="lineData1.height" :id="lineData1.id"></line-chart>
        <line-chart  :wChange="watchChange" :options="lineData2.option" :title="lineData2.title" :height="lineData2.height" :id="lineData2.id"></line-chart>
        <line-chart  :wChange="watchChange" :options="lineData3.option" :title="lineData3.title" :height="lineData3.height" :id="lineData3.id"></line-chart>
        <line-chart  :wChange="watchChange" :options="lineData4.option" :title="lineData4.title" :height="lineData4.height" :id="lineData4.id"></line-chart>
        <line-chart  :wChange="watchChange" :options="lineData5.option" :title="lineData5.title" :height="lineData5.height" :id="lineData5.id"></line-chart>
    </div>
</template>

<script>
    import LineChart from '../LineChart'
    import {pcReg} from '../../service/api'
    import {pcBro} from '../../service/api'
    import {wcReg} from '../../service/api'
    import {wcBro} from '../../service/api'
    import {userAuth} from '../../service/api'

    export default {
        data(){
            return{
                watchChange: null, // 监听变化
                lineData1:{
                    height:300,
                    title:'mime平台PC端每日注册量',
                    id:0,
                    option :{
                        xAxis: {
                            data: []
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [{
                            data: [],
                            type: 'line'
                        }]
                    }
                },
                lineData2:{
                    height:300,
                    title:'mime平台PC端每日浏览量',
                    id:1,
                    option:{
                        xAxis: {
                            data: []
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                data:[],
                                type:'line'
                            }
                        ]
                    }
                },
                lineData3:{
                    height:300,
                    title:'mime平台微信端每日注册人数',
                    id:2,
                    option:{
                        xAxis: {
                            data: []
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                type:'line',
                                data:[]
                            }
                        ]
                    }
                },
                lineData4:{
                    height:300,
                    title:'mime平台微信端每日浏览人数',
                    id:3,
                    option:{
                        xAxis: {
                            data: []
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                type:'line',
                                data:[]
                            }
                        ]
                    }
                },
                lineData5:{
                    height:300,
                    title:'mime平台用户认证人数',
                    id:4,
                    option:{
                        xAxis: {
                            data: []
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                type:'line',
                                data:[]
                            }
                        ]
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
                this.lineData1.option.xAxis.data = arrx;
                this.lineData1.option.series[0].data = arr;
                this.watchChange = this.lineData1.id;
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
                this.lineData2.option.xAxis.data = arrx;
                this.lineData2.option.series[0].data = arr;
                this.watchChange = this.lineData2.id;
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
                this.lineData3.option.xAxis.data = arrx;
                this.lineData3.option.series[0].data = arr;
                this.watchChange = this.lineData3.id;
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
                this.lineData4.option.xAxis.data = arrx;
                this.lineData4.option.series[0].data = arr;
                this.watchChange = this.lineData4.id;
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
                this.lineData5.option.xAxis.data = arrx;
                this.lineData5.option.series[0].data = arr;
                this.watchChange = this.lineData5.id;
            }
        },
        mounted () {
            this.pcReg();
            this.pcBro();
            this.wcReg();
            this.wcBro();
            this.userAuth()
        },
        components: {LineChart}
    }
</script>

