<template>
  <nav class="bg-white border-b-2 border-primary-600">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <!-- Logo -->
          <div class="shrink-0 flex items-center">
            <Link :href="route('boards.index')">
              <ApplicationMark class="block h-9 w-auto" />
            </Link>
          </div>
        </div>
        <!-- Navigation Links -->
        <div class="space-x-8 -my-px ms-10 flex">
          <NavLink :href="route('login')"> Login </NavLink>
          <NavLink :href="route('register')"> Register </NavLink>
        </div>
      </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
      :class="{
        block: showingNavigationDropdown,
        hidden: !showingNavigationDropdown,
      }"
      class="sm:hidden"
    >
      <div class="pt-2 pb-3 space-y-1">
        <ResponsiveNavLink
          :href="route('boards.index')"
          :active="route().current('boards.index')"
        >
          Boards
        </ResponsiveNavLink>
      </div>
    </div>
  </nav>
</template>

<script>
import { Link } from '@inertiajs/vue3';

import ApplicationMark from '@/Components/ApplicationMark.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

export default {
  components: {
    Link,
    ResponsiveNavLink,
    NavLink,
    DropdownLink,
    Dropdown,
    ApplicationMark,
  },
};
</script>

<style lang="scss" scoped></style>
