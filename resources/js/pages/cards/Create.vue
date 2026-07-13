<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    card_number: '',
    pin: '',
    activation_date: '',
    expiration_date: '',
    balance: ''
});

function submit() {
    form.post('/cards');
};
</script>

<template>
    <Head title="Add Card"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-100">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Add new card</h1>
                    <Link href="/cards" class="text-blue-500 font-bold hover:underline">Back to list</Link>
                </div>

                <form @submit.prevent="submit">
                    
                    <div>
                        <label class="block font-medium text-sm mb-1">Card number (20 digits)</label>
                        <input 
                            v-model="form.card_number" 
                            type="text" 
                            maxlength="20"
                            @input="form.card_number = form.card_number.replace(/[^0-9]/g, '')"
                            class="border-gray-400 bg-gray-600 rounded-md shadow-sm w-full"
                            >
                        <div v-if="form.errors.card_number" class="text-red-500 mt-1"> {{ form.errors.card_number }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm mb-1">PIN</label>
                        <input 
                            v-model="form.pin" 
                            type="password" 
                            maxlength="4"
                            @input="form.pin = form.pin.replace(/[^0-9]/g, '')"
                            class="border-gray-400 bg-gray-600 rounded-md shadow-sm w-full"
                            >
                        <div v-if="form.errors.pin" class="text-red-500 mt-1"> {{ form.errors.pin }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm mb-1">Activation date and time</label>
                        <input 
                            v-model="form.activation_date" 
                            type="datetime-local" 
                            class="border-gray-400 bg-gray-600 rounded-md shadow-sm w-full"
                            >
                        <div v-if="form.errors.activation_date" class="text-red-500 mt-1"> {{ form.errors.activation_date }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm mb-1">Expiration date</label>
                        <input 
                            v-model="form.expiration_date" 
                            type="date" 
                            class="border-gray-400 bg-gray-600 rounded-md shadow-sm w-full"
                            >
                        <div v-if="form.errors.expiration_date" class="text-red-500 mt-1"> {{ form.errors.expiration_date }}</div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm mb-1">Amount (PLN)</label>
                        <input 
                        v-model="form.balance" 
                        type="number" step="0.01" 
                        class="border-gray-400 bg-gray-600 rounded-md shadow-sm w-full"
                        >
                        <div v-if="form.errors.balance" class="text-red-500 mt-1"> {{ form.errors.balance }}</div>
                    </div>
                    
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 font-bold" 
                            :disabled="form.processing">
                            Save card
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>