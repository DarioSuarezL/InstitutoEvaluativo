<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import UsersForm from './Components/UsersForm.vue';

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

</script>

<template>
    <Head title="Administración" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Editar usuario
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="p-6 lg:p-8 bg-white">
                            <div class="flex justify-between mb-3">
                                <h1 class="mt-3 text-2xl font-medium text-gray-900">
                                    Formulario del usuario #{{ props.user.id }}
                                </h1>
                            </div>
                            <div class="bg-gray-100 border rounded-lg mx-auto">

                                <UsersForm :user="user" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
