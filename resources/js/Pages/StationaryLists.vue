<script setup>
// import {
//     Table,
//     TableHead,
//     TableBody,
//     TableHeadCell,
//     TableRow,
//     TableCell,
// } from "flowbite-vue";
// import {
//    TableRow,
//    TableCell,
// } from "flowbite-vue";

import { useForm, Link } from "@inertiajs/vue3";
const props = defineProps({
    stationaries: Object,
});
</script>
<template>
    <Link
        href="/stationary/create"
        class="float-right mt-5 mb-5 mr-10 bg-blue-500 rounded-md px-3 py-1 text-white"
    >
        Add Items
    </Link>

    <div class="container mx-auto mt-10 clear-both">
        <h1 class="font-bold text-2xl mb-3">Item List</h1>
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-white uppercase bg-blue-700 dark:bg-blue-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3">Action</th>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Item</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Owner</th>
                    <th scope="col" class="px-6 py-3">Publish</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through stationaries array -->
                <tr
                    v-for="(stationary, index) in stationaries"
                    :key="stationary.id"
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                >
                    <td class="px-6 py-4">
                        <!-- <a :href="'/stationary/edit/' + stationary.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                <a :href="'/stationary/show/' + stationary.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                <a :href="'/stationary/destroy/' + stationary.id" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a> -->
                        <Link
                            :href="route('stationary.edit', stationary.id)"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2"
                            >Edit</Link
                        >
                        <!-- <Link
                            :href="route('stationary.show', stationary.id)"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2"
                            ></Link
                        > -->
                        <form
                            :action="route('stationary.destroy', stationary.id)"
                            method="post"
                            @submit.prevent="
                                $inertia.delete(
                                    route('stationary.destroy', stationary.id)
                                )
                            "
                        >
                            <button
                                type="submit"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4">{{ index + 1 }}</td>
                    <td class="px-6 py-4">{{ stationary.item }}</td>
                    <td class="px-6 py-4">{{ stationary.category }}</td>
                    <td class="px-6 py-4">{{ stationary.description }}</td>
                    <td class="px-6 py-4">$ {{ stationary.price }}</td>
                    <td class="px-6 py-4">{{ stationary.owner }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
