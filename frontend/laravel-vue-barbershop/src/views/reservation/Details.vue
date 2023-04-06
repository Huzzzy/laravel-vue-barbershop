<template>
    <div>
        <div class="bg-zinc-900 lg:pb-24 pb-20">
        </div>
        <section class="pb-20 bg-neutral-200">
            <div class="container relative mx-auto">
                <div class="w-full lg:w-4/6 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12 pt-20">
                        <h1 class="text-neutral-900 font-normal lg:text-5xl text-4xl">
                            Ваша запись
                        </h1>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Имя: {{ this.$router.params.id }}
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Email: {{  }}
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Услуги: {{  }}
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Мастер: {{  }}
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Дата: {{  }}
                        </p>
                        <p class="mt-10 font-light lg:text-lg text-lg text-neutral-900">
                            Время: {{  }}
                        </p>
                    </div>
                    <div>


                        <!-- <div class="columns-2 mt-24">
                            <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl">
                            </h1>
                            <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl">
                            </h1>
                        </div>
                        <hr class="lg:my-6 border-neutral-400" /> -->
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
    name: "Details",


    data() {
        return {
        }
    },

    mounted() {

    },

    methods: {

    }
}
</script>
