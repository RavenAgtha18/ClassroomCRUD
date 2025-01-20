<template>
  <Head title="Parent page" />
  <FrontendLayout>
    <div
      v-if="$page.props.flash.success"
      class="alert bg-green-200 mt-4 mx-5 px-4 py-2"
    >
      {{ $page.props.flash.success }}
    </div>
    <div class="mt-4 mx-4">
      <div class="flex justify-between">
        <h5>Parent Lists</h5>
        <Link
          :href="route('orangTua.create')"
          class="bg-blue-500 text-white p-3 rounded mb-4"
          >Add Parent</Link
        >
      </div>
      <table class="w-full bg-white border border-gray-200 shadow">
        <thead>
          <tr>
            <th class="py-2 px-4 text-left border">Id</th>
            <th class="py-2 px-4 text-left border">Name</th>
            <th class="py-2 px-4 text-left border">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in orangTua" :key="index">
            <td class="py-2 px-4 text-left border">{{ item.id }}</td>
            <td class="py-2 px-4 text-left border">{{ item.name }}</td>
            <td class="py-2 px-4 text-left border">
              <Link
                :href="route('orangTua.edit', item.id)"
                class="px-2 oy-1text-sm bg-green-500 text-white me-2 rounded inline-block"
                >Edit</Link
              >
              <button
                type="submit"
                class="px-2 oy-1 text-sm bg-red-600 text-white me-2 rounded inline-block"
                @click="deleteParent(item.id)"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- <Pagination class="mt-4" :links="kelas.links" /> -->
    </div>
  </FrontendLayout>
</template>

  <script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
const form = useForm({});
defineProps({ orangTua: [Object, Array] });
const deleteParent = (orangTuaId) => {
  if (confirm("Are you sure to delete this Parent?")) {
    form.delete(route("orangTua.destroy", orangTuaId));
  }
};
</script>
