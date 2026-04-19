<template>
    <div>
            Hello from inertia {{ name }}
            {{ $page.props.auth.user.username }}

        <ul>
            <li v-for="framework in frameworks">
                {{ framework }}
            </li>
        </ul>

        <div style="margin-top: 500px;">
            <p>The current time is {{time}}</p>
            <Link href="/" preserve-scroll>Refresh</Link>
        </div>
        
    </div>
</template>

<script setup>

import { Link } from '@inertiajs/vue3';
import Layout from '../shared/Layout.vue';

defineProps({
    name: String,
    frameworks: Array,
    time: String
})

defineOptions({
    layout: Layout
})



</script>

<style scoped>
</style>
