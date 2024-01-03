<script setup>
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
    item: null,
    category: null,
    desc: null,
    price: null,
    owner: null
});
const SubmitStationaryForm = () => {
    // console.log(form);
    form.transform((data) => ({
        ...data,
    })).post(route("stationary.store"));
};
</script>

<template>
    <div class="container mx-auto py-6">
        <h1 class="font-bold text-2xl mb-3 text-center text-cyan-300">Stationary Create</h1>
        <form
            @submit.prevent="SubmitStationaryForm"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2 mx-auto"
        >
            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="item"
                >
                    Item
                </label>
                <input
                    v-model="form.name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    placeholder="Item"
                />
            </div>
             <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="category"
                >
                    Category
                </label>
                <input
                    v-model="form.category"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    placeholder="Category"
                />
            </div>
             <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="desc"
                >
                    Description
                </label>
                <input
                    v-model="form.desc"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    placeholder="Description"
                />
            </div>
            <div class="mb-6">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="price"
                >
                    Price
                </label>
                <input
                    v-model="form.price"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="number"
                    placeholder="100"
                />
            </div>
            <div class="mb-6">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="owner"
                >
                    Owner
                </label>
                <input
                    v-model="form.owner"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                />
            </div>
       
            <div class="flex items-center justify-between">
                <button
                    class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Add
                </button>
            </div>
        </form>
    </div>
</template>
