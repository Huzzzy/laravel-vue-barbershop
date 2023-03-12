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
                            <div class="pr-12 pt-20">
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
        </main>
    </div>
</template>
<script>
export default {
    name: "Main",
}
</script>
