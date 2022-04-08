<template>
    <div>
        <button @click.prevent="show = true" :disabled="course.users.length < 1">
            <font-awesome-icon :icon="['fas', 'users']" class="mr-2"/>
            {{ course.users.length }}
        </button>

        <modal :show="show">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg">
                            Seznam uchazečů pro: <strong>{{ modelName }}</strong>
                        </h3>
                        <div class="my-8">
                            <table class="w-full rounded-2xl">
                                <thead class="border bg-blue-800 shadow-md">
                                <tr>
                                    <th scope="col" class="w-1/2 text-left text-xl font-bold text-white px-6 py-4">
                                        Uchazeč
                                    </th>
                                    <th scope="col" class="text-right text-xl font-bold text-white px-6 py-4">
                                        Odebrat
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in course.users" :key="user.id" class="border">
                                    <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ user.name }}</td>
                                    <td class="text-gray-900 px-6 py-4 pr-12 whitespace-nowrap flex justify-end">
                                        <button @click.prevent="removeUser(user.id)">
                                            <font-awesome-icon :icon="['fas', 'trash-alt']" class="text-xl text-red-700 hover:opacity-50"/>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-100 text-right">
                <secondary-button @click="show = false">
                    Odejít
                </secondary-button>
            </div>
        </modal>
    </div>
</template>

<script>
import DangerButton from "../Jetstream/DangerButton";
import SecondaryButton from "../Jetstream/SecondaryButton";
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import DeleteBtn from "./DeleteBtn";
import Swal from 'sweetalert2';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faTrashAlt } from "@fortawesome/free-solid-svg-icons";
import Modal from "../Jetstream/Modal";

library.add(faTrashAlt);

export default {
    name: "CourseUsersBtn",
    components: {
        ButtonSecondary,
        SecondaryButton,
        DangerButton,
        Swal,
        DeleteBtn,
        Modal
    },
    props: {
        modelName: {
            type: String,
            required: true
        },
        course: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            show: false,
        }
    },
    methods: {
        removeUser(userId) {
            this.$inertia.delete(route('courses.remove-user', { course: this.course.id, user: userId }), {
                preserveScroll: true,
            });
        }
    }
}
</script>

<style scoped>

</style>
