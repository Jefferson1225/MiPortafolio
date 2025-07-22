<template>
  <section class="bg-obsidian py-16 px-4 min-h-screen">
    <div class="max-w-5xl mx-auto">
      <h1 class="text-bronze text-4xl font-bold mb-8 text-center">{{ project.title }}</h1>

      <!-- Imagen principal con lightbox -->
      <div
        class="relative rounded-xl overflow-hidden border border-bronze shadow-lg mb-6 bg-black flex justify-center items-center">
        <img
          :src="project.image_url"
          alt="Imagen principal del proyecto"
          class="w-full max-h-[600px] object-contain cursor-zoom-in transition-transform duration-300"
          @click="openLightbox(0)"
        />
      </div>

      <!-- Lightbox -->
      <vue-easy-lightbox
        :visible="lightboxVisible"
        :imgs="[project.image_url]"
        :index="lightboxIndex"
        @hide="lightboxVisible = false"
      />

      <!-- Tecnologías -->
      <div class="flex flex-wrap gap-2 mb-8">
        <span
          v-for="tech in project.technologies"
          :key="tech"
          class="bg-bronze text-black text-sm px-3 py-1 rounded-full"
        >
          {{ tech }}
        </span>
      </div>

      <p class="text-white text-lg leading-relaxed mb-6">{{ project.description }}</p>

      <!-- Botones -->
      <div class="flex flex-wrap gap-4 mb-10">
        <a
          v-if="project.github_url"
          :href="project.github_url"
          target="_blank"
          rel="noopener"
          class="bg-bronze text-black font-semibold px-5 py-2 rounded-xl shadow transition hover:opacity-90"
        >
          Ver en GitHub
        </a>
        <a
          v-if="project.demo_url"
          :href="project.demo_url"
          target="_blank"
          rel="noopener"
          class="border border-bronze text-bronze font-semibold px-5 py-2 rounded-xl shadow transition hover:bg-bronze hover:text-black"
        >
          Ver Demo
        </a>
      </div>

      <!-- Galería -->
      <div v-if="project.gallery && project.gallery.length" class="mt-10">
        <h2 class="text-bronze text-2xl font-bold mb-4">Galería</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
          <img
            v-for="(img, index) in project.gallery"
            :key="index"
            :src="img"
            alt="Imagen de galería"
            class="w-full h-48 object-cover rounded-lg cursor-pointer"
            @click="openLightbox(index + 1)" />
        </div>

        <!-- Lightbox para galería -->
        <vue-easy-lightbox
          :visible="lightboxVisible"
          :imgs="[project.image_url, ...project.gallery]"
          :index="lightboxIndex"
          @hide="lightboxVisible = false"
        />
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import { usePage } from '@inertiajs/vue3'
import VueEasyLightbox from 'vue-easy-lightbox'

const { props } = usePage()
const project = ref(props.project)

const lightboxVisible = ref(false)
const lightboxIndex = ref(0)

const openLightbox = (index) => {
  lightboxIndex.value = index
  lightboxVisible.value = true
}
</script>

<script>
export default {
  components: {
    VueEasyLightbox
  }
}
</script>
