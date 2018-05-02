<template>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">{{brandInfo}}</a>
                <button class="navbar-toggle collapsed"  type="button" data-toggle="collapse" data-target="#navSub">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navSub">
                <ul class="nav navbar-nav navbar-right">
                    <li v-for="(item, index) in items" >
                        <a :class="{'active': index === nubm}" href="javascript:;" @click="go(item.path,index);nubm=index">{{item.title}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        data(){
            return{
                // flag: true,
                nubm: 0,
                brandInfo:'Echarts',
                items:[
                    {title:'线型图', path: '/'},
                    {title:'柱状图', path: '/BarChart'},
                    {title:'饼状图', path: '/PieChart'},
                    {title:'散点图', path: '/ScatterChart'}
                ]
            }
        },
        methods: {
            go (path,index) {
                this.$router.push(path);
                $(".navbar-collapse").removeClass("in").attr("aria-expand","false");
                // this.flag = !this.flag;
                sessionStorage.setItem('index', index)
            }
        },
        mounted () {
            let path = sessionStorage.getItem('index')
            if (path) {
                this.nubm = parseInt(path);
            }
        }
    }
</script>

<style scoped>
    /*.height {transition:all .3s;height:1px;overflow:hidden}*/
    /*.heightAuto {transition:all .3s;height:176px;overflow:hidden}*/
    .active {background-color:#333;color:#fff!important;}
    .navbar-toggle{
        margin-right: 0!important;
    }
</style>