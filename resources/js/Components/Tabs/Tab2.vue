<template>
    <div class="my-8 md:my-0 md:h-160 flex justify-center items-center">
        <div class="container">
            <div id="tab-2-content" class="grid grid-cols-2 gap-36">
                <div class="self-center">
                    <h1 class="text-black text-3xl font-bold mb-12">{{ settings?.data?.hero_second_card_text1 ?? 'Ukázkovou hodinu máš celou zdarma.' }}</h1>
                    <h1 class="text-black text-3xl font-bold mb-12">{{ settings?.data?.hero_second_card_text2 ?? 'Dále pokud se po prvním měsíci rozhodneš, že nebudeš pokračovat, vrátím ti půlku peněz. To je fér nabídka, ne?' }}</h1>
                    <Link class="cursor-pointer text-base md:text-xl shadow-md inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" :href="route('about')">
                        {{ settings?.data?.hero_first_card_button ?? 'Podrobnější info zde' }}
                    </Link>
                </div>
                <div class="p-10 flex justify-center">
                    <img :src="settings?.data?.hero_second_card_photo ?? '../../storage/page-photos/satisfaction.jpg'" alt="talking sheep english" class="w-96 shadow-xl">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import ButtonSecondary from "../../Jetstream/ButtonSecondary";

export default {
    name: "Tab2",
    props: {
        settings: {
            type: Object,
            default: null
        },
    },
    components: {
        ButtonSecondary,
        Link
    },
}
</script>

<style scoped>

</style>
