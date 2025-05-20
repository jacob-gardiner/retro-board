<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { provide, ref } from 'vue';

import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Navbar from '@/Layouts/Components/Navbar.vue';

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);
const el = ref(null);

const contentHeight = ref(window.innerHeight);

const switchToTeam = (team) => {
  router.put(
    route('current-team.update'),
    {
      team_id: team.id,
    },
    {
      preserveState: false,
    },
  );
};

const logout = () => {
  router.post(route('logout'));
};

provide('pageDetails', {
  contentHeight,
});
</script>

<template>
  <div>
    <Head :title="title" />

    <Banner />

    <div class="min-h-screen bg-whitest flex flex-col">
      <Navbar />
      <!-- Page Heading -->
      <header v-if="$slots.header" class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main class="grow" ref="el">
        <slot />
      </main>
    </div>
  </div>
</template>
