<template>
    <jet-form-section @submitted="updateContactsData">

        <template #title>
            Konfigurace - Kontakty
        </template>

        <template #description>
            V této sekci lze změnit obsah týkající se strany - Kontakty.
        </template>

        <template #form>

            <!-- Main Contact title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainContactTitle" value="Hlavní titulek (povinný údaj)" />
                <jet-input id="mainContactTitle" type="text" class="mt-1 block w-full" v-model="form.contact_main_title"  autocomplete="mainContactTitle" />
                <jet-input-error :message="form.errors.contact_main_title" class="mt-2" />
            </div>

            <!-- Main Contact subtitle -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainContactSubtitle" value="Hlavní podtitulek (povinný údaj)" />
                <jet-input id="mainContactSubtitle" type="text" class="mt-1 block w-full" v-model="form.contact_main_subtitle"  autocomplete="mainContactSubtitle" />
                <jet-input-error :message="form.errors.contact_main_subtitle" class="mt-2" />
            </div>

            <!-- Contact email -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="contactEmail" value="Email (povinný údaj)" />
                <jet-input id="contactEmail" type="text" class="mt-1 block w-full" v-model="form.contact_email"  autocomplete="contactEmail" />
                <jet-input-error :message="form.errors.contact_email" class="mt-2" />
            </div>

            <!-- Contact phone -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="contactPhone" value="Telefonní číslo (povinný údaj)" />
                <jet-input id="contactPhone" type="text" class="mt-1 block w-full" v-model="form.contact_phone"  autocomplete="contactPhone" />
                <jet-input-error :message="form.errors.contact_phone" class="mt-2" />
            </div>

            <!-- Contact address -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="contactAddress" value="Adresa (povinný údaj)" />
                <jet-input id="contactAddress" type="text" class="mt-1 block w-full" v-model="form.contact_address"  autocomplete="contactAddress" />
                <jet-input-error :message="form.errors.contact_address" class="mt-2" />
            </div>

            <!-- Contact website -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="contactWebsite" value="Web (povinný údaj)" />
                <jet-input id="contactWebsite" type="text" class="mt-1 block w-full" v-model="form.contact_website"  autocomplete="contactWebsite" />
                <jet-input-error :message="form.errors.contact_website" class="mt-2" />
            </div>

        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Sekce uložena.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Uložit sekci
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import TextArea from "../../Components/TextArea";

export default defineComponent({
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        TextArea
    },

    props: ['settings'],

    data() {
        return {
            form: this.$inertia.form({
                contact_main_title: this.settings.data.contact_main_title,
                contact_main_subtitle: this.settings.data.contact_main_subtitle,
                contact_email: this.settings.data.contact_email,
                contact_phone: this.settings.data.contact_phone,
                contact_address: this.settings.data.contact_address,
                contact_website: this.settings.data.contact_website,
            }),
        }
    },

    methods: {
        updateContactsData() {
            this.form.post(route('settings.save-contacts'), {
                preserveScroll: true,
            });
        },
    },
})

</script>

<style scoped>

</style>
