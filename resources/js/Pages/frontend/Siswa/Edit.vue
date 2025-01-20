<template>
  <Head title=" edit student page" />
  <FrontendLayout>
    <div v-if="$page.props.flash.success" class="alert">
      {{ $page.props.flash.success }}
    </div>
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
          <h6 class="mb-4 text-lg font-semibold">Edit Student Form</h6>
          <form @submit.prevent="updateStudent()">
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700"
                >Name</label
              >
              <input
                type="text"
                v-model="form.name"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
              />
              <div v-if="errors.name" class="text-red-500">
                {{ errors.name }}
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
            <div class="mb-4">
              <label
                for="kelas"
                class="block text-sm font-medium text-gray-700"
              >
                Class
              </label>
              <select
                id="kelas"
                v-model="form.orangTua"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
              >
                <option value="">--Select Parent--</option>
                <option v-for="k in orangTua" :key="k.id" :value="k.id">
                  {{ k.name }}
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
              Update
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

const props = defineProps({
  errors: Object,
  siswa: Object,
  kelas: Array,
  orangTua: Array,
});
console.log("Students:", props.orangTua);
const form = useForm({
  name: props.siswa.name,
  kelas: props.siswa.kelas,
  orangTua: props.siswa.orang_tua_id,
});
const updateStudent = () => {
  console.log("Saving student");
  const res = form.put(route("siswa.update", props.siswa.id));
  if (res) {
    form.reset();
  }
};
</script>
