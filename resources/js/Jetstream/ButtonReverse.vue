<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-white border border-4 border-red-800 rounded-md font-bold text-xs text-red-800 uppercase tracking-widest hover:bg-red-100 active:bg-red-200 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
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
    }
})
</script>

<style scoped>

</style>
