<template>
  <Head title="Teachers Page" />
  <FrontendLayout>
    <div
      v-if="$page.props.flash.success"
      class="alert bg-green-200 mt-4 mx-5 px-4 py-2"
    >
      {{ $page.props.flash.success }}
    </div>

    <div class="mt-4 mx-4">
      <div class="flex justify-between mb-4">
        <div class="flex items-center">
          <label for="kelas" class="mr-2">Filter by Class:</label>
          <select
            id="kelas"
            v-model="search"
            @change="applyFilter"
            class="p-2 border border-gray-300 rounded"
          >
            <option value="">All Classes</option>
            <option value="Class A">Class A</option>
            <option value="Class B">Class B</option>
            <option value="Class C">Class C</option>
          </select>
        </div>
        <Link
          :href="route('guru.create')"
          class="bg-blue-500 text-white p-3 rounded"
        >
          Add Teacher
        </Link>
      </div>

      <table class="w-full bg-white border border-gray-200 shadow">
        <thead>
          <tr>
            <th class="py-2 px-4 text-left border">Id</th>
            <th class="py-2 px-4 text-left border">Teacher</th>
            <th class="py-2 px-4 text-left border">Class</th>
            <th class="py-2 px-4 text-left border">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in gurus.data" :key="index">
            <td class="py-2 px-4 text-left border">{{ item.id }}</td>
            <td class="py-2 px-4 text-left border">{{ item.guru }}</td>
            <td class="py-2 px-4 text-left border">{{ item.kelas }}</td>
            <td class="py-2 px-4 text-left border">
              <Link
                :href="route('guru.edit', item.id)"
                class="px-2 text-sm bg-green-500 text-white rounded"
              >
                Edit
              </Link>
              <button
                type="button"
                class="px-2 text-sm bg-red-600 text-white rounded"
                @click="deleteGuru(item.id)"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>

      <Pagination class="mt-4" :links="gurus.links" />
    </div>
  </FrontendLayout>
</template>

    <script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "@/Components/Pagination.vue";
import { ref } from "vue";

defineProps({ gurus: Object });

let search = ref("");

const applyFilter = () => {
  Inertia.get(
    route("guru.index"),
    { search: search.value },
    { preserveState: true }
  );
};

const form = useForm({});
const deleteGuru = (guruId) => {
  if (confirm("Are you sure to delete this teacher?")) {
    form.delete(route("guru.destroy", guruId));
  }
};
</script>

    <style>
</style>
