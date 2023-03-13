<template>
    <footer class="relative bg-zinc-900 pt-8 pb-6 text-white">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
                    style='background-image: url("https://i.ibb.co/5cmbgG6/6.png");'>
                    <span id="blackOverlay" class="w-full h-full absolute opacity-90 bg-black"></span>
                </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 mb-10">
                    <h4 class="lg:text-3xl text-xl font-semibold">
                        Наша команда мастеров с радостью поможет вам выглядеть на все сто процентов!
                    </h4>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top lg:mb-6 mb-5">
                        <div class="w-full lg:w-4/12 px-4 ml-auto">
                            <span class="block uppercase text-white lg:text-sm text-md font-semibold lg:mb-2 mb-3">Социальные сети</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-white lg:hover:text-gray-300 font-semibold block pb-2 lg:text-sm text-lg" href="#">
                                        <font-awesome-icon icon="fa-brands fa-instagram" />
                                        Instargam
                                    </a>
                                </li>
                                <li>
                                    <a class="ttext-white lg:hover:text-gray-300 font-semibold block pb-2 lg:text-sm text-lg"
                                        href="#">
                                        <font-awesome-icon icon="fa-brands fa-telegram" />
                                        Telegram
                                    </a>
                                </li>
                                <li>
                                    <a class="text-white lg:hover:text-gray-300 font-semibold block pb-2 lg:text-sm text-lg"
                                        href="#">
                                        <font-awesome-icon icon="fa-brands fa-vk" />
                                        VK
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="lg:my-6 border-gray-400" />
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-white font-semibold py-1">
                        Copyright © {{ date }} Barber
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            date: new Date().getFullYear()
        }
    }
}
</script>
