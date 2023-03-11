<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Ceník'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.price_main_title ?? 'Kolik zaplatíš?' }}</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-28 items-start">
                <div class="flex flex-col">
                    <div>
                        <p class="text-black text-base md:text-xl 2xl:text-3xl font-bold my-6 md:mb-12 md:mt-20">
                            Ceny se u dětí a dospělých různí a také zaleží na počtu ve skupině.
                            Cena za 60 minut se pohybuje od 200 Kč až po 500 kč
                        </p>
                    </div>
                </div>
                <div class="p-10">
                    <img :src="settings?.data?.price_photo ?? '../../storage/pricelist-photos/pricelist1.jpg'" alt="talking sheep english">
                </div>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import WelcomeLayout from "../Layouts/WelcomeLayout";

export default {
    name: "PriceList",
    components: {
        WelcomeLayout
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        settings: Object,
    }
}
</script>

<style scoped>

</style>
