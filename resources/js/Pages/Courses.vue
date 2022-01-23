<template>
    <welcome-layout :canLogin="canLogin" :canRegister="canRegister" :title="'Kurzy'">
        <div class="container mx-auto px-4">
            <div class="flex justify-center text-center">
                <h2 class="mt-16 text-4xl font-extrabold text-blue-800 text-shadow-md">Seznam aktuálních kurzů</h2>
            </div>
            <div>
                <p class="my-8 text-2xl font-bold flex justify-center">
                    Na této strance můžes najít přehled všech aktuálních kurzů, které v budoucnu proběhnou.
                </p>
            </div>
            <div class="flex justify-between px-2 mb-16">
                <card>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a href="#!">
                                <img class="w-full rounded-t-lg" :src="'../../storage/courses-photos/course1.jpg'" alt=""/>
                            </a>
                            <div class="p-6">
                                <h5 class="text-blue-800 text-center text-xl font-bold mb-2">English víkend v Podkrkonoší</h5>
                                <p class="text-gray-700 text-justify text-base mb-4">
                                    Víkend stráveny společně se všemi členy kurzu. Ideální šance se lépe poznat a seznámit.
                                    Se stravou a ubytováním, výukou, hrami a výlety! Přidej se k nám.
                                </p>
                                <p><strong>Datum:</strong> 15. 5. 2022 - 17. 5. 2022</p>
                                <p><strong>Místo konání:</strong> Miletín</p>
                                <p><strong>Cena kurzu:</strong> 2 900,- Kč</p>
                            </div>
                            <div class="flex justify-center mb-6">
                                <button-secondary class="text-xl shadow-md">Mám zájem!</button-secondary>
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a href="#!">
                                <img class="w-full rounded-t-lg" :src="'../../storage/courses-photos/course1.jpg'" alt=""/>
                            </a>
                            <div class="p-6">
                                <h5 class="text-blue-800 text-center text-xl font-bold mb-2">English víkend v Podkrkonoší</h5>
                                <p class="text-gray-700 text-justify text-base mb-4">
                                    Víkend stráveny společně se všemi členy kurzu. Ideální šance se lépe poznat a seznámit.
                                    Se stravou a ubytováním, výukou, hrami a výlety! Přidej se k nám.
                                </p>
                                <p><strong>Datum:</strong> 15. 5. 2022 - 17. 5. 2022</p>
                                <p><strong>Místo konání:</strong> Miletín</p>
                                <p><strong>Cena kurzu:</strong> 2 900,- Kč</p>
                            </div>
                            <div class="flex justify-center mb-6">
                                <button-secondary class="text-xl shadow-md">Mám zájem!</button-secondary>
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a href="#!">
                                <img class="w-full rounded-t-lg" :src="'../../storage/courses-photos/course1.jpg'" alt=""/>
                            </a>
                            <div class="p-6">
                                <h5 class="text-blue-800 text-center text-xl font-bold mb-2">English víkend v Podkrkonoší</h5>
                                <p class="text-gray-700 text-justify text-base mb-4">
                                    Víkend stráveny společně se všemi členy kurzu. Ideální šance se lépe poznat a seznámit.
                                    Se stravou a ubytováním, výukou, hrami a výlety! Přidej se k nám.
                                </p>
                                <p><strong>Datum:</strong> 15. 5. 2022 - 17. 5. 2022</p>
                                <p><strong>Místo konání:</strong> Miletín</p>
                                <p><strong>Cena kurzu:</strong> 2 900,- Kč</p>
                            </div>
                            <div class="flex justify-center mb-6">
                                <button-secondary class="text-xl shadow-md">Mám zájem!</button-secondary>
                            </div>
                        </div>
                    </div>
                </card>
            </div>
        </div>
    </welcome-layout>
</template>

<script>
import ButtonSecondary from "../Jetstream/ButtonSecondary";
import WelcomeLayout from "../Layouts/WelcomeLayout";

export default {
    name: "Courses",
    components: {
        WelcomeLayout,
        ButtonSecondary
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean
    }
}
</script>

<style scoped>

</style>
