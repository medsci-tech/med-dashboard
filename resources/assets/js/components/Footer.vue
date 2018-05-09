<template>
    <div class="footer">
        <router-link to="/echarts-show/link-page" class="footer-link">线型图</router-link>
        <router-link to="/echarts-show/bar-page" class="footer-link">柱状图</router-link>
        <router-link to="/echarts-show/pie-page" class="footer-link">饼状图</router-link>
        <router-link to="/echarts-show/scatter-page" class="footer-link">散点图</router-link>
    </div>
</template>

<script>
    export default {
        data(){
            return{}
        }
    }
</script>

<style scoped>
    .footer{width:100%;position:fixed;height:44px;line-height:44px;color:#333;bottom:0;left:0;background:#fff;z-index:999;border-top:1px solid #ccc}
    .footer .footer-link{float:left;display: block;width:25%;text-align: center;box-sizing:border-box;border-right:1px solid #ccc;color:#666}
    .footer .footer-link:nth-last-of-type{border-right:none}
    .router-link-active{color:#fff!important;background:#ff4949}
</style>