<template>
    <table class="w-full rounded-2xl">
        <thead class="border bg-blue-800 shadow-md">
        <tr>
            <th scope="col" class="text-xl font-bold text-white px-6 py-4 text-left">
                Týdenní sazba dle lekcí
            </th>
            <th scope="col" class="text-xl font-bold text-white px-6 py-4 text-left">
                1 měsíc
            </th>
            <th scope="col" class="text-xl font-bold text-white px-6 py-4 text-left">
                3 měsíce
            </th>
            <th scope="col" class="text-xl font-bold text-white px-6 py-4 text-left">
                6 měsíců
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="border shadow-md" style="background-color: #2778c417">
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                400 Kč / týden
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                1 600 Kč
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                4 800 Kč
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                9 600 Kč
            </td>
        </tr>
        <tr class="border bg-white">
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                Sleva
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">

            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                - 200 Kč
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                - 600 Kč
            </td>
        </tr>
        <tr class="border shadow-md" style="background-color: #2778c417">
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                800 Kč / týden
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                3 200 Kč
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                9 600 Kč
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                19 200 Kč
            </td>
        </tr>
        <tr class="border bg-white shadow-md">
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                Sleva
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">

            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                - 400 Kč
            </td>
            <td class="text-gray-900 px-6 py-4 whitespace-nowrap">
                - 1 100 Kč
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "DiscountPriceList"
}
</script>

<style scoped>

</style>
