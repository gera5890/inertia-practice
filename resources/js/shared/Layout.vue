<template>
    <section class="p-6 bg-gray-200 grid content-center">
        <header>
            <Nav></Nav>
        </header>
    </section>

    <section class="p-6">
        <slot>
        </slot>
    </section>
</template>

<script setup>

import Nav from './Nav.vue';

</script>

<style lang="scss" scoped>

</style>