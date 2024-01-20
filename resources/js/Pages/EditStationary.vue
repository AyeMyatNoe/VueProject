<script setup>
import { useForm } from "@inertiajs/vue3";
// import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    editStationary: {
        type: Object,
    },
    categories: {
        type: Object,
    },
});
//  console.log(props.editStationary.data);
const form = useForm({
    id: props.editStationary.id,
    item: props.editStationary.item,
    category: props.categories.category,
    desc: props.editStationary.description,
    price: props.editStationary.price,
    owner: props.editStationary.owner,
    cond: props.editStationary.cond,
    type: props.editStationary.type,
    address: props.editStationary.address,
    phone: props.editStationary.phone,
    _method: "put",
});

const Update = () => {
    // console.log(form);
    form.transform((data) => ({
        ...data,
    })).post(route("stationary.update", form.id));
};
</script>
<template>
    <div
        class="container mx-auto py-6 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2"
    >
        <h1 class="font-bold text-2xl mb-3 text-center text-cyan-300">
            Edit Items
        </h1>
        <div class="grid grid-cols-2 gap-8">
            <!-- Item Information Form -->
            <div>
                <h3 class="mb-5">Item Information</h3>
                <form @submit.prevent="Update">
                    <!-- ... (your item information fields) ... -->
                    <div>
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="item"
                            >
                                Item Name <span class="text-red-800">*</span>
                            </label>
                            <input
                                v-model="form.item"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text"
                                placeholder="Input Name"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="category"
                            >
                                Select Category<span class="text-red-800"
                                    >*</span
                                >
                            </label>
                            <select
                                id=""
                                name=""
                                v-model="form.category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option
                                    v-for="data in categories"
                                    :value="data.id"
                                    class="sm:text-sm text-xs"
                                >
                                    {{ data.category }}
                                </option>
                            </select>
                            <!-- <input
                                v-model="form.category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text"
                                placeholder="Select Category"
                            /> -->
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
                                Price<span class="text-red-800">*</span>
                            </label>
                            <input
                                v-model="form.price"
                                class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number"
                                placeholder="Enter Price"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="condition"
                            >
                                Select Item Condition
                            </label>
                            <select
                                v-model="form.cond"
                                name="cond"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option value="" disabled>
                                    Select Item Condition
                                </option>
                                <option value="1" :selected="form.cond === '1'">
                                    Condition 1
                                </option>
                                <option value="2" :selected="form.cond === '2'">
                                    Condition 2
                                </option>
                                <option value="3" :selected="form.cond === '3'">
                                    Condition 3
                                </option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="type"
                            >
                                Select Item Type
                            </label>
                            <select
                                v-model="form.type"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option value="" disabled>
                                    Select Item Type
                                </option>
                                <option value="1" :selected="form.cond === '1'">
                                    Type 1
                                </option>
                                <option value="2" :selected="form.cond === '2'">
                                    Type 2
                                </option>
                                <option value="3" :selected="form.cond === '3'">
                                    Type 3
                                </option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="mb-6">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="publish"
                            >
                                Status
                            </label>
                            <input
                                value="1"
                                type="checkbox"
                                class="form-checkbox h-5 w-5 text-cyan-500 focus:outline-none focus:shadow-outline"
                            />
                            <span>Publish</span>
                        </div>
                        <!-- <div class="mb-6">
                            <label
                                for="file-upload"
                                class="flex flex-col items-center overflow-hidden relative justify-center custom-file-upload w-full h-32 rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 border-dotted dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                            >
                                <div
                                    class="flex flex-col items-center justify-center"
                                >
                                    <img
                                        v-if="imgSrc"
                                        :src="imgSrc"
                                        alt=""
                                        class="w-full h-32 absolute top-0 left-0"
                                    />
                                    <p
                                        v-else
                                        class="text-sm text-gray-500 dark:text-gray-400 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                                    >
                                        <button class="font-semibold bg-indigo-500 text-white px-2 py-1 rounded-md">
                                            Choose File
                                        </button>
                                    </p>
                                </div>
                                <input
                                    id="file-upload"
                                    type="file"
                                    accept="image/*"
                                    @change="onFile"
                                    @input="form.stationaryimage"
                                    class="hidden"
                                />
                            </label>
                        </div> -->
                        <div class="mb-6">
                            <p
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                Item Photo<span class="text-red-800">*</span>
                            </p>
                            <label
                                for="file-upload"
                                class="flex flex-col items-center overflow-hidden relative justify-center custom-file-upload w-full h-32 rounded-lg bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 border-dotted border-2 border-gray-300 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                            >
                                <div
                                    class="flex flex-col items-center justify-center"
                                >
                                    <img
                                        v-if="imgSrc"
                                        :src="imgSrc"
                                        alt=""
                                        class="w-full h-32 absolute top-0 left-0"
                                    />
                                    <p
                                        v-else
                                        class="text-sm text-gray-500 dark:text-gray-400 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                                    >
                                        <button
                                            @click="triggerFileInput"
                                            class="font-semibold bg-indigo-500 text-white px-2 py-1 rounded-md"
                                        >
                                            Choose File
                                        </button>
                                    </p>
                                </div>
                                <input
                                    id="file-upload"
                                    type="file"
                                    accept="image/*"
                                    @change="onFile"
                                    @input="form.photo"
                                    class="hidden"
                                />
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            <button
                                class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Owner Information Form -->
            <div>
                <h3 class="mb-5">Owner Information</h3>
                <form @submit.prevent="Update">
                    <div class="mb-6">
                        <label
                            class="block text-gray-700 text-sm font-bold mb-2"
                            for="owner"
                        >
                            Owner Name<span class="text-red-800">*</span>
                        </label>
                        <input
                            v-model="form.owner"
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text"
                            placeholder="Input Owner Name"
                        />
                    </div>

                    <label
                        for="search-dropdown"
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Contact Number
                    </label>
                    <div class="flex mb-6">
                        <button
                            id="dropdown-button"
                            data-dropdown-toggle="dropdown"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 dark:border-gray-700 dark:text-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                            type="button"
                        >
                            +95
                            <svg
                                class="w-2.5 h-2.5 ms-2.5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 10 6"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 1 4 4 4-4"
                                />
                            </svg>
                        </button>
                        <div
                            id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                        ></div>
                        <div class="relative w-full">
                            <input
                                v-model="form.phone"
                                type="number"
                                id="search-dropdown"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Add Number"
                                required
                            />
                            <button
                                type="submit"
                                class="absolute top-0 end-0 p-2.5 h-full text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            ></button>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label
                            class="block text-gray-700 text-sm font-bold mb-2"
                            for="address"
                        >
                            Address
                        </label>
                        <textarea
                            v-model="form.address"
                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="textarea"
                            placeholder="Enter Address"
                        />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
