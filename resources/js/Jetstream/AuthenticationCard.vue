<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-52 md:pt-6 sm:pt-0 bg-split-white-red">
        <div class="pb-8 grid grid-cols-1 md:grid-cols-3 md:gap-4">
            <div class="hidden p-10 md:block">
                <img class="mx-auto mt-12" src="../../img/logo/logo_bw_left2.png" alt="">
            </div>
            <div class="p-4 md:p-10">
                <div class="flex justify-center" style="margin-top: -2rem">
                    <slot name="logo" />
                </div>

                <div class="w-full sm:max-w-md mt-4 px-6 py-4 bg-red-800 shadow-md overflow-hidden sm:rounded-lg border-4 border-red-900">
                    <slot />
                </div>
            </div>
            <div class="p-0 md:p-10">
                <img class="mx-auto mt-12 sheep" src="../../img/logo/logo_bw_right2.png" alt="">
            </div>
        </div>
    </div>
</template>

<style scoped>
@media (max-width: 640px) {
    .sheep {
        width: 50%;
    }
}
</style>
