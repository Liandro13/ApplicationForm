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
      </div>
      <button type="submit" class="btn step-btn">Próximo</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['currentStep', 'name', 'email'],
  methods: {
    handleSubmit() {
      this.$emit('next', 1);
    },
  },
};
</script>
