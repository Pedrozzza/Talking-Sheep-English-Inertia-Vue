<template>
    <Link :href="route('posts.show', post.id)">
        <div class="flex justify-center post-card mb-8">
            <div class="w-full rounded-lg shadow-lg bg-white max-w-sm border border-gray-100 overflow-hidden">
                <div>
                    <h5 class="p-4 text-white text-shadow-md text-center text-xl font-bold mb-2" :style="{'background-color': `${post.color}`}">{{ post.title }}</h5>
                    <p class="p-4" v-html="post.body"></p>
                </div>
            </div>
        </div>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "PostCard",
    props: {
        post: {
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
.post-card:hover {
    transform: scale(1.05);
    transition: transform 0.5s ease-in-out;
}
</style>
