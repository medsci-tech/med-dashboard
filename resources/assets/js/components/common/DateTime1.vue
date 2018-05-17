<template>
    <div style="margin:5px auto 10px">
        <p style="margin:0">请选择日期：</p>
        <datepicker class="datepicker"
                    language="zh-cn"
                    v-model="date"
                    :min="min"
                    :max="max"
                    :range="true"
                    @input="getTime"
        ></datepicker>
    </div>
</template>

<script>
    import datepicker from 'vue-date'

    export default {
        props: ['min','max'],
        data() {
            return {
                date: ['2018-2-28','2018-3-28'],
                // max: '3016-01-01'
            }
        },
        mounted(){
            // this.fetchDate();
        },
        methods: {
            getTime() {
                this.$emit('getTime1', this.date)
            },
            // fetchDate(){
            //     //获取当前年月日
            //     let nowDate = new Date();
            //     let localDate = nowDate.toLocaleDateString();
            //     let strArr = localDate.split("/").join('-');
            //     this.date[1] = strArr;
            // }
        },
        components: {
            datepicker
        }
    }
</script>

<style scoped>

</style>