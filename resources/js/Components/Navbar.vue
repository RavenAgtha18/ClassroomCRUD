<template>
  <nav class="flex justify-between p-4 bg-gray-200">
    <div class="text-lg">Navbar</div>
    <div>
      <ul class="flex gap-x-4 me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <Link :href="route('home')" class="nav-link">Home</Link>
        </li> -->
        <li class="nav-item">
          <Link :href="route('orangTua.index')" class="nav-link">Parent</Link>
        </li>
        <li class="nav-item">
          <Link :href="route('list.index')" class="nav-link"
            >Student & Teacher List</Link
          >
        </li>
        <li class="nav-item">
          <Link :href="route('studentList.index')" class="nav-link"
            >Student List</Link
          >
        </li>
        <li class="nav-item">
          <Link :href="route('teacherList.index')" class="nav-link"
            >Teacher List</Link
          >
        </li>
        <li class="nav-item">
          <Link :href="route('siswa.index')" class="nav-link">Student</Link>
        </li>
        <li class="nav-item">
          <Link :href="route('kelas.index')" class="nav-link">Class</Link>
        </li>
        <li class="nav-item">
          <Link :href="route('guru.index')" class="nav-link">Teacher</Link>
        </li>
        <Dropdown align="right" width="50">
          <template #trigger>
            <span class="inline-flex rounded-md">
              <button
                type="button"
                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
              >
                {{ $page.props.auth.user.name }}

                <svg
                  class="-me-0.5 ms-2 h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            </span>
          </template>

          <template #content>
            <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
            <DropdownLink :href="route('logout')" method="post" as="button">
              Log Out
            </DropdownLink>
          </template>
        </Dropdown>
      </ul>
    </div>
  </nav>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
</script>
