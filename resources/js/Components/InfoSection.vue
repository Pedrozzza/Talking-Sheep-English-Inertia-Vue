<template>
    <div class="h-52 bg-gradient-to-b from-red-900 to-red-800">
        <h1 class="flex justify-center text-6xl pt-20 text-white font-bold">{{ settings?.data?.hero_main_card_title ?? 'Chrudim a okolí naživo. Online kdekoliv po ČR' }}</h1>
    </div>
    <tabs :settings="settings"></tabs>
    <div class="bg-split-white-red flex justify-center items-center">
        <div class="container">
            <div class="pb-8 grid grid-cols-3 gap-4">
                <div class="p-10">
                    <img class="mx-auto mt-12" src="../../img/logo/logo_bw_left2.png" alt="">
                </div>
                <div class="p-10">
                    <contact-form :title="'V případě zájmu nebo jakýkoliv dotazů, mě neváhej kontaktovat.'"></contact-form>
                </div>
                <div class="p-10">
                    <img class="mx-auto mt-12" src="../../img/logo/logo_bw_right2.png" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Tabs from "./Tabs";
import ContactForm from "./ContactForm";

export default {
    name: "InfoSection",
    components: {
        ContactForm,
        Tabs,
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
