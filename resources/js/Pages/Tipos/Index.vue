<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import TiposList from './Components/TiposList.vue';
import TiposForm from './Components/TiposForm.vue';


const props = defineProps({
    tipos: {
        type: Array,
        required: true,
    },
})

</script>

<template>
    <Head title="Administración" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Tipos de pregunta
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="p-6 lg:p-8 bg-white">
                            <div class="flex mb-3 justify-between">
                                <h1 class="mt-3 text-2xl font-medium text-gray-900">
                                    Lista de los tipos de preguntas
                                </h1>

                                <TiposForm />

                            </div>
                            <div class="bg-gray-100 border rounded-lg mx-auto">

                                <TiposList :tipos="tipos" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
