<template>
    <div>
        <Head title="Users"></Head>
        <div class="rounded-lg border-1 border-black mt-4 p-2">
            <div class="flex justify-between">
            <h1 class="text-2xl font-bold">Usuarios de la app</h1>
            <input type="text" name="search" v-model="search" placeholder="Search" class="border border-gray-600 rounded-lg p-2">
            </div>
            <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in users.data">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ user.name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ user.email }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{user.email}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                        <Link :href="`/users/${user.id}`" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                        <Link :href="`/users/${user.id}`" class="ml-2 text-red-600 hover:text-red-900">Delete</Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination :links="users.links"/>
        </div>
    </div>
</template>

<script setup>
import Layout from '../shared/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '../shared/Pagination.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
//Tenemos que instalar lodash
import { debounce } from 'lodash-es';


defineOptions({
    layout: Layout
})

const props = defineProps({
    users: Object,
    filters: Object
})

// Creamos una variable reactiva llamada `search`
// `ref()` hace que Vue esté pendiente de cambios en este valor
// Aquí la inicializas con lo que viene del backend (props.filters)
// 👉 normalmente esto viene de Laravel (request('search'))
const search = ref(props.filters)

// Creamos una función "debounced"
// 👉 debounce retrasa la ejecución hasta que el usuario deja de escribir
// En este caso: 300ms después de la última tecla

const debouncedSearch = debounce((value) => {

    // Hacemos una petición GET con Inertia
    router.get('/users', 
        
        // Estos son los parámetros que se mandan al backend
        // 👉 Laravel lo recibe como request('search')
        { search: value },

        {
            // Mantiene el estado del componente (no reinicia todo)
            // 👉 útil para no perder inputs, scroll, etc.
            preserveState: true,

            // Reemplaza el historial en vez de agregar uno nuevo
            // 👉 evita que el botón "atrás" se vuelva loco
            replace: true
        }
    )

// Espera 300ms después del último cambio antes de ejecutar
}, 500)

// `watch` observa cambios en la variable `search`
watch(search, value => {

    // Cada vez que `search` cambia (cuando el usuario escribe),
    // llamamos a la función con debounce

    debouncedSearch(value)
})

</script>

<style lang="scss" scoped>

</style>