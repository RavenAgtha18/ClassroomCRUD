<template>
  <Head title=" create teacher page" />
  <FrontendLayout>
    <div class="mt-4 mx-4">
      <div class="flex justify-between">
        <Link
          :href="route('guru.index')"
          class="bg-red-600 inline-block text-white py-2 px-5 rounded mb-4"
          >Back</Link
        >
      </div>
      <div class="w-full p-4">
        <div class="bg-gray-100 rounded shadow-md p-6">
          <h6 class="mb-4 text-lg font-semibold">Add Teacher Form</h6>
          <form @submit.prevent="saveGuru()">
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700"
                >Teacher</label
              >
              <input
                type="text"
                v-model="form.guru"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
              />
              <div v-if="errors.guru" class="text-red-500">
                {{ errors.guru }}
              </div>
            </div>
            <div class="mb-4">
              <label
                for="kelas"
                class="block text-sm font-medium text-gray-700"
              >
                Class
              </label>
              <select
                id="kelas"
                v-model="form.kelas"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
              >
                <option value="">--Select Class--</option>
                <option v-for="k in kelas" :key="k.id" :value="k.kelas">
                  {{ k.kelas }}
                </option>
              </select>
              <div v-if="errors.kelas" class="text-red-500">
                {{ errors.kelas }}
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

defineProps({ errors: Object, kelas: Array });
const form = useForm({
  guru: "",
  kelas: "",
});
const saveGuru = () => {
  const res = form.post(route("guru.store"));
  if (res) {
    form.reset();
  }
};
</script>
