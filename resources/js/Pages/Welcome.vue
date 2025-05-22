<script setup>
import Navbar from '@/Layouts/Components/Navbar.vue';
import PublicNavbar from '@/Layouts/Components/PublicNavbar.vue';
import BoardImage from '@/Svg/BoardImage.vue';
import EngineeringTeamImage from '@/Svg/EngineeringTeamImage.vue';

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
  auth: Object,
});
</script>
<template>
  <div class="">
    <Navbar v-if="auth?.user" />
    <PublicNavbar v-else />

    <main>
      <!-- Hero section-->
      <div class="bg-white">
        <div class="relative isolate pt-14">
          <svg
            class="absolute inset-0 -z-10 size-full stroke-gray-500 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
            aria-hidden="true"
          >
            <defs>
              <pattern
                id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527"
                width="200"
                height="200"
                x="50%"
                y="-1"
                patternUnits="userSpaceOnUse"
              >
                <path d="M100 200V.5M.5 .5H200" fill="none" />
              </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
              <path
                d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                stroke-width="0"
              />
            </svg>
            <rect
              width="100%"
              height="100%"
              stroke-width="0"
              fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)"
            />
          </svg>
          <div
            class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:gap-x-10 lg:px-8 lg:py-40"
          >
            <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto">
              <h1
                class="mt-10 text-pretty text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl"
              >
                Supercharge your team
              </h1>
              <p
                class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8"
              >
                Streamline your efforts with simple team utilities
              </p>
              <div class="mt-10 flex items-center gap-x-6">
                <a
                  href="/register"
                  class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600"
                  >Get started</a
                >
                <a
                  href="https://github.com/jacob-gardiner/retro-board"
                  class="text-sm/6 font-semibold text-gray-900"
                  >View on GitHub <span aria-hidden="true">→</span></a
                >
              </div>
            </div>
            <div class="mt-16 sm:mt-24 lg:mt-0 lg:shrink-0 lg:grow">
              <EngineeringTeamImage />
            </div>
          </div>
        </div>
      </div>

      <!-- Retro Board -->
      <div class="overflow-hidden bg-gray-200 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2"
          >
            <div class="lg:ml-auto lg:pl-4 lg:pt-4">
              <div class="lg:max-w-lg">
                <h2 class="text-base/7 font-semibold text-primary-600">
                  Get Better
                </h2>
                <p
                  class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl"
                >
                  Retro Board
                </p>
                <p class="mt-6 text-lg/8 text-gray-600">
                  Conduct retros to celebrate your teams successes and overcome
                  challenges.
                </p>
                <dl
                  class="mt-10 max-w-xl space-y-8 text-base/7 text-gray-600 lg:max-w-none"
                >
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg
                        class="absolute left-1 top-1 size-5 text-primary-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                        data-slot="icon"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      Easy Setup
                    </dt>
                    <dd class="inline">
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                      Maiores impedit perferendis suscipit eaque, iste dolor
                      cupiditate blanditiis ratione.
                    </dd>
                  </div>
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg
                        class="absolute left-1 top-1 size-5 text-primary-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                        data-slot="icon"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      Vote on topics.
                    </dt>
                    <dd class="inline">
                      Anim aute id magna aliqua ad ad non deserunt sunt. Qui
                      irure qui lorem cupidatat commodo.
                    </dd>
                  </div>
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg
                        class="absolute left-1 top-1 size-5 text-primary-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                        data-slot="icon"
                      >
                        <path
                          d="M4.632 3.533A2 2 0 0 1 6.577 2h6.846a2 2 0 0 1 1.945 1.533l1.976 8.234A3.489 3.489 0 0 0 16 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234Z"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M4 13a2 2 0 1 0 0 4h12a2 2 0 1 0 0-4H4Zm11.24 2a.75.75 0 0 1 .75-.75H16a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75h-.01a.75.75 0 0 1-.75-.75V15Zm-2.25-.75a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75h-.01Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      Something Else
                    </dt>
                    <dd class="inline">
                      Ac tincidunt sapien vehicula erat auctor pellentesque
                      rhoncus. Et magna sit morbi lobortis.
                    </dd>
                  </div>
                </dl>
              </div>
            </div>
            <div class="flex items-start justify-center lg:order-first">
              <BoardImage />
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
