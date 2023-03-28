<template>
    <VueDatePicker locale="ru" :enable-time-picker="false" auto-apply inline
        :month-change-on-scroll="false" v-model="date" @update:model-value="getDate" model-type="yyyy-MM-dd"
        :min-date="new Date(new Date().getTime() + 24 * 60 * 60 * 1000)" :allowed-dates="availableDays" />
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';


export default {
    name: 'Datepicker',

    props: [
        'allowedDates'
    ],

    computed: {
        availableDays() {
            var dates = []
            if (typeof (this.allowedDates.enabledDates) != "undefined" && this.allowedDates.enabledDates !== null) {

                this.allowedDates.enabledDates.forEach(element => {
                    element = element.split('/');
                    dates.push(new Date(element[2], --element[0], element[1]))
                });
            } else {
                dates.push(new Date())
            }
            return dates
        }
    },

    data() {
        return {
            date: '',
            dates: []
        }
    },
    methods: {
        getDate(date) {
            this.$emit('date', {
                date: this.date
            })
            this.$emit('time', {
                date: this.date
            })
        }
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

