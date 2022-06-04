<template>
    <div>
        <button :class="classes" class="w-full text-left" v-if="as == 'button'">
            <slot></slot>
        </button>

        <Link :href="href" :class="classes" v-else>
            <slot />
        </Link>
    </div>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['active', 'href', 'as'],

        computed: {
            classes() {
                return this.active
                    ? 'inline-flex items-center px-1 pt-1 border-b border-white text-base font-medium leading-5 text-white focus:outline-none focus:border-white transition'
                    : 'inline-flex items-center px-1 pt-1 border-b border-transparent text-base font-medium leading-5 text-gray-300 hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition'
            }
        }
    })
</script>
