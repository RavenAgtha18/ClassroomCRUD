<template>
  <Head title=" create student page" />
  <FrontendLayout>
    <div class="mt-4 mx-4">
      <div class="flex justify-between">
        <Link
          :href="route('kelas.index')"
          class="bg-red-600 inline-block text-white py-2 px-5 rounded mb-4"
          >Back</Link
        >
      </div>
      <div class="w-full p-4">
        <div class="bg-gray-100 rounded shadow-md p-6">
          <h6 class="mb-4 text-lg font-semibold">Add Class Form</h6>
          <form @submit.prevent="saveClass()">
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700"
                >Class</label
              >
              <input
                type="text"
                v-model="form.kelas"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
              />
              <div v-if="errors.class" class="text-red-500">
                {{ errors.class }}
              </div>
            </div>
            <button
              type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            >
              Save
            </button>
          </form>
        </div>
      </div>
    </div>
  </FrontendLayout>
</template>

  <script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";

defineProps({ errors: Object });
const form = useForm({
  kelas: "",
});
const saveClass = () => {
  const res = form.post(route("kelas.store"));
  if (res) {
    form.reset();
  }
};
</script>
