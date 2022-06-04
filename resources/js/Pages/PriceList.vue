<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Ceník'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">{{ settings?.data?.price_main_title ?? 'Kolik zaplatíš?' }}</h2>
            </div>
            <div>
                <p class="my-8 text-2xl font-bold flex justify-center">
                    {{ settings?.data?.price_main_subtitle ?? 'Záleží hlavně na tvých preferencích a času, který se rozhodneš investovat. V tabulkách najdeš moje ceny, včetně možných slev.' }}
                </p>
            </div>
            <div class="grid grid-cols-2 gap-28 items-start">
                <div class="flex flex-col">
                    <div>
                        <p class="text-black text-xl font-bold mb-4">Základní hodinové sazby:</p>
                        <basic-price-list></basic-price-list>
                    </div>
                    <div class="my-8">
                        <p class="text-black text-xl font-bold mb-4">Orientační slevy při předplacení (výpočet se liší dle týdnů v měsíci):</p>
                        <discount-price-list></discount-price-list>
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
