<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    cards: Object
});
</script>

<template>
    <Head title="Gift Cards" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold text-gray-600 leading-tight mb-6">
                Card management
            </h1>

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-100">
                <div class="font-bold mb-4">
                    <Link href="/cards/create" class="rounded text-green-500 hover:text-green-700">
                        Add new card
                    </Link>
                </div>
                <ul>
                    <li v-for="card in cards.data" :key="card.id" class="flex text-gray-400 mb-1 p-2 items-center border-gray-600 rounded">
                        <span class="flex-1">Card number: {{ card.card_number }} - {{ card.balance }} PLN</span>

                        <Link :href="`/cards/${card.id}/edit`" class="text-yellow-700 hover:text-yellow-900 px-3 py-1 mr-3">
                            Edit
                        </Link>

                        <Link :href="`/cards/${card.id}`" method="delete" as="button" class="text-red-700 hover:text-red-900 px-3 py-1 cursor-pointer">
                            Delete
                        </Link>
                    </li>
                </ul>
                
                <div class="flex flex-wrap gap-2 mt-6">
                    <template v-for="(link, index) in cards.links" :key="index">
                        <Link 
                            v-if="link.url"
                            :href="link.url"
                            v-html="link.label"
                            class="border rounded px-3 py-1"
                            :class="link.active ? 'bg-blue-500 font-bold' : 'hover:bg-gray-600'"
                        />
                        <span
                            v-else
                            v-html="link.label"
                            class="border rounded px-3 py-1 text-gray-400"
                        ></span>
                    </template>
                </div>

            </div>
        </div>
    </div>
</template>