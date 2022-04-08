<template>
    <jet-form-section @submitted="updatePriceListData">

        <template #title>
            Konfigurace - Ceník
        </template>

        <template #description>
            V této sekci lze změnit obsah týkající se strany - Ceník.
        </template>

        <template #form>

            <!-- Main Price title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainPriceTitle" value="Hlavní titulek (povinný údaj)" />
                <jet-input id="mainPriceTitle" type="text" class="mt-1 block w-full" v-model="form.price_main_title"  autocomplete="mainPriceTitle" />
                <jet-input-error :message="form.errors.price_main_title" class="mt-2" />
            </div>

            <!-- Main Price subtitle -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainPriceSubtitle" value="Hlavní podtitulek (povinný údaj)" />
                <jet-input id="mainPriceSubtitle" type="text" class="mt-1 block w-full" v-model="form.price_main_subtitle"  autocomplete="mainPriceSubtitle" />
                <jet-input-error :message="form.errors.price_main_subtitle" class="mt-2" />
            </div>

            <!-- Price photo -->
            <div class="col-span-6 sm:col-span-6">
                <input type="file" class="hidden"
                       ref="photo"
                       @change="updatePhotoPreview">

                <jet-label for="photo" value="Fotka" />

                <!-- Current Price Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="settings.data.price_photo"  class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Price Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          :style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Vyberte novou fotku
                </jet-secondary-button>

                <jet-input-error :message="form.errors.price_photo" class="mt-2" />
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
                price_main_title: this.settings.data.price_main_title,
                price_main_subtitle: this.settings.data.price_main_subtitle,
                price_photo: null,
            }),
            photoPreview: null,
        }
    },

    methods: {
        updatePriceListData() {
            if (this.$refs.photo) {
                this.form.price_photo = this.$refs.photo.files[0]
            }

            this.form.post(route('settings.save-priceList'), {
                preserveScroll: true,
            });
        },

        selectNewPhoto() {
            this.$refs.photo.click();
        },

        updatePhotoPreview() {
            const photo = this.$refs.photo.files[0];

            if (! photo) return;

            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(photo);
        },
    },
})

</script>

<style scoped>

</style>
