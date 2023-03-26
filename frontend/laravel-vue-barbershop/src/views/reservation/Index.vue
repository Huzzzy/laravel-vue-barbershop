<template>
    <div>
        <div class="bg-zinc-900 lg:pb-24 pb-20">
        </div>
        <section class="pb-20 bg-neutral-200">
            <!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

            <section class="bg-gray-100">
                <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                        <div class="lg:col-span-2 lg:py-12">
                            <p class="max-w-xl text-lg">
                                Мы уделяем особое внимание каждому клиенту и стремимся создать уютную и дружелюбную
                                атмосферу в нашем барбершопе. Наши мастера обладают высоким уровнем профессионализма и
                                мастерски владеют не только классическими, но и современными техниками стрижки и бритья.
                            </p>

                            <div class="mt-8">
                                <a href="" class="text-2xl font-bold text-neutral-900">
                                    +6 445 3680
                                </a>

                                <address class="mt-2 not-italic">
                                    Пушкинская ул., 107/72, Ростов-на-Дону
                                </address>
                            </div>
                        </div>

                        <div class="rounded-none bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                            <form action="http://localhost:8876/api/reservation" method="post" @submit.prevent="getData"
                                enctype="multipart/form-data" class="space-y-4">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <label class="w-full lg:text-xl text-lg mb-2" for="name">Введите имя</label>
                                        <input class="w-full rounded-none border-gray-200 p-3 text-sm" placeholder="Иван"
                                            type="name" id="name" name="name" v-model="reservation.name" />
                                    </div>

                                    <div>
                                        <label class="w-full lg:text-xl text-lg mb-2" for="phone">Введите телефон</label>
                                        <input class="w-full rounded-none border-gray-200 p-3 text-sm"
                                            placeholder="+375123456789" type="tel" id="phone" name="phone"
                                            v-model="reservation.phone" />
                                    </div>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите мастера
                                </h1>

                                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">

                                    <div>
                                        <img src="https://i.ibb.co/WsG6zRr/5.png" alt="Влад" border="0" class="mb-2" />
                                        <input class="peer sr-only" id="option1" type="radio" value="Влад" tabindex="-1"
                                            name="master_id" v-model="reservation.master_id" />

                                        <label for="option1"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> Влад </span>
                                        </label>
                                    </div>

                                    <div>
                                        <img src="https://i.ibb.co/GJYnV5j/3.png" alt="Никита" border="0" class="mb-2" />
                                        <input class="peer sr-only" id="option2" type="radio" value="Никита" tabindex="-1"
                                            name="master_id" v-model="reservation.master_id" />

                                        <label for="option2"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> Никита </span>
                                        </label>
                                    </div>

                                    <div>
                                        <img src="https://i.ibb.co/W2gWssW/4.png" alt="Рома" border="0" class="mb-2" />
                                        <input class="peer sr-only" id="option3" type="radio" value="Рома" tabindex="-1"
                                            name="master_id" v-model="reservation.master_id" />

                                        <label for="option3"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> Рома </span>
                                        </label>
                                    </div>

                                    <div>
                                        <img src="https://i.ibb.co/hY3pT8q/2.png" alt="Глеб" border="0" class="mb-2" />
                                        <input class="peer sr-only" id="option4" type="radio" value="Глеб" tabindex="-1"
                                            name="master_id" v-model="reservation.master_id" />

                                        <label for="option4"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> Глеб </span>
                                        </label>
                                    </div>

                                    <div>
                                        <img src="https://i.ibb.co/37BkpJy/1.png" alt="Максим" border="0" class="mb-2" />
                                        <input class="peer sr-only" id="option5" type="radio" value="Максим" tabindex="-1"
                                            name="master_id" v-model="reservation.master_id" />

                                        <label for="option5"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> Максим </span>
                                        </label>
                                    </div>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите услуги
                                </h1>

                                <div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text">Услуга</span>
                                            <input type="checkbox" name="services[]" v-model="reservation.services"
                                                value="1" class="checkbox" />
                                        </label>
                                        <label class="label cursor-pointer">
                                            <span class="label-text">Услуга</span>
                                            <input type="checkbox" name="services[]" v-model="reservation.services"
                                                value="2" class="checkbox" />
                                        </label>
                                        <label class="label cursor-pointer">
                                            <span class="label-text">Услуга</span>
                                            <input type="checkbox" name="services[]" v-model="reservation.services"
                                                value="3" class="checkbox" />
                                        </label>
                                        <label class="label cursor-pointer">
                                            <span class="label-text">Услуга</span>
                                            <input type="checkbox" name="services[]" v-model="reservation.services"
                                                value="4" class="checkbox" />
                                        </label>
                                        <label class="label cursor-pointer">
                                            <span class="label-text">Услуга</span>
                                            <input type="checkbox" name="services[]" v-model="reservation.services"
                                                value="5" class="checkbox" />
                                        </label>
                                    </div>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите дату
                                </h1>

                                <div>
                                    <datepicker-component @date="setDate"></datepicker-component>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите время
                                </h1>

                                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">

                                    <div>
                                        <input class="peer sr-only" id="option10" type="radio" value="10" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option10"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 10:00 </span>
                                        </label>
                                    </div>

                                    <div>
                                        <input class="peer sr-only" id="option20" type="radio" value="11" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option20"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 11:00 </span>
                                        </label>
                                    </div>

                                    <div>
                                        <input class="peer sr-only" id="option30" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option30"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 12:00 </span>
                                        </label>
                                    </div>

                                    <div>
                                        <input class="peer sr-only" id="option40" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option40"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 13:00 </span>
                                        </label>
                                    </div>

                                    <div>
                                        <input class="peer sr-only" id="option50" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option50"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 14:00 </span>
                                        </label>
                                    </div>

                                    <div>
                                        <input class="peer sr-only" id="option60" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option60"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 15:00 </span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer sr-only" id="option70" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option70"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 16:00 </span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer sr-only" id="option80" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option80"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 17:00 </span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer sr-only" id="option90" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option90"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 18:00 </span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer sr-only" id="option100" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option100"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 19:00 </span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer sr-only" id="option110" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option110"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 20:00 </span>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer sr-only" id="option120" type="radio" value="" tabindex="-1"
                                            name="time" v-model="reservation.time" />

                                        <label for="option120"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> 21:00 </span>
                                        </label>
                                    </div>

                                </div>

                                <div class="pt-10 flex justify-center">
                                    <button type="submit"
                                        class="inline-block w-full rounded-none bg-black px-5 py-3 font-medium text-white sm:w-auto hover:bg-zinc-800">
                                        Подтведить
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </section>
    </div>
</template>
<script>
import DatepickerComponent from '../../components/Datepicker.vue';

export default {
    name: "Reservation",
    data() {
        return {
            reservation: {
                name: null,
                phone: null,
                master_id: null,
                services: [],
                date: null,
                time: null,
            }
        }
    },
    methods: {
        getData() {
            console.log(this.reservation);
            this.axios.post('http://localhost:8876/api/reservation', {
                data: this.reservation
            })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        setDate(data) {
            this.reservation.date = data.date;
        }
    },
    components: {
        DatepickerComponent
    }
}
</script>


