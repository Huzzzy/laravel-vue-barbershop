<template>
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <router-link to="/" class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white lg:hover:text-gray-300 lg:mb-10">
                    Барбершоп
                </router-link>
                <label class="btn btn-circle swap swap-rotate bg-zinc-900 lg:hidden">

                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" v-on:click="toggleNavbar()" />

                    <!-- hamburger icon -->
                    <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        viewBox="0 0 512 512">
                        <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
                    </svg>

                    <!-- close icon -->
                    <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        viewBox="0 0 512 512">
                        <polygon
                            points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                    </svg>

                </label>
            </div>
            <div class="lg:flex flex-grow items-center bg-zinc-900 lg:bg-transparent lg:shadow-none"
                v-bind:class="{ 'hidden': !showMenu, 'block': showMenu }">
                <ul class="flex flex-col lg:flex-row list-none mr-auto mb-10">
                    <li class="flex items-center pl-10">
                        <router-link to="/services" class="text-white lg:hover:text-gray-300 px-3 py-4 lg:py-2 flex items-center text-base uppercase font-bold">
                            Услуги
                        </router-link>
                    </li>
                    <li class="flex items-center pl-10">
                        <router-link to="/" class="text-white lg:hover:text-gray-300 px-3 py-4 lg:py-2 flex items-center text-base uppercase font-bold">
                            Фотографии
                        </router-link>
                    </li>
                    <li class="flex items-center pl-10">
                        <router-link to="/" class="text-white lg:hover:text-gray-300 px-3 py-4 lg:py-2 flex items-center text-base uppercase font-bold">
                            Контакты
                        </router-link>
                    </li>
                    <li class="flex items-center pl-10">
                        <router-link to="/" class="text-white lg:hover:text-gray-300 px-3 py-4 lg:py-2 flex items-center text-base uppercase font-bold">
                            Мастера
                        </router-link>
                    </li>
                </ul>
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto mb-5">
                    <li class="flex items-center pl-10 pb-8">
                        <router-link to="/reservation" class="btn btn-outline rounded-none text-white mt-3 hover:bg-zinc-800">Записаться</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    data() {
        return {
            showMenu: false
        }
    },
    methods: {
        toggleNavbar: function () {
            this.showMenu = !this.showMenu;
        }
    }
}
</script>
