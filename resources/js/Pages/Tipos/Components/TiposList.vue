<script setup>

const props = defineProps({
    tipos: {
        type: Array,
        required: true,
    },
})

</script>

<template>
    <div class="p-6 lg:p-8 bg-white">
        <div class="bg-gray-100 border rounded-lg lg:w-2/3 mx-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t" v-for="tipo in tipos" :key="tipo.id">
                        <td class="p-3 text-center">{{ tipo.id }}</td>
                        <td class="p-3 text-center">{{ tipo.nombre }}</td>
                        <td class="p-3 text-center">
                            <button>Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
