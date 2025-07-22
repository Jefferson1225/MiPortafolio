<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="p-4 space-y-4">
        <!-- Prueba de colores -->
        <div class="space-y-2">
            <div class="bg-crimson-dark text-white p-2">Crimson Dark #8b0000</div>
            <div class="bg-crimson-medium text-white p-2">Crimson Medium #722f37</div>
            <div class="bg-bronze text-white p-2">Bronze #cd7f32</div>
            <div class="bg-slate text-white p-2">Slate #696969</div>
            <div class="bg-obsidian text-white p-2">Obsidian #1c1c1c</div>
        </div>

        <!-- 🔥 Prueba de fuentes -->
        <div class="space-y-2">
            <h1 class="font-serif text-4xl text-crimson-dark">Playfair Display - Título</h1>
            <p class="font-sans text-lg text-slate">Inter - Texto normal del portafolio</p>
        </div>
    </div>
</template>
