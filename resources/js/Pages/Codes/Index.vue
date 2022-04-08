<template>
    <app-layout title="Registrační kódy">
        <template #header>
            <div class="flex items-center justify-between">
                <breadcrumbs :items="breadcrumbs"></breadcrumbs>
                <p class="flex items-center text-yellow-600 font-bold p-1 border-2 border-yellow-600">
                    <font-awesome-icon :icon="['fas', 'exclamation-triangle']" size="lg" class="mr-1"/>
                    Registrační kódy jsou rozděleny podle rolí uživatele. Ovlivní tedy obsah webu, který uživatel po registraci uvidí.
                </p>
            </div>
        </template>

        <div class="grid grid-cols-3 gap-8 mx-auto" style="width: 1300px">
            <code-card :label="'Začátečníci'" :codes="beginner_codes" :category="'beginner'"></code-card>
            <code-card :label="'Středně pokročilí'" :codes="intermediate_codes" :category="'intermediate'"></code-card>
            <code-card :label="'Pokročilí'" :codes="advanced_codes" :category="'advanced'"></code-card>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import Breadcrumbs from "../../Components/Breadcrumbs";
import ButtonGreen from "../../Jetstream/ButtonGreen";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faDice, faExclamationTriangle, faTrashAlt } from "@fortawesome/free-solid-svg-icons";
import CodeCard from "../../Components/CodeCard";

library.add(faDice, faExclamationTriangle, faTrashAlt);

export default {
    name: "Codes_Index",
    components: {
        CodeCard,
        AppLayout,
        Breadcrumbs,
        ButtonGreen
    },
    props: {
      beginner_codes: {
          type: Object,
          required: true
      },
      intermediate_codes: {
        type: Object,
        required: true
      },
      advanced_codes: {
        type: Object,
        required: true
      },
    },
    data() {
        return {
            form: this.$inertia.form({
                category: '',
            }),
        }
    },
    computed: {
        breadcrumbs() {
            return [
                {
                    label: 'Registrační kódy'
                }
            ];
        },
    },
    methods: {
        generateCode(category) {
            this.form.category = category;

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
