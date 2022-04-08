<template>
    <div class="h-160 flex justify-center items-center">
        <div class="container">
            <div id="tab-2-content" class="grid grid-cols-2 gap-36">
                <div class="self-center">
                    <h1 class="text-black text-3xl font-bold mb-12">{{ settings?.data?.hero_second_card_text1 ?? 'Ukázkovou hodinu máš celou zdarma.' }}</h1>
                    <h1 class="text-black text-3xl font-bold mb-12">{{ settings?.data?.hero_second_card_text2 ?? 'Dále pokud se po prvním měsíci rozhodneš, že nebudeš pokračovat, vrátím ti půlku peněz. To je fér nabídka, ne?' }}</h1>
                </div>
                <div class="p-10">
                    <img :src="settings?.data?.hero_second_card_photo ?? '../../storage/page-photos/satisfaction.jpg'" alt="talking sheep english" class="w-full">
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Tab2",
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
