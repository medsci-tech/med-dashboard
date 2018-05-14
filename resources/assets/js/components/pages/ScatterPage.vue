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
                scatterData1:{
                    height:300,
                    title:'mime平台PC端每日注册量',
                    id:0,
                    option :{
                        xAxis: {
                            data:[],
                            splitLine: {
                                lineStyle: {
                                    type: 'dashed'
                                }
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                data: [],
                                type: 'scatter'
                            }
                        ],
                        tooltip: {
                            trigger: 'item',
                            axisPointer: {
                                type: 'cross'
                            }
                        }
                    }
                },
                scatterData2:{
                    height:300,
                    title:'mime平台PC端-Daily Active User',
                    id:1,
                    option:{
                        xAxis: {
                            data: [],
                            splitLine: {
                                lineStyle: {
                                    type: 'dashed'
                                }
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                data:[],
                                type:'scatter'
                            }
                        ],
                        tooltip: {
                            trigger: 'item',
                            axisPointer: {
                                type: 'cross'
                            }
                        }
                    }
                },
                scatterData3:{
                    height:300,
                    title:'mime平台微信端每日注册人数',
                    id:2,
                    option:{
                        xAxis: {
                            data: [],
                            splitLine: {
                                lineStyle: {
                                    type: 'dashed'
                                }
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                type:'scatter',
                                data:[]
                            }
                        ],
                        tooltip: {
                            trigger: 'item',
                            axisPointer: {
                                type: 'cross'
                            }
                        }
                    }
                },
                scatterData4:{
                    height:300,
                    title:'mime平台微信端-Daily Active User',
                    id:3,
                    option:{
                        xAxis: {
                            data: [],
                            splitLine: {
                                lineStyle: {
                                    type: 'dashed'
                                }
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                type:'scatter',
                                data:[]
                            }
                        ],
                        tooltip: {
                            trigger: 'item',
                            axisPointer: {
                                type: 'cross'
                            }
                        }
                    }
                },
                scatterData5:{
                    height:300,
                    title:'mime平台用户认证人数',
                    id:4,
                    option:{
                        xAxis: {
                            data: [],
                            splitLine: {
                                lineStyle: {
                                    type: 'dashed'
                                }
                            }
                        },
                        yAxis: {},
                        series: [
                            {
                                type:'scatter',
                                data:[]
                            }
                        ],
                        tooltip: {
                            trigger: 'item',
                            axisPointer: {
                                type: 'cross'
                            }
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
                    arr.push(
                        [data[k], data[k]]
                    );
                }
                this.scatterData1.option.xAxis.data = arrx;
                this.scatterData1.option.series[0].data = arr;
                this.watchChange = this.scatterData1.id;
            },
            async pcBro () {
                let res = await pcBro('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(
                        [data[k], data[k]]
                    );
                }
                this.scatterData2.option.xAxis.data = arrx;
                this.scatterData2.option.series[0].data = arr;
                this.watchChange = this.scatterData2.id;
            },
            async wcReg () {
                let res = await wcReg('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(
                        [data[k], data[k]]
                    );
                }
                this.scatterData3.option.xAxis.data = arrx;
                this.scatterData3.option.series[0].data = arr;
                this.watchChange = this.scatterData3.id;
            },
            async wcBro () {
                let res = await wcBro('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(
                        [data[k], data[k]]
                    );
                }
                this.scatterData4.option.xAxis.data = arrx;
                this.scatterData4.option.series[0].data = arr;
                this.watchChange = this.scatterData4.id;
            },
            async userAuth () {
                let res = await userAuth('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arrx = [];
                let arr = [];
                for(let k in data){
                    arrx.push(k);
                    arr.push(
                        [data[k], data[k]]
                    );
                }
                this.scatterData5.option.xAxis.data = arrx;
                this.scatterData5.option.series[0].data = arr;
                this.watchChange = this.scatterData5.id;
            }
        },
        mounted () {
            this.pcReg();
            this.pcBro();
            this.wcReg();
            this.wcBro();
            this.userAuth()
        },
        components: {ScatterChart}
    }
</script>

