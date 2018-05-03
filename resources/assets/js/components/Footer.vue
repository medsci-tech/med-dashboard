<template>
    <div class="footer">
        <router-link to="/EchartsShow" class="footer-link active">线型图</router-link>
        <router-link to="/EchartsShow/BarPage" class="footer-link">柱状图</router-link>
        <router-link to="/EchartsShow/PiePage" class="footer-link">饼状图</router-link>
        <router-link to="/EchartsShow/ScatterPage" class="footer-link">散点图</router-link>
    </div>
</template>

<script>
    export default {
        data(){
            return{}
        }
    }
</script>

<style>
    .footer{width:100%;position:fixed;height:44px;line-height:44px;color:#333;bottom:0;left:0;background:#fff;z-index:999;border-top:1px solid #ccc}
    .footer .footer-link{float:left;display: block;width:25%;text-align: center;box-sizing:border-box;border-right:1px solid #ccc;color:#666}
    .footer .footer-link:nth-last-of-type{border-right:none}
    .footer .footer-link.active{}
</style>