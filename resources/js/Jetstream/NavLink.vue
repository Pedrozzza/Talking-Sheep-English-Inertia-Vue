<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                    ? 'inline-flex items-center px-1 pt-1 border-b-3 border-white text-base md:text-sm 2xl:text-base font-medium leading-5 text-white focus:outline-none focus:border-white transition'
                    : 'inline-flex items-center px-1 pt-1 border-b-3 border-transparent text-base md:text-sm 2xl:text-base font-medium leading-5 text-gray-300 hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition'
            }
        }
    })
</script>
