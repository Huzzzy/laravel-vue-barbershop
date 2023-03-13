<script setup>
  import { ref } from 'vue'
  import VueTailwindDatepicker from 'vue-tailwind-datepicker'

  const dateValue = ref([])
  const formatter = ref({
    date: 'DD MMM YYYY',
    month: 'MMM'
  })


</script>

<template>
    <vue-tailwind-datepicker  as-single no-input :formatter="formatter" v-model="dateValue" />
</template>
