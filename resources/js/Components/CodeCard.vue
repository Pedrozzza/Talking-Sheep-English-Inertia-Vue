<template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <h2 class="mb-8 text-xl text-center uppercase font-bold">{{ label }}</h2>
            <button-green @click.prevent="generateCode()" class="mb-8 w-full">
                <div class="flex items-center mx-auto">
                    <font-awesome-icon :icon="['fas', 'dice']" class="mr-2 text-xl"/>
                    <span>Vygenerovat nový kód</span>
                </div>
            </button-green>
            <table class="rounded-2xl">
                <thead class="border bg-blue-800 shadow-md">
                <tr>
                    <th scope="col" class="text-left font-bold text-white px-4 py-4">
                        Registrační kód
                    </th>
                    <th scope="col" class="font-bold text-white px-4 py-4">
                        Odstranit
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="code in codes" :key="code.id" class="border hover:bg-blue-100">
                    <td class="text-gray-900 px-4 py-4 whitespace-nowrap">{{ code.code }}</td>
                    <td class="text-center text-gray-900 px-4 py-4 whitespace-nowrap flex justify-center">
                        <button @click.prevent="removeCode(code.id)">
                            <font-awesome-icon :icon="['fas', 'trash-alt']" class="text-xl text-red-700 hover:opacity-50"/>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import ButtonGreen from "../Jetstream/ButtonGreen";

export default {
    name: "CodeCard",
    props: {
        codes: {
            type: Object,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        category: {
            type: String,
            required:true
        }
    },
    components: {
        ButtonGreen
    },
    data() {
        return {
            form: this.$inertia.form({
                category: this.category,
            }),
        }
    },
    methods: {
        generateCode() {
            this.form.post(route('codes.store'));
        },
        removeCode(code) {
            this.$inertia.delete(route('codes.delete', { code:code }), {
                preserveScroll: true,
            });
        }
    }
}
</script>

<style scoped>

</style>
