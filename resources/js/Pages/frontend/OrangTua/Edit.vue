<template>
  <Head title=" edit Parent page" />
  <FrontendLayout>
    <div v-if="$page.props.flash.success" class="alert">
      {{ $page.props.flash.success }}
    </div>
    <div class="mt-4 mx-4">
      <div class="flex justify-between">
        <Link
          :href="route('orangTua.index')"
          class="bg-red-600 inline-block text-white py-2 px-5 rounded mb-4"
          >Back</Link
        >
      </div>
      <div class="w-full p-4">
        <div class="bg-gray-100 rounded shadow-md p-6">
          <h6 class="mb-4 text-lg font-semibold">Edit Parent Form</h6>
          <form @submit.prevent="updateOrangTua()">
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700"
                >Parent</label
              >
              <input
                type="text"
                v-model="form.orangTua"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
              />
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

const props = defineProps({ errors: Object, orangTua: Object });
console.log(props.orangTua);
const form = useForm({
  orangTua: props.orangTua.name,
});
const updateOrangTua = () => {
  console.log(form);
  const res = form.put(route("orangTua.update", props.orangTua.id));
  if (res) {
    form.reset();
  }
};
</script>
