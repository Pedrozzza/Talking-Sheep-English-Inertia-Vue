<template>
    <Link :href="url">
        <font-awesome-icon :icon="['fas', 'pen']" class="text-xl text-blue-700 hover:opacity-50"/>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faPen } from "@fortawesome/free-solid-svg-icons";

library.add(faPen);

export default {
    name: "EditBtn",
    props: {
        url: {
            type: String,
            required: true,
        }
    },
    components: {
        Link
    },
}
</script>

<style scoped>

</style>
