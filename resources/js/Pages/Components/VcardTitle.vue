<template>
    <v-card-title class="px-0 pt-0 pb-1">
        <div class="pl-2 pt-1 text-sm uppercase">{{ heading }}<span class="d-none">{{ schoolId }}</span></div>
        <v-spacer></v-spacer>

        <div class="flex col-3 p-0 pt-1 mr-2">
            <input type="text" class="form-control form-control-sm" />
            <v-icon size="20" class="px-1">mdi-magnify</v-icon>
        </div>
    </v-card-title>

    <hr class="bg-gray-200 mb-1 mt-0" />
</template>

<script setup>
const props = defineProps({
    heading: String,
    schoolId: String,
})
</script>