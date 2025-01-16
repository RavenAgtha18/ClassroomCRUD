<template>
  <Frontend>
    <Head title="siswa page" />
    <h1>this is siswa page</h1></Frontend
  >
</template>

<script setup>
import Frontend from "@/Layouts/FrontendLayout.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
  title: String,
});
</script>

<style>
</style>
