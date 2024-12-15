<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    nombre: '',
});

const submit = () => {
    form.post(route('tipos.store'));
}

</script>

<template>
    <form @submit.prevent="submit" class="flex justify-between items-center">
        <div>
            <TextInput id="nombre" type="text" class="mt-1 block w-full" v-model="form.nombre" required placeholder="Nombre:" />
            <InputError class="mt-2" :message="form.errors.nombre" />
        </div>
        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Registrar tipo
        </PrimaryButton>
    </form>
</template>
