<template>
    <div class="my-8 md:my-0 md:h-128 2xl:h-160 flex justify-center items-center">
        <div class="container">
            <div id="tab-3-content" class="grid grid-cols-1 md:grid-cols-2 md:gap-36">
                <div class="self-center p-4 md:p-0 text-center md:text-left">
                    <h1 class="text-black text-base md:text-xl 2xl:text-3xl font-bold mb-6 md:mb-12">{{ settings?.data?.hero_third_card_text2 ?? 'A co když ti to nesedne? Můžeš si předplatit jen jeden měsíc a pak se rozhodnout, zda do toho půjdeš naplno;)' }}</h1>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <basic-price-list></basic-price-list>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:p-0 text-center md:text-left">
                    <h1 class="text-black text-base md:text-xl 2xl:text-3xl font-bold mb-6 md:mb-12">{{ settings?.data?.hero_third_card_text1 ?? 'Individuální výuka přináší čas jen pro tebe. Skupinová výuka je fajn pro potkávání dalších studentů a prostřídání parťáků se kterými během lekce mluvíš. Volba je jen na tobě.' }}</h1>
                    <Link class="cursor-pointer text-base 2xl:text-xl shadow-md inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" :href="route('price_list')">
                        {{ settings?.data?.hero_first_card_button ?? 'Podrobnější info zde' }}
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BasicPriceList from "../PriceTables/BasicPriceList";
import { Link } from '@inertiajs/inertia-vue3';
import ButtonSecondary from "../../Jetstream/ButtonSecondary";

export default {
    name: "Tab3",
    components: {
        BasicPriceList,
        ButtonSecondary,
        Link
    },
    props: {
    settings: {
      type: Object,
      default: null
    },
  },
}
</script>

<style scoped>

</style>
