<template>
    <div>
        <button @click.prevent="show = true">
            <font-awesome-icon :icon="['fas', 'eye']" class="mr-1"/>
            {{ folder.visibility }}
        </button>

        <modal :show="show">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" style="height: 200px">
                <div class="sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg">
                            Změnit viditelnost kategorie <strong>{{ folder.title }}</strong> na:
                        </h3>
                        <div class="mt-4">
                            <select v-model="selected" class="form-select appearance-none
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding bg-no-repeat
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                <option v-for="(visibility, index) in visibilities" :key="index">
                                    {{ visibility }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-100 text-right">
                <secondary-button @click="show = false">
                    Odejít
                </secondary-button>
                <jet-button class="ml-4" @click.prevent="changeVisibility">
                    Změnit viditelnost
                </jet-button>
            </div>
        </modal>
    </div>
</template>

<script>
import SecondaryButton from "../Jetstream/SecondaryButton";
import Modal from "../Jetstream/Modal";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faEye } from "@fortawesome/free-solid-svg-icons";
import JetButton from '@/Jetstream/Button.vue'
import Swal from "sweetalert2";

library.add(faEye);

export default {
    name: "UserRolesButton",
    components: {
        SecondaryButton,
        Modal,
        JetButton,
    },
    props: {
        folder: {
            type: Object,
            required: true,
        },
        visibilities: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            show: false,
            selected: this.folder.visibility,
        }
    },
    methods: {
        changeVisibility() {
            this.$inertia.post(route('folders.change-visibility', { _method:'PUT', visibility: this.selected, folder: this.folder.id }), {
                preserveScroll: true,
            });
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title:  `Viditelnost kategorie <strong>${this.folder.title}</strong> byla úspěšně změněna`,
                showConfirmButton: false,
                timer: 3000
            })
            this.show = false
        }
    }
}
</script>

<style scoped>

</style>
