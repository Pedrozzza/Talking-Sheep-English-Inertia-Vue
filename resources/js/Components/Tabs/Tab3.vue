<template>
    <div class="h-160 flex justify-center items-center">
        <div class="container">
            <div id="tab-3-content" class="grid grid-cols-2 gap-36">
                <div class="self-center">
                    <h1 class="text-black text-3xl font-bold mb-12">{{ settings?.data?.hero_third_card_text1 ?? 'Individuální výuka přináší čas jen pro tebe. Skupinová výuka je fajn pro potkávání dalších studentů a prostřídání parťáků se kterými během lekce mluvíš. Volba je jen na tobě.' }}</h1>
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
                <div>
                    <p class="text-black text-xl font-bold mb-4">Orientační slevy při předplacení (výpočet se liší dle týdnů v měsíci):</p>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <discount-price-list></discount-price-list>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BasicPriceList from "../PriceTables/BasicPriceList";
import DiscountPriceList from "../PriceTables/DiscountPriceList";

export default {
    name: "Tab3",
    components: {
        DiscountPriceList,
        BasicPriceList
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
