<template>
  <section id="skills" class="py-20" style="background-color: #722F37">
    <div class="max-w-6xl mx-auto px-4 text-white">
      <h2 class="text-4xl font-playfair font-bold mb-12 text-center" style="color: #cd7f32">
        Habilidades
      </h2>

      <div v-if="loading" class="text-center text-gray-300">Cargando habilidades...</div>

      <div v-else class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <div
          v-for="skill in skills"
          :key="skill.id"
          class="bg-[#1c1c1c]/50 backdrop-blur-md p-5 rounded-xl text-center shadow-lg hover:scale-105 transition-transform duration-300"
        >
          <p class="text-xl text-white-300 mb-2">{{ formatLevel(skill.level) }}</p>
          <img
            :src="skill.image_url"
            :alt="skill.name"
            class="w-45 h-45 mx-auto mb-3 object-contain"
          />
          <h3 class="text-xl font-semibold text-bronze">{{ skill.name }}</h3>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const skills = ref([])
const loading = ref(true)

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/skills')
    skills.value = response.data.sort((a, b) => a.order - b.order)
  } catch (error) {
    console.error('Error al cargar habilidades:', error)
  } finally {
    loading.value = false
  }
})

function formatLevel(level) {
  const levels = {
    principiante: 'Principiante',
    medio: 'Intermedio',
    avanzado: 'Avanzado',
  }
  return levels[level] || level
}
</script>

<style scoped>
.font-playfair {
  font-family: 'Playfair Display', serif;
}
</style>
