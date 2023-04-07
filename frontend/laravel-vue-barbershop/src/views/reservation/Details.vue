<template>
    <div>
        <div class="bg-zinc-900 lg:pb-24 pb-20">
        </div>
        <section class="pb-20 bg-neutral-200">
            <div class="container relative mx-auto">
                <div class="w-full lg:w-4/6 px-4 ml-auto mr-auto text-center">
                    <div class="pt-20">
                        <h1 class="text-neutral-900 font-normal lg:text-5xl text-4xl">
                            Ваша запись
                        </h1>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Имя:
                        <div>{{ this.reservation.name }}</div>
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Email:
                        <div>{{ this.reservation.email }}</div>
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Услуги:
                        <div v-for="service in this.reservation.services">{{ service }}</div>
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Мастер:
                        <div>{{ this.reservation.master }}</div>
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Дата:
                        <div>{{ this.reservation.date }}</div>
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Время:
                        <div>{{ this.reservation.time }}:00</div>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name: "Details",

    data() {
        return {
            reservation: {
                name: null,
                email: null,
                master: null,
                services: [],
                date: null,
                time: null,
            },
        }
    },

    mounted() {
        this.getReservation()
    },
    methods: {
        getReservation() {
            this.axios.get(`http://localhost:8876/api/reservation/${this.$router.currentRoute.value.params.email}`)
                .then(result => {
                    this.reservation = result.data.data
                    var date = result.data.data.date
                    date = date.split('-')
                    var date = new Date(date[0], --date[1], date[2])
                    var options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        weekday: 'long',
                    };
                    this.reservation.date = date.toLocaleString("ru", options)
                })
        }
    }
}
</script>
