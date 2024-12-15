<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import AreasList from './Components/AreasList.vue';
import AreasForm from './Components/AreasForm.vue';

const props = defineProps({
    areas: {
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
                Áreas de conocimiento
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="p-6 lg:p-8 bg-white">
                            <div class="flex justify-around mb-3">
                                <h1 class="mt-3 text-2xl font-medium text-gray-900">
                                    Lista de las áreas de conocimiento
                                </h1>

                                <AreasForm />

                            </div>
                            <div class="bg-gray-100 border rounded-lg lg:w-2/3 mx-auto">

                                <!-- <TiposList :tipos="tipos" /> -->
                                <AreasList :areas="areas" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
