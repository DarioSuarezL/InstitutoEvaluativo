<script setup>
import { router } from '@inertiajs/vue3';
import RedButton from '@/Components/RedButton.vue';

const props = defineProps({
    users: {
        type: Array,
        required: true,
    },
})

const deleteUser = (id) => {
    // if(confirm('¿Estás seguro de eliminar este usuario?')) {
    //     router.delete(route('users.destroy', id));
    // }
    console.log('deleteUser', id);
}

</script>

<template>
    <table class="w-full">
        <thead>
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Email</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t" v-for="user in users" :key="user.id">
                <td class="p-3 text-center">{{ user.id }}</td>
                <td class="p-3 text-center">{{ user.name }}</td>
                <td class="p-3 text-center">{{ user.email }}</td>
                <td class="p-3 text-center">
                    <div class="flex justify-center space-x-2">
                        <RedButton
                            @click="deleteUser(user.id)"
                        >
                            Eliminar
                        </RedButton>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
