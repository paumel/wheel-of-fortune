<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'; import {Inertia} from "@inertiajs/inertia";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

function newGame() {
    Inertia.get(route('wheel'), {new_game: 1})
}
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
    >
        <button class="bg-indigo-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold" @click="newGame">New game</button>
    </div>
</template>
