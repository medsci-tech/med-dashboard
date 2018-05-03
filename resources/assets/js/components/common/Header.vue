<template>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">{{brandInfo}}</a>
                <button class="navbar-toggle collapsed"  type="button" data-toggle="collapse" data-target="#navSub">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navSub">
                <ul class="nav navbar-nav navbar-right">
                    <li v-for="(item, index) in navItem" >
                        <a :class="{'active': index === num}" href="javascript:;" @click="go(item.path,index);num=index">{{item.title}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        data () {
            return {
                brandInfo: '蚂蚁仪表盘',
                navItem: [
                    {title: '首页', path: '/'},
                    {title: 'Echarts展示', path: '/EchartsShow'},
                    {title: 'Echarts', path: '/Echarts'},
                    {title: 'Vcharts', path: '/Vcharts'}
                ],
                num:0
            }
        },
        methods: {
            go (path,index) {
                this.$router.push(path);
                window.sessionStorage.setItem('index',index)
            }
        },
        mounted () {
            let index = window.sessionStorage.getItem('index');
            if(index){
                this.num = parseInt(index)
            }

        }
    }
</script>

<style scoped>
    .navbar-nav a{color:#666}
    .navbar-nav .active{color: #fff!important;background:#333}
</style>