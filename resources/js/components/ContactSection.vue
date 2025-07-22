<!-- resources/js/components/ContactSection.vue -->
<template>
    <section class="bg-crimson-medium text-white py-16 px-4" id="contact">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Título -->
            <h2 class="text-4xl font-bold text-bronze mb-4">Contacto</h2>
            <p class="text-white mb-12 text-lg">¿Tienes un proyecto en mente? ¡Hablemos!</p>

            <!-- Cards -->
            <div class="flex flex-col gap-8 items-center">
                <div v-for="item in contactInfo" :key="item.id"
                    class="bg-obsidian-light p-6 rounded-2xl shadow-md w-full max-w-lg text-center">
                    <!-- Imagen circular con fondo bronze -->
                    <div class="flex justify-center mb-4">
                        <div class="relative w-16 h-16 rounded-full flex items-center justify-center z-10">
                            <div class="absolute inset-0 bg-bronze rounded-full opacity-48"></div>
                            <img :src="getLogo(item.type)" alt="logo"
                                class="relative w-8 h-8 object-contain opacity-100" />
                        </div>
                    </div>
                    <!-- Título y valor -->
                    <h3 class="text-xl font-semibold text-white capitalize">{{ item.label }}</h3>
                    <p class="text-white opacity-80">{{ item.value }}</p>
                </div>
            </div>

            <a href="/cv-jefferson.pdf" download
                class="bg-bronze text-black font-semibold px-6 py-2 rounded-xl shadow hover:opacity-90 flex items-center gap-2 mx-auto mt-12 inline-flex">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                    stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                    <path d="M7 11l5 5l5 -5" />
                    <path d="M12 4l0 12" />
                </svg>

                Descargar CV
            </a>

            <!-- Línea y cita -->
            <div class="mt-16">
                <div class="h-[2px] w-[90%] mx-auto bg-bronze mb-4"></div>
                <p class="text-gl text-white italic ">"La creación es el único acto verdaderamente libre."</p>
                <p class="text-bronze"> - Albert Camus</p>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const contactInfo = ref([])

onMounted(async () => {
    const response = await axios.get('https://miportafolio-production.up.railway.app/api/contact-info')
    contactInfo.value = response.data
})

const getLogo = (type) => {
    switch (type.toLowerCase()) {
        case 'whatsapp':
            return '/images/logos/whatsapp.svg'
        case 'email':
            return '/images/logos/email.svg'
        case 'github':
            return '/images/logos/github.svg'
        default:
            return '/images/logos/default.svg'
    }
}
</script>
