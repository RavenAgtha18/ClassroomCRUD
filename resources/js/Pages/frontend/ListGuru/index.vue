<template>
  <Head title="Student List Page" />
  <FrontendLayout>
    <div class="mt-4 mx-4">
      <div class="flex justify-between mb-4">
        <!-- <div class="flex items-center">
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
        </div> -->
      </div>

      <table class="w-full bg-white border border-gray-200 shadow">
        <thead>
          <tr>
            <th class="py-2 px-4 text-left border">Id</th>
            <th class="py-2 px-4 text-left border">Class</th>
            <th class="py-2 px-4 text-left border">Teacher</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in kelas" :key="index">
            <td class="py-2 px-4 text-left border">{{ index + 1 }}</td>
            <td class="py-2 px-4 text-left border">{{ item.kelas }}</td>
            <td class="py-2 px-4 text-left border">{{ item.guru }}</td>
          </tr>
        </tbody>
      </table>

      <!-- <Pagination class="mt-4" :links="gurus.links" /> -->
    </div>
  </FrontendLayout>
</template>

      <script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "@/Components/Pagination.vue";
import { ref } from "vue";

const props = defineProps({
  kelas: Array,
});
console.log(props.kelas);
let search = ref("");

const applyFilter = () => {
  Inertia.get(
    route("guru.index"),
    { search: search.value },
    { preserveState: true }
  );
};

const form = useForm({});
</script>

      <style>
</style>
