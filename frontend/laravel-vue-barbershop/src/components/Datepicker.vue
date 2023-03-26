<template>
    <VueDatePicker locale="ru" :enable-time-picker="false" auto-apply inline :month-change-on-scroll="false"
        v-model="date" @update:model-value="getDate" model-type="yyyy-MM-dd" />
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';


export default {
    name: 'Datepicker',

    data() {
        return {
            date: ''
        }
    },
    methods: {
        getDate(date) {
            this.$emit('date', {
                date: this.date
            })
        },
    },
    components: { VueDatePicker }
}


</script>

<style>
.dp__active_date {
    background: #27272a;
}

.dp__today {
    border: 1px solid #27272a;
}
</style>

