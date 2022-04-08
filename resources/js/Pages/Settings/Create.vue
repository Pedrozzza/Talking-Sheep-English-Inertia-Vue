<template>
    <app-layout title="Obsah webu">
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nastavení stránky
                </h2>
                <p class="flex items-center text-yellow-600 font-bold p-1 border-2 border-yellow-600">
                    <font-awesome-icon :icon="['fas', 'exclamation-triangle']" size="lg" class="mr-1"/>
                    Některé úpravy mohou vést ke změně vzhledu webu. Je proto třeba respektovat nynější strukturu (délka textu, počet slov atd.)
                </p>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <update-hero-data :settings="settings" class="pb-10"></update-hero-data>
                <update-info-data :settings="settings" class="pb-10"></update-info-data>
                <update-price-list-data :settings="settings" class="pb-10"></update-price-list-data>
                <update-contacts-data :settings="settings"></update-contacts-data>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import UpdateHeroData from "./UpdateHeroData";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faExclamationTriangle } from "@fortawesome/free-solid-svg-icons";
import UpdateInfoData from "./UpdateInfoData";
import UpdatePriceListData from "./UpdatePriceListData";
import UpdateContactsData from "./UpdateContactsData";

library.add(faExclamationTriangle);

export default defineComponent({
    name: "Settings_Create",
    props: ['settings'],
    components: {
        UpdateContactsData,
        UpdatePriceListData,
        UpdateInfoData,
        UpdateHeroData,
        AppLayout,
    },
})
</script>
