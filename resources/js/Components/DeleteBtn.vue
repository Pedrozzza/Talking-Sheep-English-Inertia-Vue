<template>
    <div>
        <button @click.prevent="show = true" v-show="modelName !== 'Admin'">
            <font-awesome-icon :icon="['fas', 'trash-alt']" class="text-xl text-red-700 hover:opacity-50"/>
        </button>

        <confirmation-modal :show="show">
            <template #title>
                Odstranit {{ modelName }}
            </template>

            <template #content>
                Jste si jisti, že chcete odstranit <strong>{{ modelName }}</strong>? Akce je nevratná!
            </template>

            <template #footer>
                <secondary-button @click="show = false">
                    Odejít
                </secondary-button>
                <danger-button class="ml-2" @click.prevent="deleteItem" :class="{'opacity-25': form.processing }" :disabled="form.processing">
                    Smazat
                </danger-button>
            </template>
        </confirmation-modal>
    </div>
</template>

<script>
import { library } from "@fortawesome/fontawesome-svg-core";
import { faTrashAlt } from "@fortawesome/free-solid-svg-icons";
import ConfirmationModal from "../Jetstream/ConfirmationModal";
import DangerButton from "../Jetstream/DangerButton";
import SecondaryButton from "../Jetstream/SecondaryButton";
import Swal from 'sweetalert2';

library.add(faTrashAlt);

export default {
    name: "DeleteBtn",
    components: {
        SecondaryButton,
        DangerButton,
        ConfirmationModal,
        Swal
    },
    props: {
        url: {
            type: String,
            required: true,
        },
        modelName: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            show: false,
            form: this.$inertia.form({})
        }
    },
    methods: {
        deleteItem() {
            this.form.delete(this.url);

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title:  `<strong>${this.modelName}</strong> byl úspěšně odstraněn`,
                showConfirmButton: false,
                timer: 2000
            })
        }
    }
}
</script>

<style scoped>

</style>
