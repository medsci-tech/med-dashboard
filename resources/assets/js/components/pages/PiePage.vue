<template>
    <div class="container" style="padding-top: 61px;padding-bottom: 45px">
        <pie-chart  :wChange="watchChange" :options="pieData1.option" :title="pieData1.title" :height="pieData1.height" :id="pieData1.id"></pie-chart>
        <pie-chart  :wChange="watchChange" :options="pieData2.option" :title="pieData2.title" :height="pieData2.height" :id="pieData2.id"></pie-chart>
        <pie-chart  :wChange="watchChange" :options="pieData3.option" :title="pieData3.title" :height="pieData3.height" :id="pieData3.id"></pie-chart>
        <pie-chart  :wChange="watchChange" :options="pieData4.option" :title="pieData4.title" :height="pieData4.height" :id="pieData4.id"></pie-chart>
        <pie-chart  :wChange="watchChange" :options="pieData5.option" :title="pieData5.title" :height="pieData5.height" :id="pieData5.id"></pie-chart>
    </div>
</template>

<script>
    import PieChart from '../PieChart'
    import {pcReg} from '../../service/api'
    import {pcBro} from '../../service/api'
    import {wcReg} from '../../service/api'
    import {wcBro} from '../../service/api'
    import {userAuth} from '../../service/api'

    export default {
        data(){
            return{
                watchChange: null, // 监听变化
                pieData1:{
                    height:300,
                    title:'mime平台PC端每日注册量',
                    id:0,
                    option :{
                        series : [
                            {
                                name: 'register',
                                type: 'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[],
                                itemStyle: {
                                    emphasis: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip : {
                            trigger: 'item',
                            formatter: "{a} <br/>{b} : {c} ({d}%)"
                        }
                    }
                },
                pieData2:{
                    height:300,
                    title:'mime平台PC端-Daily Active User',
                    id:1,
                    option :{
                        series : [
                            {
                                name: 'browser',
                                type: 'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[],
                                itemStyle: {
                                    emphasis: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip : {
                            trigger: 'item',
                            formatter: "{a} <br/>{b} : {c} ({d}%)"
                        }
                    }
                },
                pieData3:{
                    height:300,
                    title:'mime平台微信端每日注册人数',
                    id:2,
                    option :{
                        series : [
                            {
                                name: 'register',
                                type: 'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[],
                                itemStyle: {
                                    emphasis: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip : {
                            trigger: 'item',
                            formatter: "{a} <br/>{b} : {c} ({d}%)"
                        }
                    }
                },
                pieData4:{
                    height:300,
                    title:'mime平台微信端-Daily Active User',
                    id:3,
                    option :{
                        series : [
                            {
                                name: 'browser',
                                type: 'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[],
                                itemStyle: {
                                    emphasis: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip : {
                            trigger: 'item',
                            formatter: "{a} <br/>{b} : {c} ({d}%)"
                        }
                    }
                },
                pieData5:{
                    height:300,
                    title:'mime平台用户认证人数',
                    id:4,
                    option :{
                        series : [
                            {
                                name: 'profile',
                                type: 'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[],
                                itemStyle: {
                                    emphasis: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip : {
                            trigger: 'item',
                            formatter: "{a} <br/>{b} : {c} ({d}%)"
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
                let arr = [];
                for(let k in data){
                    arr.push({
                        value: data[k],
                        name: k
                    })
                };
                this.pieData1.option.series[0].data = arr;
                this.pieData1.option.series[0].data = this.pieData1.option.series[0].data.filter((v)=>{
                    return v.value > 0;
                });
                this.watchChange = this.pieData1.id;
            },
            async pcBro () {
                let res = await pcBro('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arr = [];
                for(let k in data){
                    arr.push({
                        value: data[k],
                        name: k
                    })
                };
                this.pieData2.option.series[0].data = arr;
                this.pieData2.option.series[0].data = this.pieData2.option.series[0].data.filter((v)=>{
                    return v.value > 0;
                });
                this.watchChange = this.pieData2.id;
            },
            async wcReg () {
                let res = await wcReg('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arr = [];
                for(let k in data){
                    arr.push({
                        value: data[k],
                        name:k
                    })
                };
                this.pieData3.option.series[0].data = arr;
                this.pieData3.option.series[0].data = this.pieData3.option.series[0].data.filter((v)=>{
                    return v.value > 0;
                });
                this.watchChange = this.pieData3.id;
            },
            async wcBro () {
                let res = await wcBro('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arr = [];
                for(let k in data){
                    arr.push({
                        value: data[k],
                        name:k
                    })
                };
                this.pieData4.option.series[0].data = arr;
                this.pieData4.option.series[0].data = this.pieData4.option.series[0].data.filter((v)=>{
                    return v.value > 0;
                });
                this.watchChange = this.pieData4.id;
            },
            async userAuth () {
                let res = await userAuth('2018-2-28', '2018-4-30');
                // console.log(res.data);
                let data = res.data;
                let arr = [];
                for(let k in data){
                    arr.push({
                        value: data[k],
                        name:k
                    })
                };
                this.pieData5.option.series[0].data = arr;
                    this.pieData5.option.series[0].data = this.pieData5.option.series[0].data.filter((v)=>{
                    return v.value > 0;
                });
                this.watchChange = this.pieData5.id;
            }
        },
        mounted () {
            this.pcReg();
            this.pcBro();
            this.wcReg();
            this.wcBro();
            this.userAuth()
        },
        components: {PieChart}
    }
</script>

