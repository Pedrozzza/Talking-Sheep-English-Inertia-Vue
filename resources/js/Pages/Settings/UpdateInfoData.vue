<template>
    <jet-form-section @submitted="updateInfoData">

        <template #title>
            Konfigurace - Informace
        </template>

        <template #description>
            V této sekci lze změnit obsah týkající se strany - Informace.
        </template>

        <template #form>

            <!-- Main Info title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainInfoTitle" value="Hlavní titulek (povinný údaj)" />
                <jet-input id="mainInfoTitle" type="text" class="mt-1 block w-full" v-model="form.info_main_title"  autocomplete="mainInfoTitle" />
                <jet-input-error :message="form.errors.info_main_title" class="mt-2" />
            </div>

            <!-- Main Info subtitle -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainInfoSubtitle" value="Hlavní podtitulek (povinný údaj)" />
                <jet-input id="mainInfoSubtitle" type="text" class="mt-1 block w-full" v-model="form.info_main_subtitle"  autocomplete="mainInfoSubtitle" />
                <jet-input-error :message="form.errors.info_main_subtitle" class="mt-2" />
            </div>

            <!-- Info bottom subtitle -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoBottomSubtitle" value="Spodní podtitulek (povinný údaj)" />
                <jet-input id="infoBottomSubtitle" type="text" class="mt-1 block w-full" v-model="form.info_bottom_subtitle"  autocomplete="infoBottomSubtitle" />
                <jet-input-error :message="form.errors.info_bottom_subtitle" class="mt-2" />
            </div>

            <!-- 1st card title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoFirstCardTitle" value="První karta - titulek (povinný údaj)" />
                <jet-input id="infoFirstCardTitle" type="text" class="mt-1 block w-full" v-model="form.info_first_card_title"  autocomplete="infoFirstCardTitle" />
                <jet-input-error :message="form.errors.info_first_card_title" class="mt-2" />
            </div>

            <!-- 1st card title text1 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoFirstCardText1" value="První karta - text k první části (povinný údaj)" />
                <TextArea id="infoFirstCardText1" type="text" class="mt-1 block w-full" v-model="form.info_first_card_text1"  autocomplete="infoFirstCardText1" />
                <jet-input-error :message="form.errors.info_first_card_text1" class="mt-2" />
            </div>

            <!-- 1st card title text2 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoFirstCardText2" value="První karta - text k druhé části (povinný údaj)" />
                <TextArea id="infoFirstCardText2" type="text" class="mt-1 block w-full" v-model="form.info_first_card_text2"  autocomplete="infoFirstCardText2" />
                <jet-input-error :message="form.errors.info_first_card_text2" class="mt-2" />
            </div>

            <!-- 2nd card title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoSecondCardTitle" value="Druhá karta - titulek (povinný údaj)" />
                <jet-input id="infoSecondCardTitle" type="text" class="mt-1 block w-full" v-model="form.info_second_card_title"  autocomplete="infoSecondCardTitle" />
                <jet-input-error :message="form.errors.info_second_card_title" class="mt-2" />
            </div>

            <!-- 2nd card title text1 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoSecondCardText1" value="Druhá karta - text k první části (povinný údaj)" />
                <TextArea id="infoSecondCardText1" type="text" class="mt-1 block w-full" v-model="form.info_second_card_text1"  autocomplete="infoSecondCardText1" />
                <jet-input-error :message="form.errors.info_second_card_text1" class="mt-2" />
            </div>

            <!-- 2nd card title text2 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoSecondCardText2" value="Druhá karta - text k druhé části (povinný údaj)" />
                <TextArea id="infoSecondCardText2" type="text" class="mt-1 block w-full" v-model="form.info_second_card_text2"  autocomplete="infoSecondCardText2" />
                <jet-input-error :message="form.errors.info_second_card_text2" class="mt-2" />
            </div>

            <!-- 3rd card title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoThirdCardTitle" value="Třetí karta - titulek (povinný údaj)" />
                <jet-input id="infoThirdCardTitle" type="text" class="mt-1 block w-full" v-model="form.info_third_card_title"  autocomplete="infoThirdCardTitle" />
                <jet-input-error :message="form.errors.info_third_card_title" class="mt-2" />
            </div>

            <!-- 3rd card title text1 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoThirdCardText1" value="Třetí karta - text k první části (povinný údaj)" />
                <TextArea id="infoThirdCardText1" type="text" class="mt-1 block w-full" v-model="form.info_third_card_text1"  autocomplete="infoThirdCardText1" />
                <jet-input-error :message="form.errors.info_third_card_text1" class="mt-2" />
            </div>

            <!-- 3rd card title text2 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="infoThirdCardText2" value="Třetí karta - text k druhé části (povinný údaj)" />
                <TextArea id="infoThirdCardText2" type="text" class="mt-1 block w-full" v-model="form.info_third_card_text2"  autocomplete="infoThirdCardText2" />
                <jet-input-error :message="form.errors.info_third_card_text2" class="mt-2" />
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
                info_main_title: this.settings.data.info_main_title,
                info_main_subtitle: this.settings.data.info_main_subtitle,
                info_bottom_subtitle: this.settings.data.info_bottom_subtitle,
                info_first_card_title: this.settings.data.info_first_card_title,
                info_first_card_text1: this.settings.data.info_first_card_text1,
                info_first_card_text2: this.settings.data.info_first_card_text2,
                info_second_card_title: this.settings.data.info_second_card_title,
                info_second_card_text1: this.settings.data.info_second_card_text1,
                info_second_card_text2: this.settings.data.info_second_card_text2,
                info_third_card_title: this.settings.data.info_third_card_title,
                info_third_card_text1: this.settings.data.info_third_card_text1,
                info_third_card_text2: this.settings.data.info_third_card_text2,
            }),
        }
    },

    methods: {
        updateInfoData() {
            this.form.post(route('settings.save-info'), {
                preserveScroll: true,
            });
        },
    },
})
</script>

<style scoped>

</style>
