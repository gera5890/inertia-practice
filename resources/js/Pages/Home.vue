<template>
    <div>
        <h1>
            Este es el home
        </h1>

        <div class="mt-40">
            <p>The current time is</p>
        </div>
    </div>
</template>

<script setup>
import Nav from '../shared/Nav.vue';
import Layout from '../shared/Layout.vue';

defineOptions({
    layout: Layout
})

</script>

<style lang="scss" scoped>

</style>