<script setup>
import SkillsSection from '../components/SkillsSection.vue';
import Projects from '../components/Projects.vue';
import ContactSection from '@/components/ContactSection.vue'
</script>

<template>
    <div class="min-h-screen bg-obsidian">
        <!-- Header/Navigation -->
        <header class="bg-obsidian/80 backdrop-blur-sm fixed w-full top-0 z-50">
            <nav class="w-full px-6 py-7 flex justify-end space-x-12">
                <a href="#about" class="font-serif text-xl text-slate hover:text-bronze transition-colors">Sobre mí</a>
                <a href="#skills"
                    class="font-serif text-xl text-slate hover:text-bronze transition-colors">Habilidades</a>
                <a href="#projects"
                    class="font-serif text-xl text-slate hover:text-bronze transition-colors">Proyectos</a>
                <a href="#contact"
                    class="font-serif text-xl text-slate hover:text-bronze transition-colors">Contacto</a>
            </nav>
        </header>


        <!-- Hero Section -->
        <main class="pt-20">
            <div class="bg-crimson-dark relative overflow-hidden">
                <!-- Título centrado arriba -->
                <div class="text-center pt-8 pb-4">
                    <h1 class="font-serif text-bronze text-4xl">Sobre mí</h1>
                </div>

                <!-- Círculos decorativos de fondo -->
                <div class="absolute inset-0 pointer-events-none">
                    <!-- CÍRCULOS MEDIANOS (4) -->
                    <div class="absolute w-28 h-28 border-[6px] border-bronze/30 rounded-full top-20 left-175">
                    </div>
                    <div class="absolute w-24 h-24 border-[6px] border-bronze/30 rounded-full top-19 right-90"></div>
                    <div class="absolute w-32 h-32 border-[6px] border-bronze/30 rounded-full bottom-10 left-70">
                    </div>
                    <div class="absolute w-26 h-26 border-[6px] border-bronze/30 rounded-full bottom-5 right-1/3">
                    </div>

                    <!-- CÍRCULOS PEQUEÑOS (9) -->
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full top-20 left-20"></div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full top-10 left-120"></div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full top-60 left-40">
                    </div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full top-25 left-285"></div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full top-35 left-450"></div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full bottom-45 right-16"></div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full bottom-10 right-60"></div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full bottom-10 right-280">
                    </div>
                    <div class="absolute w-12 h-12 border-[2px] border-bronze/30 rounded-full bottom-10 right-450">
                    </div>
                </div>

                <div class="container mx-auto px-8 py-12 relative">
                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-center">
                        <!-- Imagen del dragón - 2 columnas -->
                        <div class="lg:col-span-2 flex justify-center">
                            <div class="w-96 h-96 rounded-full overflow-hidden border-bronze/50">
                                <img src="/images/dragon.jpeg" alt="Dragón" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Contenido de texto - 3 columnas -->
                        <div class="lg:col-span-3 text-center lg:text-left lg:pl-8">
                            <h2 class="font-serif text-center text-bronze text-4xl lg:text-5xl mb-4">Jefferson Noe
                                Almeyda
                                Magallanes</h2>
                            <h3 class="font-sans text-center text-bronze text-xl mb-6">Estudiante de Ingeniería de
                                Sistemas</h3>
                            <div class="w-200 h-0.5 bg-bronze mb-4 mx-auto lg:mx-0"></div>
                            <p class="font-sans text-white text-base leading-relaxed">
                                Soy Jefferson, desarrollador frontend apasionado por crear experiencias digitales
                                elegantes y funcionales. Trabajo con HTML, CSS, Sass, JavaScript, React y Laravel,
                                siempre explorando nuevas tecnologías para desarrollar aplicaciones que resuelvan
                                problemas reales.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transición Hero → Habilidades -->
            <div class="relative h-24 w-full overflow-hidden">
                <!-- Fondo degradado -->
                <div class="absolute inset-0 bg-gradient-to-b from-crimson-dark to-crimson-medium"></div>

                <!-- Capa de bronce translúcido -->
                <div class="absolute inset-0 bg-bronze opacity-100 mix-blend-soft-light"></div>

                <!-- Onda SVG -->
                <div class="absolute bottom-0 w-full">
                    <svg viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg"
                        class="w-full h-full fill-bronze opacity-30">
                        <path d="M0,50 C360,100 1080,15 1440,65 L1440,0 L0,0 Z"></path>
                        <!-- Círculos flotantes -->
                        <circle class="circle-float" cx="200" cy="80" r="5" fill="#bronze" />
                        <circle class="circle-float" cx="600" cy="75" r="5" fill="#bronze" />
                        <circle class="circle-float" cx="950" cy="65" r="5" fill="#bronze" />
                        <circle class="circle-float" cx="1350" cy="70" r="5" fill="#bronze" />
                    </svg>
                </div>
            </div>

            <!-- SECCIÓN HABILIDADES -->
            <SkillsSection />

            <!-- Transición Habilidades → Proyectos -->
            <div
                class="relative h-28 w-full bg-gradient-to-b from-crimson-medium to-obsidian flex items-center justify-center">
                <!-- Línea horizontal -->
                <div class="relative h-0.5 bg-bronze w-[90%]">
                    <!-- Rombos pequeños (4 a la izquierda) -->
                    <div class="absolute top-1/2 left-208 flex gap-1 -translate-x-full -translate-y-1/2">
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                    </div>

                    <!-- Rombos pequeños (2 a la derecha) -->
                    <div class="absolute top-1/2 right-208 flex gap-1 translate-x-full -translate-y-1/2">
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                        <div class="w-3 h-3 bg-bronze rotate-45"></div>
                    </div>

                    <!-- Rombo central -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-6 h-6 bg-bronze rotate-45 relative">
                        </div>
                    </div>

                    <!-- Rombo final derecho (mismo tamaño que el central) -->
                    <div class="absolute top-1/2 right-183 -translate-y-1/2">
                        <div class="w-6 h-6 bg-bronze rotate-45"></div>
                    </div>

                    <!-- Rombo final izquierdo (mismo tamaño que el central) -->
                    <div class="absolute top-1/2 left-183 -translate-y-1/2">
                        <div class="w-6 h-6 bg-bronze rotate-45"></div>
                    </div>
                </div>
            </div>

            <!-- SECCIÓN PROYECTOS -->
            <projects />

            <!-- Transición de Proyectos a Contacto -->
            <div class="relative w-full h-[100px] bg-gradient-to-b from-obsidian to-crimson-medium overflow-hidden">
                <!-- Estrellas (círculos) -->
                <div v-for="i in 25" :key="i" class="absolute rounded-full bg-bronze opacity-80" :style="{
                    top: Math.random() * 100 + '%',
                    left: Math.random() * 100 + '%',
                    width: Math.random() * 4 + 2 + 'px',
                    height: Math.random() * 4 + 2 + 'px',
                    animation: `twinkle ${1 + Math.random()}s infinite alternate ease-in-out`
                }"></div>

                <!-- Ondas -->
                <svg class="absolute bottom-0 left-0 w-full h-full" viewBox="0 0 1440 100" preserveAspectRatio="none">
                    <path fill="#cd7f32" fill-opacity="1"
                        d="M0,60 C180,90 360,40 540,60 C720,80 900,20 1080,40 C1260,60 1440,30 1440,30 L1440,100 L0,100 Z">
                    </path>
                </svg>

            </div>

            <!-- SECCIÓN CONTACTO -->
            <ContactSection />
        </main>


    </div>
</template>

<style scoped>
@keyframes twinkle {
    from {
        opacity: 0.4;
        transform: scale(1);
    }

    to {
        opacity: 1;
        transform: scale(1.3);
    }
}
</style>