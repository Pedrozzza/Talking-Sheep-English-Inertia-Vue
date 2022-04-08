<template>
    <div>
        <button-secondary @click.prevent="show = true" class="text-xl shadow-md">Mám zájem!</button-secondary>

        <confirmation-modal :show="show">
            <template #title>
                Přidat se na událost: {{ modelName }}
            </template>

            <template #content>
                Jste si jisti, že se chcete zařadit na seznam uchazečů?
            </template>

            <template #footer>
                <secondary-button @click="show = false">
                    Odejít
                </secondary-button>
                <danger-button class="ml-2" @click.prevent="addUser" :class="{'opacity-25': form.processing }" :disabled="form.processing">
                    Odeslat žádost
                </danger-button>
            </template>
        </confirmation-modal>
    </div>
</template>

<script>
import ConfirmationModal from "../Jetstream/ConfirmationModal";
import DangerButton from "../Jetstream/DangerButton";
import SecondaryButton from "../Jetstream/SecondaryButton";
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import Swal from 'sweetalert2';

export default {
    name: "CourseBtn",
    components: {
        ButtonSecondary,
        SecondaryButton,
        DangerButton,
        ConfirmationModal,
        Swal
    },
    props: {
        modelName: {
            type: String,
            required: true
        },
        courseId: {
            type: Number,
            required: true,
        }
    },
    data() {
        return {
            show: false,
            form: this.$inertia.form({})
        }
    },
    methods: {
        addUser() {
            this.form.post(route('courses.add-user', { course: this.courseId }), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title:  `Děkuji, byli jste úspěšně přidání na seznam uchazečů`,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            });
            this.show = false;
        }
    }
}
</script>

<style scoped>

</style>
