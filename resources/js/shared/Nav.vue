<template>
  <nav >
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

      <div class="flex items-center gap-2">
        <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-blue-500 to-indigo-500"></div>
        <h1 class="text-xl font-semibold tracking-tight text-gray-800">
          MyApp
        </h1>
      </div>

      <div class="flex items-center gap-2 bg-gray-100 p-1 rounded-xl">

        <Link
          v-for="link in links"
          :key="link.path"
          :href="link.path"
          class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200"
          :class="{
            'bg-white shadow text-blue-600': $page.component === link.component,
            'text-gray-600 hover:text-gray-900 hover:bg-white/60': $page.component !== link.component
          }"
        >
          {{ link.name }}
        </Link>

      </div>

      <div class="flex items-center gap-3">

        <div class="hidden md:flex items-center gap-2 px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">
          <div class="w-2 h-2 bg-green-500 rounded-full"></div>
          Online
        </div>

        <!-- LOGOUT -->
        <Link
          href="/logout"
          method="post"
          as="button"
          class="px-4 py-2 rounded-lg text-sm font-medium bg-red-500 text-white hover:bg-red-600 transition-all"
        >
          Logout
        </Link>

      </div>

    </div>
  </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const links = ref([
  { path: '/', name: 'Index', component: 'Index' },
  { path: '/users', name: 'Users', component: 'Users' },
  { path: '/posts', name: 'Posts', component: 'Posts' },
  { path: '/roles', name: 'Roles', component: 'Roles' },
])
</script>