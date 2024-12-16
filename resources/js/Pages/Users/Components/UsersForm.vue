<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: {
        type: Object,
        required: false,
    },
});

const form = useForm({
    name: props.user ? props.user.name : '',
    email: props.user ? props.user.email : '',
    password: '',
    password_confirmation: '',
});

const buttonDisabled = () => {
    if(props.user) {
        if(form.password) {
            return form.processing || form.name == props.user.name && form.email == props.user.email && !form.password || !form.password_confirmation || form.password != form.password_confirmation;
        }else{
            return form.processing || form.name == props.user.name && form.email == props.user.email;
        }
    }else{
        return form.processing && !form.name || !form.email || !form.password || !form.password_confirmation || form.password != form.password_confirmation;
    }
}

const passwordLabel = props.user ? 'Nueva contraseña' : 'Contraseña';

const submit = () => {
    if(props.user) {
        form.put(route('users.update', props.user.id));
    } else {
        form.post(route('users.store'));
    }
};
</script>

<template>
    <form @submit.prevent="submit" class="p-3">
        <div>
            <InputLabel for="name" value="Nombre" />
            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus/>
            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="mt-4">
            <InputLabel for="email" value="Correo electrónico" />
            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                autocomplete="username" />
            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-6" v-if="props.user">
            <strong class="text-lg">Llene los siguientes campos si desea cambiar contraseña</strong>
        </div>

        <div class="mt-4">
            <InputLabel for="password" :value="passwordLabel" />
            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" :required="!user" />
            <InputError class="mt-2" :message="form.errors.password" />
        </div>
        <div class="mt-4">
            <InputLabel for="password_confirmation" value="Confirmar contraseña" />
            <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                v-model="form.password_confirmation" :required="!user" />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>
        <div class="mt-4 flex justify-end">
            <PrimaryButton
                class="ms-4"
                :class="{ 'opacity-50': buttonDisabled() }"
                :disabled="buttonDisabled()"
            >
                {{ props.user ? 'Actualizar datos' : 'Registrar usuario' }}
            </PrimaryButton>
        </div>

    </form>
</template>
