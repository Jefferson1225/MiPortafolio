<template>
  <section id="projects" class="bg-obsidian py-16 px-4 min-h-screen">
    <div class="max-w-6xl mx-auto">
      <!-- Título -->
      <h1 class="text-bronze text-4xl font-bold mb-12 text-center">Proyectos</h1>

      <!-- Cargando proyectos -->
      <p v-if="isLoading" class="text-white text-center text-lg opacity-60">
        Cargando proyectos...
      </p>

      <!-- Sin proyectos -->
      <p v-else-if="proyectos.length === 0" class="text-white text-center text-lg opacity-60">
        Ningún proyecto por el momento.
      </p>

      <!-- Lista de proyectos -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8" v-else>
        <Motion v-for="(proyecto, index) in proyectos.slice(0, 6)" :key="proyecto.id"
          :initial="{ opacity: 0, y: 40 }"
          :animate="{ opacity: 1, y: 0 }"
          :transition="{ delay: index * 0.2, duration: 0.6 }">
          <Link :href="`/projects/${proyecto.id}`"
            class="block bg-obsidian-light rounded-2xl p-6 shadow-lg hover:scale-[1.01] transition">
            <div class="bg-obsidian-smoth rounded-xl p-4">
              <img v-if="proyecto.image_url" :src="proyecto.image_url" alt="Imagen del proyecto"
                class="w-full h-64 object-cover rounded-lg mb-4" />
            </div>
            <h2 class="text-bronze text-2xl font-bold mt-4 hover:underline cursor-pointer">
              {{ proyecto.title }}
            </h2>
            <p class="text-white mt-2">{{ proyecto.description }}</p>
            <div class="flex flex-wrap gap-2 mt-4">
              <span v-for="tech in proyecto.technologies" :key="tech"
                class="bg-bronze text-black text-sm px-3 py-1 rounded-full">
                {{ tech }}
              </span>
            </div>
          </Link>
        </Motion>
      </div>

      <!-- Botón Ver Más -->
      <div v-if="!isLoading && proyectos.length > 6" class="mt-12 text-center">
        <Link href="/projects"
          class="text-bronze border border-bronze px-6 py-2 rounded-full hover:bg-bronze hover:text-obsidian transition">
          Ver más proyectos
        </Link>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { Motion } from '@motionone/vue'
import { Link } from '@inertiajs/vue3'

const proyectos = ref([])
const isLoading = ref(true)

onMounted(async () => {
  try {
    const response = await axios.get('https://miportafolio-production.up.railway.app/api/projects')
    proyectos.value = response.data
  } catch (error) {
    console.error('Error al cargar proyectos:', error)
  } finally {
    isLoading.value = false
  }
})
</script>
