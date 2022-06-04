<template>
    <app-layout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mb-8 flex flex-col">
                        <h2 class="my-4 text-2xl font-extrabold text-blue-800 text-shadow-md">Přehled všech dostupných studijních materiálů</h2>
                        <p class="text-base">
                            Ve studovně najdete lekce, které přísluší Vaší úrovni. Po rozkliknutí dané kategorie se
                            zobrazí všechny její lekce. Soubory k lekcím si poté můžete stáhnout.
                        </p>
                    </div>
                    <hr class="my-2"/>
                    <p class="text-xl font-bold mb-4">Kategorie:</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-3 lg:grid-cols-4 lg:gap-4">
                        <folder-card v-for="folder in folders.data" :key="folder.id" :folder="folder"></folder-card>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import FolderCard from "../Components/FolderCard";

    export default defineComponent({
        components: {
            FolderCard,
            AppLayout,
        },
        props: {
            folders: {
                type: Object,
                required: true,
            }
        }
    })
</script>
