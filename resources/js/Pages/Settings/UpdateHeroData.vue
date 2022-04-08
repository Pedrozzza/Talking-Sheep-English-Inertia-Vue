<template>
    <jet-form-section @submitted="updateHeroInformation">

        <template #title>
            Konfigurace - Hlavní strana
        </template>

        <template #description>
            V této sekci lze změnit informace týkající se hlavní strany webu.
        </template>

        <template #form>

            <!-- Main title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainTitle" value="Hlavní titulek (povinný údaj)" />
                <jet-input id="mainTitle" type="text" class="mt-1 block w-full" v-model="form.hero_main_title"  autocomplete="mainTitle" />
                <jet-input-error :message="form.errors.hero_main_title" class="mt-2" />
            </div>

            <!-- Main subtitle -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainSubtitle" value="Hlavní podtitulek (povinný údaj)" />
                <jet-input id="mainSubtitle" type="text" class="mt-1 block w-full" v-model="form.hero_main_subtitle"  autocomplete="mainSubtitle" />
                <jet-input-error :message="form.errors.hero_main_subtitle" class="mt-2" />
            </div>

            <!-- Main button title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainButtonTitle" value="Hlavní titulek tlačítka (povinný údaj)" />
                <jet-input id="mainButtonTitle" type="text" class="mt-1 block w-full" v-model="form.hero_main_button_title"  autocomplete="mainButtonTitle" />
                <jet-input-error :message="form.errors.hero_main_button_title" class="mt-2" />
            </div>

            <!-- Main card title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="mainCardTitle" value="Hlavní titulek nad info kartama (povinný údaj)" />
                <jet-input id="mainCardTitle" type="text" class="mt-1 block w-full" v-model="form.hero_main_card_title"  autocomplete="mainCardTitle" />
                <jet-input-error :message="form.errors.hero_main_card_title" class="mt-2" />
            </div>

            <!-- 1st card title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="firstCardTitle" value="První karta - titulek (povinný údaj)" />
                <jet-input id="firstCardTitle" type="text" class="mt-1 block w-full" v-model="form.hero_first_card_title"  autocomplete="firstCardTitle" />
                <jet-input-error :message="form.errors.hero_first_card_title" class="mt-2" />
            </div>

            <!-- 1st card title text1 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="firstCardText1" value="První karta - text k první části (povinný údaj)" />
                <TextArea id="firstCardText1" type="text" class="mt-1 block w-full" v-model="form.hero_first_card_text1"  autocomplete="firstCardText1" />
                <jet-input-error :message="form.errors.hero_first_card_text1" class="mt-2" />
            </div>

            <!-- 1st card title text2 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="firstCardText2" value="První karta - text k druhé části (povinný údaj)" />
                <TextArea id="firstCardText2" type="text" class="mt-1 block w-full" v-model="form.hero_first_card_text2"  autocomplete="firstCardText2" />
                <jet-input-error :message="form.errors.hero_first_card_text2" class="mt-2" />
            </div>

            <!-- 1st card button -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="firstCardButton" value="První karta - text k tlačítku (povinný údaj)" />
                <jet-input id="firstCardButton" type="text" class="mt-1 block w-full" v-model="form.hero_first_card_button"  autocomplete="firstCardButton" />
                <jet-input-error :message="form.errors.hero_first_card_button" class="mt-2" />
            </div>

            <!-- 2nd card title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="secondCardTitle" value="Druhá karta - titulek (povinný údaj)" />
                <jet-input id="secondCardTitle" type="text" class="mt-1 block w-full" v-model="form.hero_second_card_title"  autocomplete="secondCardTitle" />
                <jet-input-error :message="form.errors.hero_second_card_title" class="mt-2" />
            </div>

            <!-- 2nd card title text1 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="secondCardText1" value="Druhá karta - text k první části (povinný údaj)" />
                <TextArea id="secondCardText1" type="text" class="mt-1 block w-full" v-model="form.hero_second_card_text1"  autocomplete="secondCardText1" />
                <jet-input-error :message="form.errors.hero_second_card_text1" class="mt-2" />
            </div>

            <!-- 2nd card title text2 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="secondCardText2" value="Druhá karta - text k druhé části (povinný údaj)" />
                <TextArea id="secondCardText2" type="text" class="mt-1 block w-full" v-model="form.hero_second_card_text2"  autocomplete="secondCardText2" />
                <jet-input-error :message="form.errors.hero_second_card_text2" class="mt-2" />
            </div>

            <!-- 2nd card photo -->
            <div class="col-span-6 sm:col-span-6">
                <input type="file" class="hidden"
                       ref="photo"
                       @change="updatePhotoPreview">

                <jet-label for="photo" value="Druhá karta - fotka" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="settings.data.hero_second_card_photo"  class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          :style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Vyberte novou fotku
                </jet-secondary-button>

                <jet-input-error :message="form.errors.hero_second_card_photo" class="mt-2" />
            </div>

            <!-- 3rd card title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="thirdCardTitle" value="Třetí karta - titulek (povinný údaj)" />
                <jet-input id="thirdCardTitle" type="text" class="mt-1 block w-full" v-model="form.hero_third_card_title"  autocomplete="thirdCardTitle" />
                <jet-input-error :message="form.errors.hero_third_card_title" class="mt-2" />
            </div>

            <!-- 3rd card title text1 -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="thirdCardText1" value="Třetí karta - text (povinný údaj)" />
                <TextArea id="thirdCardText1" type="text" class="mt-1 block w-full" v-model="form.hero_third_card_text1"  autocomplete="thirdCardText1" />
                <jet-input-error :message="form.errors.hero_third_card_text1" class="mt-2" />
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
                hero_main_title: this.settings.data.hero_main_title,
                hero_main_subtitle: this.settings.data.hero_main_subtitle,
                hero_main_button_title: this.settings.data.hero_main_button_title,
                hero_main_card_title: this.settings.data.hero_main_card_title,
                hero_first_card_title: this.settings.data.hero_first_card_title,
                hero_first_card_text1: this.settings.data.hero_first_card_text1,
                hero_first_card_text2: this.settings.data.hero_first_card_text2,
                hero_first_card_button: this.settings.data.hero_first_card_button,
                hero_second_card_title: this.settings.data.hero_second_card_title,
                hero_second_card_text1: this.settings.data.hero_second_card_text1,
                hero_second_card_text2: this.settings.data.hero_second_card_text2,
                hero_second_card_photo: null,
                hero_third_card_title: this.settings.data.hero_third_card_title,
                hero_third_card_text1: this.settings.data.hero_third_card_text1,
            }),

            photoPreview: null,
        }
    },

    methods: {
        updateHeroInformation() {
            if (this.$refs.photo) {
                this.form.hero_second_card_photo = this.$refs.photo.files[0]
            }

            this.form.post(route('settings.save-hero'), {
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
