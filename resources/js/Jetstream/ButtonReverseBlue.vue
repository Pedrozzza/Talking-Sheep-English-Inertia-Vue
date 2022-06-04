<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-white border border-2 border-blue-900 rounded-md font-bold text-xs text-blue-800 uppercase tracking-widest hover:bg-blue-100 active:bg-blue-200 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
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
