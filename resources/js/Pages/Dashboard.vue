<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-flow-col grid-cols-1 grid-rows-4 gap-4">
                    <card>
                        Hello world
                    </card>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import Card from '../Components/Card';

export default {
    components: {
        Card,
        AppLayout,
    },
    props: {
        meetups: Array,
    },
};
</script>
