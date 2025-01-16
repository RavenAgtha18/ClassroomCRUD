<template>
  <Head title=" show student page" />
  <FrontendLayout>
    <div class="mt-4 mx-4">
      <div class="flex justify-between">
        <Link
          :href="route('siswa.index')"
          class="bg-red-600 inline-block text-white py-2 px-5 rounded mb-4"
          >Back</Link
        >
      </div>
      <div class="w-full p-4">
        <div class="bg-gray-100 rounded shadow-md p-6">
          <h6 class="mb-4 text-lg font-semibold">Show Student Form</h6>

          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input
              disabled
              type="text"
              v-model="form.name"
              class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            />
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Class</label>
            <input
              disabled
              type="text"
              v-model="form.kelas"
              class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            />
          </div>
        </div>
      </div>
    </div>
  </FrontendLayout>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";

const props = defineProps({ errors: Object, siswa: Object });
const form = useForm({
  name: props.siswa.name,
  kelas: props.siswa.kelas,
});
</script>
