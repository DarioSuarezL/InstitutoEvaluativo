<script setup>
import { Link, router } from '@inertiajs/vue3';
import RedButton from '@/Components/RedButton.vue';
// import GreenButton from '@/Components/GreenButton.vue';

const props = defineProps({
    tipos: {
        type: Array,
        required: true,
    },
})

const deleteTipo = (id) => {
    if(confirm('¿Estás seguro de eliminar este tipo?')) {
        router.delete(route('tipos.destroy', id));
    }
}

</script>

<template>
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
                    <div class="flex justify-center space-x-2">
                        <RedButton
                            @click="deleteTipo(tipo.id)"
                        >
                            Eliminar
                        </RedButton>
                        <!-- <GreenButton
                            @click="router.get(route('tipos.edit', tipo.id))"
                        >
                            Editar
                        </GreenButton> -->
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
