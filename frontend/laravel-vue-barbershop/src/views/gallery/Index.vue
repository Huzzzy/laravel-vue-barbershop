<template>
    <div>
        <div class="bg-zinc-900 lg:pb-24 pb-20">
        </div>

        <div id="carouselDarkVariant" class="relative" data-te-carousel-init data-te-carousel-slide>
            <!-- Inner -->
            <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                <!-- Single item -->
                <div class="relative float-left -mr-[100%] w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-fade data-te-carousel-item data-te-carousel-active>
                    <img src="https://i.ibb.co/P1zcmNW/8.jpg" class="block w-full"
                        alt="#" />
                </div>
                <!-- Single item -->
                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-fade data-te-carousel-item>
                    <img src="https://i.ibb.co/7rbg72t/6.jpg" class="block w-full"
                        alt="#" />
                </div>
                <!-- Single item -->
                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-fade data-te-carousel-item>
                    <img src="https://i.ibb.co/F7bfDpW/5.jpg" class="block w-full"
                        alt="#" />
                </div>
            </div>
            <!-- Inner -->
            <!-- Controls -->
            <button
                class="absolute top-0 bottom-0 left-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                type="button" data-te-target="#carouselDarkVariant" data-te-slide="prev">
                <span class="inline-block h-8 w-8 dark:grayscale dark:invert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </span>
                <span
                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
            </button>
            <button
                class="absolute top-0 bottom-0 right-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                type="button" data-te-target="#carouselDarkVariant" data-te-slide="next">
                <span class="inline-block h-8 w-8 dark:grayscale dark:invert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                <span
                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
            </button>
        </div>
    </div>
</template>
<script>
export default {
    name: "Services",
}
</script>
