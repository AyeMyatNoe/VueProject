<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import CKEditor from "ckeditor4-vue";

const editor = ref({
    language: "en",
});

const content = ref("");

const fileInputRef = ref(null);

const triggerFileInput = () => {
    // Programmatically trigger the file input
    fileInputRef.value.click();
};

const form = useForm({
    category: null,
    photo: null,
});

const imgSrc = ref("");
var imgnoborder = true;
const onFile = (e) => {
    const files = e.target.files;

    if (!files.length) return;

    const reader = new FileReader();
    reader.readAsDataURL(files[0]);
    var imgname = files[0].name;
    reader.onload = () => (
        (imgSrc.value = reader.result), (imgnoborder = false)
    );
    form.classimage = files[0];
    console.log(form.classimage);
};
const pfimgborder = () => {
    if (imgnoborder) {
        return "profileimgnoborder";
    }
};
const submitCategoryForm = () => {
    form.transform((data) => ({
        ...data,
    })).post(route("category.store"));
};
</script>
<template>
    <button
        data-drawer-target="default-sidebar"
        data-drawer-toggle="default-sidebar"
        aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    >
        <span class="sr-only">Open sidebar</span>
        <svg
            class="w-6 h-6"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                clip-rule="evenodd"
                fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
            ></path>
        </svg>
    </button>

    <aside
        id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar"
    >
        <div
            class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800"
        >
            <ul class="space-y-2 font-medium">
                <li>
                    <a
                        href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                        <svg
                            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 22 21"
                        >
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"
                            />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"
                            />
                        </svg>
                        <span class="ms-3 font-bold text-2xl">Admin Panel</span>
                    </a>
                </li>
                <li>
                    <Link
                        :href="route('stationary.index')" 
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                        <svg
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 18 18"
                        >
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                            />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Item</span>
                    </Link>
                </li>
                <li>
                    <Link
                        :href="route('category.index')" 
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                        <svg
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            viewBox="0 0 48 48"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g data-name="Layer 2">
                                <path
                                    fill="none"
                                    data-name="invisible box"
                                    d="M0 0h48v48H0z"
                                />
                                <path
                                    d="M24 10a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2 2 2 0 0 1-2 2H26a2 2 0 0 1-2-2Zm0 14a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2 2 2 0 0 1-2 2H26a2 2 0 0 1-2-2Zm0 14a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2 2 2 0 0 1-2 2H26a2 2 0 0 1-2-2ZM12 2a2.1 2.1 0 0 0-1.7 1L4.2 13a2.3 2.3 0 0 0 0 2 1.9 1.9 0 0 0 1.7 1H18a2.1 2.1 0 0 0 1.7-1 1.8 1.8 0 0 0 0-2l-6-10A1.9 1.9 0 0 0 12 2Zm0 28a6 6 0 1 1 6-6 6 6 0 0 1-6 6Zm4 14H8a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2Z"
                                    data-name="icons Q2"
                                />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap"
                            >Category</span
                        >
                    </Link>
                </li>

                <li class="py-96">
                    <a
                        href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                        <svg
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 18 16"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"
                            />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap"
                            >Logout</span
                        >
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div
            class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700"
        >
            <h1 class="font-bold text-2xl text-center text-cyan-300">
                Add Categories
            </h1>
        </div>

        <div class="grid grid-cols-2 gap-8">
            <!-- Category Information Form -->
            <div>
                <form @submit.prevent="submitCategoryForm">
                    <!-- ... (your item information fields) ... -->
                    <div>
                        <div class="mb-4 mt-3">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="category"
                            >
                                Select Category<span class="text-red-800"
                                    >*</span
                                >
                            </label>
                            <input
                                v-model="form.category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="text"
                                placeholder="Select Category"
                            />
                        </div>

                        <div class="mb-6">
                            <p
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                Category Photo<span class="text-red-800"
                                    >*</span
                                >
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
                        <div class="float-right">
                            <Link
                                :href="route('category.index')"
                                class="mr-5 bg-gray-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Cancel
                            </Link>
                            <button
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
