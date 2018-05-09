<template>
    <div>
        <datepicker
            v-model="date"
            :min="min"
            :max="max"
            :range="true"
        ></datepicker>
    </div>
</template>

<script>
    import datepicker from 'vue-date'
    export default {
        props: ['min','max'],
        data() {
            return {
                date: ['2018-2-28','2018-3-9']
            }
        },
        components: { datepicker }
    }
</script>

<style scoped>

</style>