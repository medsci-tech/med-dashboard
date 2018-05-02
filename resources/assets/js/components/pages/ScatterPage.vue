<template>
    <div class="container" style="padding-top: 61px;padding-bottom: 45px">
        <scatter-chart  :wChange="watchChange" :options="scatterData1.option" :title="scatterData1.title" :height="scatterData1.height" :id="scatterData1.id"></scatter-chart>
        <scatter-chart  :wChange="watchChange" :options="scatterData2.option" :title="scatterData2.title" :height="scatterData2.height" :id="scatterData2.id"></scatter-chart>
        <scatter-chart  :wChange="watchChange" :options="scatterData3.option" :title="scatterData3.title" :height="scatterData3.height" :id="scatterData3.id"></scatter-chart>
        <scatter-chart  :wChange="watchChange" :options="scatterData4.option" :title="scatterData4.title" :height="scatterData4.height" :id="scatterData4.id"></scatter-chart>
        <scatter-chart  :wChange="watchChange" :options="scatterData5.option" :title="scatterData5.title" :height="scatterData5.height" :id="scatterData5.id"></scatter-chart>
    </div>
</template>

<script>
    import ScatterChart from '../ScatterChart'
    import {pcReg} from '../../service/api'
    import {pcBro} from '../../service/api'
    import {wcReg} from '../../service/api'
    import {wcBro} from '../../service/api'
    import {userAuth} from '../../service/api'

    export default {
        data(){
            return{
                watchChange: null, // 监听变化
                option:{
                    xAxis: {},
                    yAxis: {},
                    series: [{
                        symbolSize: 20,
                        data: [
                            [10.0, 8.04],
                            [8.0, 6.95],
                            [13.0, 7.58],
                            [9.0, 8.81],
                            [11.0, 8.33],
                            [14.0, 9.96],
                            [6.0, 7.24],
                            [4.0, 4.26],
                            [12.0, 10.84],
                            [7.0, 4.82],
                            [5.0, 5.68]
                        ],
                        type: 'scatter'
                    }]
                },
                scatterData1:{
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
                            type: 'bar'
                        }]
                    }
                },
                scatterData2:{
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
                                type:'bar'
                            }
                        ]
                    }
                },
                scatterData3:{
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
                                type:'bar',
                                data:[]
                            }
                        ]
                    }
                },
                scatterData4:{
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
                                type:'bar',
                                data:[]
                            }
                        ]
                    }
                },
                scatterData5:{
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
                                type:'bar',
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

