<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md
    font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none
    focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition" @click.prevent="visit">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'submit',
            },
            href: {
                type: String
            }
        },
        methods: {
            visit() {
                if (!this.href) {
                    return;
                }

                this.$inertia.visit(this.href)
            }
        }
    })
</script>
