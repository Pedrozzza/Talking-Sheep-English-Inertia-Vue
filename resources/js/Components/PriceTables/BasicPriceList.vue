<template>
    <table class="w-full rounded-2xl">
        <thead class="border bg-blue-800 shadow-md">
        <tr>
            <th scope="col" class="text-base 2xl:text-xl font-bold text-white px-4 2xl:px-6 py-4 text-left">
                Druh Kurzu
            </th>
            <th scope="col" class="text-base 2xl:text-xl font-bold text-white px-4 2xl:px-6 py-4 text-left">
                Cena
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="border shadow-md" style="background-color: #2778c417">
            <td class="text-gray-900 px-4 2xl:px-6 py-4 whitespace-nowrap">
                Individuální výuka
            </td>
            <td class="text-gray-900 px-4 2xl:px-6 py-4 whitespace-nowrap">
                400 Kč / 60 minut
            </td>
        </tr>
        <tr class="border bg-white shadow-md">
            <td class="text-gray-900 px-4 2xl:px-6 py-4 whitespace-nowrap">
                Skupinová výuka
            </td>
            <td class="text-gray-900 px-4 2xl:px-6 py-4 whitespace-nowrap">
                200 Kč / 60 minut
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "BasicPriceList"
}
</script>

<style scoped>

</style>
