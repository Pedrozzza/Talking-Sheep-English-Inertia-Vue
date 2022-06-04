<template>
    <jet-action-section>
        <template #title>
            Smazat účet
        </template>

        <template #description>
            Trvale smažte svůj účet.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Jakmile bude váš účet smazán, budou trvale smazány všechny jeho zdroje a data. Před smazáním účtu si prosím stáhněte všechna data nebo informace, které si přejete zachovat.
            </div>
            <div class="mt-5">
                <jet-danger-button @click="confirmUserDeletion">
                    Smazat účet
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Smazat účet
                </template>

                <template #content>
                    Opravdu chcete smazat svůj účet? Jakmile bude váš účet smazán, budou trvale smazány všechny jeho zdroje a data. Zadejte prosím své heslo pro potvrzení, že chcete trvale smazat svůj účet.
                    <div class="mt-4">
                        <jet-input type="password" class="mt-1 block w-3/4" placeholder="Password"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="deleteUser" />

                        <jet-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Zrušit
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Opravdu smazat účet
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionSection from '@/Jetstream/ActionSection.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            JetActionSection,
            JetDangerButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            deleteUser() {
                this.form.delete(route('current-user.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingUserDeletion = false

                this.form.reset()
            },
        },
    })
</script>
