<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Ceník'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.price_main_title ?? 'Kolik zaplatíš?' }}</h2>
            </div>
            <div>
                <p class="my-8 text-xl 2xl:text-2xl font-bold flex justify-center text-center">
                    {{ settings?.data?.price_main_subtitle ?? 'Záleží hlavně na tvých preferencích a času, který se rozhodneš investovat. V tabulkách najdeš moje ceny, včetně možných slev.' }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-28 items-start">
                <div class="flex flex-col">
                    <div>
                        <p class="text-black text-base 2xl:text-xl font-bold mb-4 text-center md:text-left">Základní hodinové sazby:</p>
                        <div class="overflow-x-auto">
                            <basic-price-list></basic-price-list>
                        </div>
                    </div>
                    <div class="my-8">
                        <p class="text-black text-base 2xl:text-xl font-bold mb-4 text-center md:text-left">Orientační slevy při předplacení (výpočet se liší dle týdnů v měsíci):</p>
                        <div class="overflow-x-auto">
                            <discount-price-list></discount-price-list>
                        </div>
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
import BasicPriceList from "../Components/PriceTables/BasicPriceList";
import DiscountPriceList from "../Components/PriceTables/DiscountPriceList";

export default {
    name: "PriceList",
    components: {
        DiscountPriceList,
        BasicPriceList,
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
