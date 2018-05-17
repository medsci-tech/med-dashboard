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
        methods: {
            getTime() {
                this.$emit('getTime2', this.date)
            }
        },
        components: {
            datepicker
        }
    }
</script>
