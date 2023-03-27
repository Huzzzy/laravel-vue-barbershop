<template>
    <div>
        <div class="bg-zinc-900 lg:pb-24 pb-20">
        </div>
        <section class="pb-20 bg-neutral-200">
            <div class="container relative mx-auto">
                <div class="w-full lg:w-4/6 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12 pt-20">
                        <h1 class="text-neutral-900 font-normal lg:text-5xl text-4xl">
                            Наши услуги
                        </h1>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Мы предлагаем широкий выбор услуг, включая классическую стрижку, моделирование бороды и
                            усов, а также бритье головы и лица.
                            Наши профессиональные барберы имеют многолетний опыт работы и точно знают, как сделать вас
                            ухоженным и стильным.
                        </p>
                    </div>
                    <div v-for="service in services">
                        <div class="columns-2 mt-24">
                            <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl">
                                {{ service.title }}
                            </h1>
                            <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl">
                                {{ service.price }} BYN
                            </h1>
                        </div>
                        <hr class="lg:my-6 border-neutral-400" />
                    </div>
                    <router-link to="/reservation"
                        class="btn rounded-none text-white mt-5 hover:bg-zinc-900">Записаться</router-link>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name: "Services",

    data() {
        return {
            services: []
        }
    },

    mounted() {
        this.getServices()
    },

    methods: {
        getServices() {
            this.axios.get('http://localhost:8876/api/services')
                .then(result => {
                    this.services = result.data.data
                })
        }
    }
}
</script>
