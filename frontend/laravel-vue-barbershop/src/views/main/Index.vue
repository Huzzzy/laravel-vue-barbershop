<template>
    <div>
        <main>
            <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 100vh;">
                <div class="absolute top-0 w-full h-full bg-center bg-cover"
                    style='background-image: url("https://i.ibb.co/sFnXbjc/10.jpg");'>
                    <span id="blackOverlay" class="w-full h-full absolute opacity-80 bg-black"></span>
                </div>
                <div class="container relative mx-auto">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full lg:w-4/6 px-4 ml-auto mr-auto text-center">
                            <div class="pt-20">
                                <h1 class="text-white font-normal lg:text-5xl text-4xl">
                                    Здесь ты не просто стрижешься,
                                    ты заботишься о своем стиле!
                                </h1>
                                <p class="mt-10 font-light lg:text-lg text-lg text-gray-300">
                                    Пушкинская ул., 107/72, Ростов-на-Дону
                                    +123 445 667 809
                                </p>
                                <p class="mt-2 font-light lg:text-lg text-lg text-gray-300">
                                    +123 445 667 809
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="bg-gray-100">
                <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                        <div class="lg:col-span-2 lg:py-12">
                            <h1 class="text-neutral-900 mb-10 font-normal lg:text-5xl text-4xl">
                                    О нас
                                </h1>
                            <p class="max-w-xl text-neutral-700 text-lg mb-5">
                                Наш барбершоп - это не только место для стрижки и бритья, но и место для комфортного отдыха.
                                У нас есть уютный интерьер, прохладительные напитки и дружелюбная атмосфера. Мы уверены, что
                                после посещения нашего барбершопа вы будете чувствовать себя свежими и готовыми к новым
                                вызовам. Мы – дружная семья с высоким стандартом качества и ценностями. За годы мы
                                выработали свой особенный стиль и рады приобщать клиентов к прекрасному. У нас не просто
                                парикмахерская, это сообщество.
                            </p>
                        </div>

                        <div class="p-8 lg:col-span-3 lg:p-12">
                            <img src="https://i.ibb.co/T1V2KvQ/7.jpg" alt="#" />
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
</template>
<script>
export default {
    name: "Main",
}
</script>
