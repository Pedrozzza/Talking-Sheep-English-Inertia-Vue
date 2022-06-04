<template>
    <button @click.prevent="show = true" class="hover:opacity-50">
        <font-awesome-icon :icon="['fas', 'book-open']" class="mr-2 text-yellow-500"/>
        {{ folder.posts.length }}
    </button>

    <modal :show="show">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg">
                        Seznam lekcí pro: <strong>{{ modelName }}</strong>
                    </h3>
                    <div class="my-8">
                        <table class="w-full rounded-2xl">
                            <thead class="border bg-blue-800 shadow-md">
                            <tr>
                                <th scope="col" class="w-1/2 text-left text-xl font-bold text-white px-6 py-4">
                                    Lekce
                                </th>
                                <th scope="col" class="text-right text-xl font-bold text-white px-6 py-4">
                                    Možnosti
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="post in folder.posts" :key="post.id" class="border hover:bg-blue-100">
                                <td class="text-gray-900 px-6 py-4 whitespace-nowrap">{{ post.title }}</td>
                                <td class="text-gray-900 px-6 py-4 pr-12 whitespace-nowrap flex justify-end">
                                    <edit-btn :url="route('posts.edit', { post: post.id })" class="mr-4"></edit-btn>
                                    <delete-btn :url="route('posts.delete-from-folders', { post: post.id })" :model-name="post.title"></delete-btn>
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
</template>

<script>
import DangerButton from "../Jetstream/DangerButton";
import SecondaryButton from "../Jetstream/SecondaryButton";
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import DeleteBtn from "./DeleteBtn";
import Swal from 'sweetalert2';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faTrashAlt, faBookOpen } from "@fortawesome/free-solid-svg-icons";
import Modal from "../Jetstream/Modal";
import EditBtn from "./EditBtn";

library.add(faTrashAlt, faBookOpen);

export default {
    name: "PostsButton",
    components: {
        ButtonSecondary,
        SecondaryButton,
        DangerButton,
        Swal,
        DeleteBtn,
        Modal,
        EditBtn
    },
    props: {
        modelName: {
            type: String,
            required: true
        },
        folder: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            show: false,
        }
    },
}
</script>

<style scoped>

</style>
