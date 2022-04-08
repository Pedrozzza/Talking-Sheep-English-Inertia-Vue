<template>
    <div>
        <button @click.prevent="show = true" :disabled="role === 'Admin'">
            <font-awesome-icon :icon="['fas', 'user-tag']" class="mr-1"/>
            {{ role }}
        </button>

        <modal :show="show">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg">
                            Změnit roli studenta <strong>{{ student.name }}</strong> na:
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
                                <option v-for="(role, index) in roles" :key="index">
                                    {{ role }}
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
                <jet-button class="ml-4" @click.prevent="changeRole">
                    Změnit roli
                </jet-button>
            </div>
        </modal>
    </div>
</template>

<script>
import SecondaryButton from "../Jetstream/SecondaryButton";
import Modal from "../Jetstream/Modal";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserTag } from "@fortawesome/free-solid-svg-icons";
import JetButton from '@/Jetstream/Button.vue'
import Swal from "sweetalert2";

library.add(faUserTag);

export default {
    name: "UserRolesButton",
    components: {
        SecondaryButton,
        Modal,
        JetButton,
    },
    props: {
        student: {
            type: Object,
            required: true,
        },
        role: {
            type: String,
            required: true,
        },
        roles: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            show: false,
            selected: this.role,
        }
    },
    methods: {
        changeRole() {
            this.$inertia.post(route('students.change-role', { _method:'PUT', role: this.selected, user: this.student.id }), {
                preserveScroll: true,
            });
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title:  `Role studenta <strong>${this.student.name}</strong> byla úspěšně změněna`,
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
