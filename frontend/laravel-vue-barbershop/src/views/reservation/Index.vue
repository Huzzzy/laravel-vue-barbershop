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
                            <form @submit.prevent="confirm" class="space-y-4">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <label class="w-full lg:text-xl text-lg mb-2" for="name">Введите имя</label>
                                        <input class="w-full rounded-none border-gray-200 p-3 text-sm" placeholder="Иван"
                                            type="name" id="name" name="name" required v-model="reservation.name"
                                            @keypress.enter.prevent />
                                    </div>

                                    <div>
                                        <label class="w-full lg:text-xl text-lg mb-2" for="email">Введите Email</label>
                                        <input class="w-full rounded-none border-gray-200 p-3 text-sm"
                                            placeholder="ivanov@email.com" type="email" id="email" name="email" required
                                            v-model="reservation.email" @keypress.enter.prevent @change="isOpen = false" />
                                    </div>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите мастера
                                </h1>

                                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">

                                    <div v-for="master in availableMasters">
                                        <img :src="master.photo" :alt="master.name" border="0" class="mb-2" />
                                        <input class="peer sr-only" :id="`option${master.id}`" type="radio"
                                            :value="master.id" tabindex="-1" name="master_id" required
                                            v-model="reservation.master_id" @keypress.enter.prevent />

                                        <label @click="getDate(master.id)" :for="`option${master.id}`"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> {{ master.name }} </span>
                                        </label>
                                    </div>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите услуги
                                </h1>

                                <div>
                                    <div class="form-control">
                                        <label v-for="service in availableServices" class="label cursor-pointer">
                                            <span class="label-text">{{ service.title }}</span>
                                            <input type="checkbox" name="services[]" v-model="reservation.services"
                                                :value="service.id" class="checkbox" @keypress.enter.prevent />
                                        </label>
                                    </div>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите дату
                                </h1>

                                <div>
                                    <datepicker-component :allowedDates="availableDays" @date="setDate"
                                        @time="getTime"></datepicker-component>
                                </div>

                                <hr class="lg:my-6 border-gray-400" />
                                <h1 class="text-neutral-900 font-normal lg:text-2xl text-xl flex justify-center">
                                    Выберите время
                                </h1>

                                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">

                                    <div v-for="time in availableTime.time">
                                        <input class="peer sr-only" :id="`option${time}`" type="radio" :value="time"
                                            tabindex="-1" name="time" required v-model="reservation.time"
                                            @keypress.enter.prevent />

                                        <label :for="`option${time}`"
                                            class="block w-full rounded-none border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                                            tabindex="0">
                                            <span class="text-sm font-medium"> {{ time }}:00 </span>
                                        </label>
                                    </div>

                                </div>

                                <!-- <div class="pt-10 flex justify-center"> -->
                                <div class="container mx-auto">
                                    <div class="flex justify-center">
                                        <button @click="getEmailModal()"
                                            class="inline-block w-full rounded-none bg-black px-5 py-3 font-medium text-white sm:w-auto hover:bg-zinc-800"
                                            type="button">
                                            Подтвердить
                                        </button>

                                        <div v-show="isOpen"
                                            class=" absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                                            <div class="max-w-2xl p-6 bg-white rounded-md shadow-xl">
                                                <div class="flex items-center justify-between">
                                                    <h3 class="text-2xl text-center mt-5">Введите код, который мы отправили
                                                        вам
                                                        на ваш Email: {{ reservation.email }}</h3>
                                                    <button class="btn btn-square ml-10" type="button"
                                                        @click="isOpen = false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="otp w-full flex justify-around mt-10">
                                                    <input ref="firstInputEl" v-model="inputOtpCode" type="text"
                                                        maxlength="4" class="border rounded w-20 h-10 text-center"
                                                        @input="getSubmit(), getCode()" @keypress.enter.prevent />
                                                </div>
                                                <div class="absolute invisible" id="wrong">
                                                    <p class="text-center text-lg text-red-700 mt-3">
                                                        Неверный код!
                                                    </p>
                                                </div>
                                                <div class="absolute invisible" id="otp">
                                                    <div class="pt-5 flex justify-center">
                                                        <button type="submit"
                                                            class="inline-block w-full rounded-none bg-black px-5 py-3 font-medium text-white sm:w-auto hover:bg-zinc-800">
                                                            Подтведить
                                                        </button>
                                                    </div>
                                                    <div class="mt-5">
                                                        <p class="text-center">
                                                            Подтверждая, вы даете согласие на обработку персональных данных
                                                            и соглашаетесь
                                                            c политикой конфиденциальности
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <p v-if="errors.length">
                                        <b>Пожалуйста исправьте указанные ошибки:</b>
                                    <ul>
                                        <li v-for="error in errors">{{ error }}</li>
                                    </ul>
                                    </p>
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
                email: null,
                master_id: null,
                services: [],
                date: null,
                time: null,
            },
            availableServices: [],
            availableMasters: [],
            availableDays: [],
            availableTime: [],
            errors: [],
            isOpen: false,
            otpCode: null,
            inputOtpCode: null,
        }
    },
    mounted() {
        this.getMasters(),
            this.getServices()
    },
    methods: {
        getSubmit() {
            document.getElementById("otp").classList.add("absolute", "invisible");
            document.getElementById("wrong").classList.add("absolute", "invisible");


            if (String(this.inputOtpCode).length == String(this.otpCode).length
                &&
                this.otpCode != this.inputOtpCode) {
                document.getElementById("wrong").classList.remove("absolute", "invisible");
            }

            if (this.inputOtpCode == this.otpCode && this.otpCode != null) {
                document.getElementById("wrong").classList.add("absolute", "invisible");
                document.getElementById("otp").classList.remove("absolute", "invisible");
            }
        },
        getEmailModal() {
            this.errors = [];

            if (!this.reservation.name) {
                this.errors.push('Укажите имя.');
            }
            if (!this.reservation.email) {
                this.errors.push('Укажите Email.');
            }
            if (this.reservation.master_id === null) {
                this.errors.push('Выберите мастера.');
            }
            if (this.reservation.services.length === 0) {
                this.errors.push('Выберите услуги.');
            }
            if (this.reservation.date === null) {
                this.errors.push('Выберите дату.');
            }
            if (this.reservation.time === null) {
                this.errors.push('Выберите время.');
            }
            if (this.errors.length === 0) {

                this.axios.post('http://localhost:8876/api/reservation/otp', {
                    data: this.reservation.email
                })
                    .then(function (responce) {
                        console.log(responce);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.isOpen = true
            }
        },
        getCode() {
            this.axios.get(`http://localhost:8876/api/reservation/otp/${this.reservation.email}`)
                .then(result => {
                    this.otpCode = result.data.data.code
                })
        },
        confirm(e) {
            this.errors = [];

            if (!this.reservation.name) {
                this.errors.push('Укажите имя.');
            }
            if (!this.reservation.email) {
                this.errors.push('Укажите Email.');
            }
            if (this.reservation.master_id === null) {
                this.errors.push('Выберите мастера.');
            }
            if (this.reservation.services.length === 0) {
                this.errors.push('Выберите услуги.');
            }
            if (this.reservation.date === null) {
                this.errors.push('Выберите дату.');
            }
            if (this.reservation.time === null) {
                this.errors.push('Выберите время.');
            }
            if (this.errors.length === 0) {
                console.log(this.reservation);
                this.isOpen = true
            }
            if (
                typeof this.reservation.name !== 'string' &&
                typeof this.reservation.email !== 'string' &&
                typeof this.reservation.date !== 'string' &&
                typeof this.reservation.master_id !== 'number' &&
                typeof this.reservation.time !== 'number' &&
                typeof this.reservation.services !== 'string'
            ) {
                this.errors.push('С вашим запросом что-то не так...');
            }
            if (this.inputOtpCode != this.otpCode) {
                this.errors.push('Код подтверждения не совпадает!');
            }

            if (this.errors.length === 0) {
                this.axios.post('http://localhost:8876/api/reservation', {
                    data: this.reservation
                })
                    .catch(function (error) {
                        console.log(error);
                    });

                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                this.$router.push({ path: `/reservation/details/${this.reservation.email}` });
            }
        },
        setDate(data) {
            this.reservation.date = data.date;
        },
        getTime() {
            this.axios.get(`http://localhost:8876/api/available-time/${this.reservation.date}`)
                .then(result => {
                    this.availableTime = result.data.data
                })
        },
        getDate(id) {
            this.reservation.time = null
            this.reservation.date = null
            this.availableTime = []

            this.axios.get(`http://localhost:8876/api/available-dates/${id}`)
                .then(result => {
                    this.availableDays = result.data.data
                })
        },
        getMasters() {
            this.axios.get('http://localhost:8876/api/masters')
                .then(result => {
                    this.availableMasters = result.data.data
                })
        },
        getServices() {
            this.axios.get('http://localhost:8876/api/services')
                .then(result => {
                    this.availableServices = result.data.data
                })
        },
    },
    components: {
        DatepickerComponent
    }
}
</script>


