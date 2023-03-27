<template>
    <div>
        <div class="bg-zinc-900 lg:pb-24 pb-20">
        </div>
        <section class="bg-gray-100">
            <div v-for="master in masters" class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                    <div class="lg:col-span-2 lg:py-12">
                        <h1 class="text-neutral-900 mb-10 font-normal lg:text-5xl text-4xl">
                            {{ master.name }}
                        </h1>
                        <p class="max-w-xl text-lg mb-5" v-html="master.description">
                        </p>
                    </div>

                    <div class="p-8 lg:col-span-3 lg:p-12">
                        <img :src="master.photo" alt="Влад" border="0" class="mb-2" />
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>
<script>

export default {
    name: "Masters",

    data() {
        return {
            masters: []
        }
    },

    mounted() {
        this.getMasters()
    },

    methods: {
        getMasters() {
            this.axios.get('http://localhost:8876/api/masters')
                .then(result => {
                    this.masters = result.data.data
                })
        }
    }
}
</script>
