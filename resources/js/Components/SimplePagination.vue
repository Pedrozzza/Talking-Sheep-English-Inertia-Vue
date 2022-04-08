<template>
    <div class="flex items-center justify-between">
        <button-secondary :href="prevUrl" :disable="!prevUrl" :class="{ 'opacity-50': !prevUrl }">
            <div>
                <font-awesome-icon :icon="['fas', 'arrow-left']" class="mr-2"/>
                Předchozí
            </div>
        </button-secondary>
        <button-secondary :href="nextUrl" :disable="!nextUrl" :class="{ 'opacity-50': !nextUrl }">
            <div>
                Další
                <font-awesome-icon :icon="['fas', 'arrow-right']" class="ml-2"/>
            </div>
        </button-secondary>
    </div>
</template>

<script>
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faArrowLeft, faArrowRight } from "@fortawesome/free-solid-svg-icons";

library.add(faArrowLeft, faArrowRight);

export default {
    name: "SimplePagination",
    props: {
        prevUrl: {
            type: String,
        },
        nextUrl: {
            type: String,
        }
    },
    components: {
        ButtonSecondary
    }
}
</script>

<style scoped>

</style>
