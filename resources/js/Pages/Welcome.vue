<script setup>
import { Head, Link } from '@inertiajs/vue3';

import AppLayout from '@/Layouts/AppLayout.vue';
import Navbar from '@/Layouts/Components/Navbar.vue';

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

function handleImageError() {
  document.getElementById('screenshot-container')?.classList.add('!hidden');
  document.getElementById('docs-card')?.classList.add('!row-span-1');
  document.getElementById('docs-card-content')?.classList.add('!flex-row');
  document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
  <div class="">
    <Navbar v-if="auth?.user" />
    <div v-else>Public Navbar</div>

    <main>
      <div class="bg-white">
        <div
          class="relative isolate overflow-hidden bg-linear-to-b from-primary-100/20"
        >
          <div
            class="mx-auto max-w-7xl pt-10 pb-24 sm:pb-32 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-40"
          >
            <div class="px-6 lg:px-0 lg:pt-4">
              <div class="mx-auto max-w-2xl">
                <div class="max-w-lg">
                  <img
                    class="h-11"
                    src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=primary&shade=600"
                    alt="Your Company"
                  />
                  <div class="mt-24 sm:mt-32 lg:mt-16">
                    <a href="#" class="inline-flex space-x-6">
                      <span
                        class="rounded-full bg-primary-600/10 px-3 py-1 text-sm/6 font-semibold text-primary-600 ring-1 ring-primary-600/10 ring-inset"
                        >What's new</span
                      >
                      <span
                        class="inline-flex items-center space-x-2 text-sm/6 font-medium text-gray-600"
                      >
                        <span>Just shipped v0.1.0</span>
                        <svg
                          class="size-5 text-gray-400"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                          aria-hidden="true"
                          data-slot="icon"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </span>
                    </a>
                  </div>
                  <h1
                    class="mt-10 text-5xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-7xl"
                  >
                    Supercharge your web app
                  </h1>
                  <p
                    class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8"
                  >
                    Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure
                    qui lorem cupidatat commodo.
                  </p>
                  <div class="mt-10 flex items-center gap-x-6">
                    <a
                      href="#"
                      class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-primary-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600"
                      >Documentation</a
                    >
                    <a href="#" class="text-sm/6 font-semibold text-gray-900"
                      >View on GitHub <span aria-hidden="true">→</span></a
                    >
                  </div>
                </div>
              </div>
            </div>
            <div
              class="mt-20 sm:mt-24 md:mx-auto md:max-w-2xl lg:mx-0 lg:mt-0 lg:w-screen"
            >
              <div
                class="absolute inset-y-0 right-1/2 -z-10 -mr-10 w-[200%] skew-x-[-30deg] bg-white shadow-xl ring-1 shadow-primary-600/10 ring-primary-50 md:-mr-20 lg:-mr-36"
                aria-hidden="true"
              ></div>
              <div class="shadow-lg md:rounded-3xl">
                <div
                  class="bg-primary-500 [clip-path:inset(0)] md:[clip-path:inset(0_round_var(--radius-3xl))]"
                >
                  <div
                    class="absolute -inset-y-px left-1/2 -z-10 ml-10 w-[200%] skew-x-[-30deg] bg-primary-100 opacity-20 ring-1 ring-white ring-inset md:ml-20 lg:ml-36"
                    aria-hidden="true"
                  ></div>
                  <div class="relative px-6 pt-8 sm:pt-16 md:pr-0 md:pl-16">
                    <div class="mx-auto max-w-2xl md:mx-0 md:max-w-none">
                      <div class="w-screen overflow-hidden rounded-tl-xl">
                        <svg
                          class="h-96"
                          width="1214"
                          height="1888"
                          viewBox="0 0 1214 1888"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <g filter="url(#filter0_d_301_2)">
                            <rect
                              x="4"
                              y="509"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#FFE0D1"
                            />
                          </g>
                          <g filter="url(#filter1_d_301_2)">
                            <rect
                              x="424"
                              y="806"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#F8D2D7"
                            />
                          </g>
                          <g filter="url(#filter2_d_301_2)">
                            <rect
                              x="424"
                              y="250"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#CCECF7"
                            />
                          </g>
                          <rect
                            x="34"
                            y="586"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#996752"
                          />
                          <rect
                            x="34"
                            y="629"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#996752"
                          />
                          <rect
                            x="34"
                            y="672"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#996752"
                          />
                          <rect
                            x="34"
                            y="715"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#996752"
                          />
                          <rect
                            x="34"
                            y="758"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#996752"
                          />
                          <rect
                            x="454"
                            y="327"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#346577"
                          />
                          <rect
                            x="454"
                            y="370"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#346577"
                          />
                          <rect
                            x="454"
                            y="413"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#346577"
                          />
                          <rect
                            x="454"
                            y="456"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#346577"
                          />
                          <rect
                            x="454"
                            y="499"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#346577"
                          />
                          <rect
                            x="454"
                            y="883"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#764047"
                          />
                          <rect
                            x="454"
                            y="926"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#764047"
                          />
                          <rect
                            x="454"
                            y="969"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#764047"
                          />
                          <rect
                            x="454"
                            y="1012"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#764047"
                          />
                          <rect
                            x="454"
                            y="1055"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#764047"
                          />
                          <g filter="url(#filter3_d_301_2)">
                            <rect
                              x="844"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#FFEBBE"
                            />
                          </g>
                          <rect
                            x="873"
                            y="77"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#896330"
                          />
                          <rect
                            x="873"
                            y="120"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#896330"
                          />
                          <rect
                            x="873"
                            y="163"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#896330"
                          />
                          <rect
                            x="873"
                            y="206"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#896330"
                          />
                          <rect
                            x="873"
                            y="249"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#896330"
                          />
                          <g filter="url(#filter4_d_301_2)">
                            <rect
                              x="844"
                              y="556"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#E4F5C4"
                            />
                          </g>
                          <rect
                            x="873"
                            y="633"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#566E39"
                          />
                          <rect
                            x="873"
                            y="676"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#566E39"
                          />
                          <rect
                            x="873"
                            y="719"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#566E39"
                          />
                          <rect
                            x="873"
                            y="762"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#566E39"
                          />
                          <rect
                            x="873"
                            y="805"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#566E39"
                          />
                          <g filter="url(#filter5_d_301_2)">
                            <rect
                              x="4"
                              y="1074"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#D2F1DF"
                            />
                          </g>
                          <rect
                            x="33"
                            y="1151"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#426855"
                          />
                          <rect
                            x="33"
                            y="1194"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#426855"
                          />
                          <rect
                            x="33"
                            y="1237"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#426855"
                          />
                          <rect
                            x="33"
                            y="1280"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#426855"
                          />
                          <rect
                            x="33"
                            y="1323"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#426855"
                          />
                          <g filter="url(#filter6_d_301_2)">
                            <rect
                              x="424"
                              y="1362"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#D8DBF2"
                            />
                          </g>
                          <rect
                            x="453"
                            y="1439"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#4A4A72"
                          />
                          <rect
                            x="453"
                            y="1482"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#4A4A72"
                          />
                          <rect
                            x="453"
                            y="1525"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#4A4A72"
                          />
                          <rect
                            x="453"
                            y="1568"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#4A4A72"
                          />
                          <rect
                            x="453"
                            y="1611"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#4A4A72"
                          />
                          <g filter="url(#filter7_d_301_2)">
                            <rect
                              x="844"
                              y="1112"
                              width="366"
                              height="518"
                              rx="21"
                              fill="#F3D3EA"
                            />
                          </g>
                          <rect
                            x="873"
                            y="1189"
                            width="307"
                            height="19"
                            rx="9.5"
                            fill="#683F5D"
                          />
                          <rect
                            x="873"
                            y="1232"
                            width="200"
                            height="19"
                            rx="9.5"
                            fill="#683F5D"
                          />
                          <rect
                            x="873"
                            y="1275"
                            width="275"
                            height="19"
                            rx="9.5"
                            fill="#683F5D"
                          />
                          <rect
                            x="873"
                            y="1318"
                            width="246"
                            height="19"
                            rx="9.5"
                            fill="#683F5D"
                          />
                          <rect
                            x="873"
                            y="1361"
                            width="139"
                            height="19"
                            rx="9.5"
                            fill="#683F5D"
                          />
                          <defs>
                            <filter
                              id="filter0_d_301_2"
                              x="0"
                              y="509"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                            <filter
                              id="filter1_d_301_2"
                              x="420"
                              y="806"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                            <filter
                              id="filter2_d_301_2"
                              x="420"
                              y="250"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                            <filter
                              id="filter3_d_301_2"
                              x="840"
                              y="0"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                            <filter
                              id="filter4_d_301_2"
                              x="840"
                              y="556"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                            <filter
                              id="filter5_d_301_2"
                              x="0"
                              y="1074"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                            <filter
                              id="filter6_d_301_2"
                              x="420"
                              y="1362"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                            <filter
                              id="filter7_d_301_2"
                              x="840"
                              y="1112"
                              width="374"
                              height="526"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="4" />
                              <feGaussianBlur stdDeviation="2" />
                              <feComposite in2="hardAlpha" operator="out" />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="BackgroundImageFix"
                                result="effect1_dropShadow_301_2"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="effect1_dropShadow_301_2"
                                result="shape"
                              />
                            </filter>
                          </defs>
                        </svg>

                        <!--                        <div class="flex bg-gray-800/40 ring-1 ring-white/5">-->
                        <!--                          <div-->
                        <!--                            class="-mb-px flex text-sm/6 font-medium text-gray-400"-->
                        <!--                          >-->
                        <!--                            <div-->
                        <!--                              class="border-r border-b border-r-white/10 border-b-white/20 bg-white/5 px-4 py-2 text-white"-->
                        <!--                            >-->
                        <!--                              NotificationSetting.jsx-->
                        <!--                            </div>-->
                        <!--                            <div class="border-r border-gray-600/10 px-4 py-2">-->
                        <!--                              App.jsx-->
                        <!--                            </div>-->
                        <!--                          </div>-->
                        <!--                        </div>-->
                        <!--                        <div class="px-6 pt-6 pb-14">-->
                        <!--                          &lt;!&ndash; Your code example &ndash;&gt;-->
                        <!--                        </div>-->
                      </div>
                    </div>
                    <div
                      class="pointer-events-none absolute inset-0 ring-1 ring-black/10 ring-inset md:rounded-3xl"
                      aria-hidden="true"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-linear-to-t from-white sm:h-32"
          ></div>
        </div>
      </div>

      <div class="bg-primary-100 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <h2 class="text-center text-lg/8 font-semibold text-gray-900">
            Made with love using
          </h2>
          <div
            class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              width="48"
              height="48"
              class="h-24"
            >
              <path
                d="M107.2 0c2.5 0 4.7 .8 6.7 2l94.3 54.1c2.7 1.5 4.5 3.5 5.4 5.9c.9 2.2 .9 4.3 .9 5.6l0 193.4 69.2-39.7 0-100.3c0-2.6 .6-5 2.2-7.2c1.5-2.1 3.5-3.6 5.7-4.8c0 0 0 0 0 0l94-54c1.6-.9 3.4-1.6 5.5-1.6s4 .7 5.6 1.6l95.8 55.1c2.3 1.3 3.9 3 4.9 5.3c.9 2.1 .9 4.2 .9 5.8l0 107.2c0 2-.2 4.3-1.4 6.4c-1.2 2.2-3 3.7-5.1 4.9l-.1 .1-88 50.5 0 100c0 2.3-.3 4.8-1.6 7c-1.3 2.2-3.3 3.7-5.3 4.9c0 0 0 0-.1 0L208.7 510c-2.2 1.2-4.5 2-7.1 2s-4.9-.9-7.1-2l-.1-.1L7.1 402l-.5-.3c-1.1-.7-2.6-1.7-3.8-2.9C.9 396.9 0 394.6 0 391.6L0 65.9c0-4.8 3-7.9 5.5-9.3L100.5 2c2-1.2 4.3-2 6.8-2zM38.1 67.1l69 39.9 69.2-39.9L107.1 27.4l-69 39.7zm353 93.2l69-39.7-69-39.7-69.1 39.7 69.1 39.7zM189.2 89L120 128.8l0 186.4 69.2-39.9 0-186.4zM94.5 128.9L25.2 89.1l0 294.2 164 94.2 0-79.4-87.3-49.3-.2-.1c-1.3-.8-3.2-1.9-4.6-3.7c-1.7-2.1-2.5-4.7-2.5-7.7l0-208.5zm214.7 92.4l69.3 39.6 0-78.5-69.3-39.9 0 78.8zm94.5 39.6L473 221.2l0-78.8-69.3 39.9 0 78.5zM201.6 376.1l163.8-93.2-69-39.9L133 337.1l68.6 38.9zm12.9 101.5l164-94.2 0-78.8-164 93.6 0 79.4z"
              />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path
                d="M356.9 64.3H280l-56 88.6-48-88.6H0L224 448 448 64.3h-91.1zm-301.2 32h53.8L224 294.5 338.4 96.3h53.8L224 384.5 55.7 96.3z"
              />
            </svg>
            <svg viewBox="0 0 248 31" class="text-slate-900 w-auto h-5">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M25.517 0C18.712 0 14.46 3.382 12.758 10.146c2.552-3.382 5.529-4.65 8.931-3.805 1.941.482 3.329 1.882 4.864 3.432 2.502 2.524 5.398 5.445 11.722 5.445 6.804 0 11.057-3.382 12.758-10.145-2.551 3.382-5.528 4.65-8.93 3.804-1.942-.482-3.33-1.882-4.865-3.431C34.736 2.92 31.841 0 25.517 0zM12.758 15.218C5.954 15.218 1.701 18.6 0 25.364c2.552-3.382 5.529-4.65 8.93-3.805 1.942.482 3.33 1.882 4.865 3.432 2.502 2.524 5.397 5.445 11.722 5.445 6.804 0 11.057-3.381 12.758-10.145-2.552 3.382-5.529 4.65-8.931 3.805-1.941-.483-3.329-1.883-4.864-3.432-2.502-2.524-5.398-5.446-11.722-5.446z"
              ></path>
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M76.546 12.825h-4.453v8.567c0 2.285 1.508 2.249 4.453 2.106v3.463c-5.962.714-8.332-.928-8.332-5.569v-8.567H64.91V9.112h3.304V4.318l3.879-1.143v5.937h4.453v3.713zM93.52 9.112h3.878v17.849h-3.878v-2.57c-1.365 1.891-3.484 3.034-6.285 3.034-4.884 0-8.942-4.105-8.942-9.389 0-5.318 4.058-9.388 8.942-9.388 2.801 0 4.92 1.142 6.285 2.999V9.112zm-5.674 14.636c3.232 0 5.674-2.392 5.674-5.712s-2.442-5.711-5.674-5.711-5.674 2.392-5.674 5.711c0 3.32 2.442 5.712 5.674 5.712zm16.016-17.313c-1.364 0-2.477-1.142-2.477-2.463a2.475 2.475 0 012.477-2.463 2.475 2.475 0 012.478 2.463c0 1.32-1.113 2.463-2.478 2.463zm-1.939 20.526V9.112h3.879v17.849h-3.879zm8.368 0V.9h3.878v26.06h-3.878zm29.053-17.849h4.094l-5.638 17.849h-3.807l-3.735-12.03-3.771 12.03h-3.806l-5.639-17.849h4.094l3.484 12.315 3.771-12.315h3.699l3.734 12.315 3.52-12.315zm8.906-2.677c-1.365 0-2.478-1.142-2.478-2.463a2.475 2.475 0 012.478-2.463 2.475 2.475 0 012.478 2.463c0 1.32-1.113 2.463-2.478 2.463zm-1.939 20.526V9.112h3.878v17.849h-3.878zm17.812-18.313c4.022 0 6.895 2.713 6.895 7.354V26.96h-3.878V16.394c0-2.713-1.58-4.14-4.022-4.14-2.55 0-4.561 1.499-4.561 5.14v9.567h-3.879V9.112h3.879v2.285c1.185-1.856 3.124-2.749 5.566-2.749zm25.282-6.675h3.879V26.96h-3.879v-2.57c-1.364 1.892-3.483 3.034-6.284 3.034-4.884 0-8.942-4.105-8.942-9.389 0-5.318 4.058-9.388 8.942-9.388 2.801 0 4.92 1.142 6.284 2.999V1.973zm-5.674 21.775c3.232 0 5.674-2.392 5.674-5.712s-2.442-5.711-5.674-5.711-5.674 2.392-5.674 5.711c0 3.32 2.442 5.712 5.674 5.712zm22.553 3.677c-5.423 0-9.481-4.105-9.481-9.389 0-5.318 4.058-9.388 9.481-9.388 3.519 0 6.572 1.82 8.008 4.605l-3.34 1.928c-.79-1.678-2.549-2.749-4.704-2.749-3.16 0-5.566 2.392-5.566 5.604 0 3.213 2.406 5.605 5.566 5.605 2.155 0 3.914-1.107 4.776-2.749l3.34 1.892c-1.508 2.82-4.561 4.64-8.08 4.64zm14.472-13.387c0 3.249 9.661 1.285 9.661 7.89 0 3.57-3.125 5.497-7.003 5.497-3.591 0-6.177-1.607-7.326-4.177l3.34-1.927c.574 1.606 2.011 2.57 3.986 2.57 1.724 0 3.052-.571 3.052-2 0-3.176-9.66-1.391-9.66-7.781 0-3.356 2.909-5.462 6.572-5.462 2.945 0 5.387 1.357 6.644 3.713l-3.268 1.82c-.647-1.392-1.904-2.035-3.376-2.035-1.401 0-2.622.607-2.622 1.892zm16.556 0c0 3.249 9.66 1.285 9.66 7.89 0 3.57-3.124 5.497-7.003 5.497-3.591 0-6.176-1.607-7.326-4.177l3.34-1.927c.575 1.606 2.011 2.57 3.986 2.57 1.724 0 3.053-.571 3.053-2 0-3.176-9.66-1.391-9.66-7.781 0-3.356 2.908-5.462 6.572-5.462 2.944 0 5.386 1.357 6.643 3.713l-3.268 1.82c-.646-1.392-1.903-2.035-3.375-2.035-1.401 0-2.622.607-2.622 1.892z"
                fill="currentColor"
              ></path>
            </svg>
            <!--            <img-->
            <!--              class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"-->
            <!--              src="https://tailwindcss.com/plus-assets/img/logos/158x48/tuple-logo-gray-900.svg"-->
            <!--              alt="Tuple"-->
            <!--              width="158"-->
            <!--              height="48"-->
            <!--            />-->
            <!--            <img-->
            <!--              class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"-->
            <!--              src="https://tailwindcss.com/plus-assets/img/logos/158x48/savvycal-logo-gray-900.svg"-->
            <!--              alt="SavvyCal"-->
            <!--              width="158"-->
            <!--              height="48"-->
            <!--            />-->
            <!--            <img-->
            <!--              class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"-->
            <!--              src="https://tailwindcss.com/plus-assets/img/logos/158x48/statamic-logo-gray-900.svg"-->
            <!--              alt="Statamic"-->
            <!--              width="158"-->
            <!--              height="48"-->
            <!--            />-->
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
