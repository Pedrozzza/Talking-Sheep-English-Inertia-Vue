<template>
    <Link :href="route('folders.show', folder.id)">
        <div class="flex justify-center folder-card mb-8">
            <div class="w-full rounded-lg shadow-lg bg-white max-w-sm border border-gray-100 overflow-hidden">
                <div>
                    <h5 class="p-6 text-white text-shadow-md text-center text-xl font-bold" :style="{'background-color': `${folder.color}`}">{{ folder.title }}</h5>
                    <img v-if="folder.image" class="flex mx-auto" :src="`../../storage/folders-photos/${folder.image}`" alt="" style="max-height: 185px; width: 100%"/>
                    <img v-else class="w-full rounded-t-lg" :src="`../../storage/default-photo/default-photo.png`" alt="" style="max-height: 185px"/>
                </div>
            </div>
        </div>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "FolderCard",
    props: {
        folder: {
            type: Object,
            required: true,
        }
    },
    components: {
        Link
    }
}
</script>

<style scoped>
 .folder-card:hover {
     transform: scale(1.05);
     transition: transform 0.5s ease-in-out;
 }
</style>
