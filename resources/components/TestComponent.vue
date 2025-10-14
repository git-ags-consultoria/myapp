<template>
  <div class="p-4 bg-gray-100 border rounded">
    <h2>Componente Vue funcionando 🎉</h2>
    <p>Mensagem: {{ message }}</p>

    <button @click="alterarMensagem" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded">
      Trocar Mensagem
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const message = ref('Olá do Vue dentro do Blade!')

function alterarMensagem() {
  message.value = 'A mensagem foi alterada!'
}
</script>

<style scoped>
h2 {
  color: #333;
}
</style>
