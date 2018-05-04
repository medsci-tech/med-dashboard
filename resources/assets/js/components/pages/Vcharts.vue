<template>
    <div style="height:100%;padding-top: 51px">
        <Header></Header>
        <iframe src="https://v-charts.js.org/#/line" frameborder="0" width="100%" height="100%"></iframe>
    </div>

</template>

<script>
    import Header from '../common/Header'
    export default {
        components:{Header}
    }
</script>