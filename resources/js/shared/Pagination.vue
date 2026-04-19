<template>
    <div class="mt-4 flex justify-end">
            <Component
                :is="link.url ? Link : 'span'"
                v-for="(link, index) in links"
                :key="index"
                :href="link.url"
                v-html="link.label"
                class="px-3 py-1 mx-1 border rounded transition"
                preserve-scroll
                :class="[
                    link.active 
                        ? 'bg-indigo-600 text-white scale-110 font-bold' 
                        : link.url
                            ? 'bg-white text-gray-700 hover:bg-gray-100' 
                            : 'text-gray-400 cursor-not-allowed' // disabled
                ]"
            />
        </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: Array
})

</script>

<style scoped>

</style>