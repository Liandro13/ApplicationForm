<template>
  <div class="form-steps" :class="{ active: currentStep === 1 }" id="step1">
    <h3>Passo 1: Dados Pessoais</h3>
    <form @submit.prevent="handleSubmit" class="job-application-form" id="commentForm1">
      <div class="form-group">
        <input
          type="text"
          :value="name"
          @input="$emit('update:name', $event.target.value)"
          class="form-control"
          id="input-name"
          required
        />
        <label for="input-name">Nome Completo</label>
        <div v-if="nameError" class="error-message">{{ nameError }}</div>
      </div>
      <div class="form-group">
        <input
          type="email"
          :value="email"
          @input="$emit('update:email', $event.target.value)"
          class="form-control"
          id="input-email"
          required
        />
        <label for="input-email">Endereço de Email</label>
        <div v-if="emailError" class="error-message">{{ emailError }}</div>
      </div>
      <button type="submit" class="btn step-btn">Próximo</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['currentStep', 'name', 'email'],
  data() {
    return {
      nameError: '', // For storing error messages related to the name field
      emailError: '', // For storing error messages related to the email field
    };
  },
  methods: {
    async handleSubmit() {
      // Validate the name (only letters, no digits or special characters)
      const namePattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
      if (!namePattern.test(this.name)) {
        this.nameError = 'O nome deve conter apenas letras.';
        return;
      } else {
        this.nameError = '';
      }

      // Validate the email format
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(this.email)) {
        this.emailError = 'O endereço de email não é válido.';
        return;
      } else {
        this.emailError = '';
      }

      try {
    const response = await fetch(`http://127.0.0.1:8000/api/candidaturas/check-email?email=${this.email}`);

    if (!response.ok) {
      console.error('Network response was not ok', response);
      this.emailError = 'Erro ao verificar o email. Por favor, tente novamente.';
      return;
    }

    // Attempt to log the response text to see what it actually contains
    const resultText = await response.text();
    console.log('Response text:', resultText);

    const result = JSON.parse(resultText); // Parse the text as JSON

    if (result.exists) {
      this.emailError = 'Este endereço de email já está registado.';
    } else {
      this.emailError = '';
      this.$emit('next', 1);
    }
  } catch (error) {
    console.error('Erro ao verificar o email:', error);
    this.emailError = 'Erro ao verificar o email. Por favor, tente novamente.';
  }
    },
  },
};
</script>

