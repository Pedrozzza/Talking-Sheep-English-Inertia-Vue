<template>
    <Link :href="'/'" class="flex items-center">
        <font-awesome-icon :icon="['fas', 'undo-alt']" size="lg" class="text-red-800 animate-pulse focus:outline-none" style="font-size: 2rem"/>
<!--        <img class="w-20 h-20 bg-white p-2 rounded-full" src="../../img/home/tse_home.png" alt="">-->
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';
    import { library } from "@fortawesome/fontawesome-svg-core";
    import { faUndoAlt  } from "@fortawesome/free-solid-svg-icons";

    library.add(faUndoAlt);

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>

<style scoped>
    a:focus, a:active {
        border: 0;
    }
</style>
