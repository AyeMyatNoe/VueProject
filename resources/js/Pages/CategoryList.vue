<script setup>
import { defineProps } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import Pagination from "../Components/Pagination.vue";

const props = defineProps(["categories"]);
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
                        href="#"
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
            <h4 class="font-bold text-xl">Categories</h4>
        </div>

        <Link
            href="/category/create"
            class="float-right mt-5 mb-5 mr-10 bg-blue-500 rounded-md px-3 py-1 text-white"
        >
            <svg
                fill="#000000"
                viewBox="0 0 24 24"
                id="plus"
                data-name="Line Color"
                xmlns="http://www.w3.org/2000/svg"
                class="float-left icon line-color flex-shrink-0 w-5 h-5"
            >
                <path
                    id="primary"
                    d="M5,12H19M12,5V19"
                    style="
                        fill: none;
                        stroke: rgb(255, 255, 255);
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 2;
                    "
                ></path></svg
            ><span>Add Categories</span>
        </Link>
        <div class="mt-20">
            <label class="text-gray-700 font-bold mb-2" for="pg"> Show: </label>
            <select
                class="shadow appearance-none border rounded w-28 py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            >
                <option value="" disabled>10 rows</option>
                <option value="1">10 rows</option>
                <option value="2">Condition 2</option>
                <option value="3">Condition 3</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="container mx-auto mt-10 clear-both">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-white uppercase bg-blue-700 dark:bg-blue-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">Action</th>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Categories</th>
                        <th scope="col" class="px-6 py-3">Publish</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through categories array -->
                    <tr
                        v-for="(catg, index) in categories"
                        :key="catg.id"
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    >
                        <td class="px-6 py-4 flex">
                            <Link
                                :href="route('category.edit', catg.id)"
                                class="font-medium cursor-pointer mr-2"
                                ><svg
                                    fill="green"
                                    class="w-5 h-5"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.47,2.29a1,1,0,0,0-1.42,0L13.23,5.12h0L6.29,12.05A1,1,0,0,0,6,12.76ZM16.76,4.41l2.83,2.83L18.17,8.66,15.34,5.83ZM8,13.17l5.93-5.93,2.83,2.83L10.83,16H8Z"
                                    /></svg
                            ></Link>
                            <!-- <Link
                            :href="route('stationary.show', stationary.id)"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2"
                            ></Link
                        > -->
                            <form
                                :action="route('category.destroy', catg.id)"
                                method="post"
                                @submit.prevent="
                                    $inertia.delete(
                                        route('category.destroy', catg.id)
                                    )
                                "
                            >
                                <button
                                    type="submit"
                                    class="font-medium cursor-pointer"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        viewBox="0 0 24 24"
                                        fill="red"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z"
                                            fill="red"
                                        />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">{{ index + 1 }}</td>
                        <td class="px-6 py-4">{{ catg.category }}</td>
                        <td>
                            <label
                                class="relative inline-flex items-center cursor-pointer"
                            >
                                <input
                                    type="checkbox"
                                    value=""
                                    class="sr-only peer"
                                    checked
                                />
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                                ></div>
                                <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Checked toggle</span
                                >
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
