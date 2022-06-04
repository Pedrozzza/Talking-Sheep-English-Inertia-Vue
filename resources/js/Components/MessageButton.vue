<template>
    <div>
        <Button @click.prevent="show = true">
            Zobrazit zpávu
        </Button>

        <modal :show="show">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg">
                            Zpráva od: <strong>{{ name }}</strong>
                        </h3>
                        <div class="my-8">
                            <p>
                                {{ message }}
                            </p>
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
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import SecondaryButton from "../Jetstream/SecondaryButton";
import Button from "../Jetstream/Button";
import Modal from "../Jetstream/Modal";

export default {
    name: "MessageButton",
    components: {
        ButtonSecondary,
        SecondaryButton,
        Modal,
        Button
    },
    props: {
        message: {
            type: Object,
            required: true,
        },
        name: {
            type: Object,
            required: true
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
