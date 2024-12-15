<script setup>
import { router } from '@inertiajs/vue3';
import RedButton from '@/Components/RedButton.vue';

const props = defineProps({
    areas: {
        type: Array,
        required: true,
    },
})

const deleteArea = (id) => {
    if(confirm('¿Estás seguro de eliminar esta área de conocimiento?')) {
        router.delete(route('areas.destroy', id));
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
            <tr class="border-t" v-for="area in areas" :key="area.id">
                <td class="p-3 text-center">{{ area.id }}</td>
                <td class="p-3 text-center">{{ area.nombre }}</td>
                <td class="p-3 text-center">
                    <div class="flex justify-center space-x-2">
                        <RedButton
                            @click="deleteArea(area.id)"
                        >
                            Eliminar
                        </RedButton>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
