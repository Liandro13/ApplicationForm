<template>
  <div class="form-steps" :class="{ active: currentStep === 2 }" id="step2">
    <a href="#" class="prev" @click.prevent="prevStep"><i class="las la-arrow-left"></i>Passo Anterior</a>
    <h3>Passo 2: Detalhes de Contato e Interesse</h3>
    <form @submit.prevent="handleSubmit" class="job-application-form" id="commentForm2">
      <div class="form-group">
        <input
          type="text"
          :value="phone"
          @input="$emit('update:phone', $event.target.value)"
          class="form-control"
          id="input-phone"
          required
        />
        <label for="input-phone">Número de Telefone</label>
      </div>
      <div class="form-group">
        <select
          :value="area"
          @change="$emit('update:area', $event.target.value)"
          class="form-control"
          id="inputInterest"
          required
        >
          <option value="Desenvolvimento">Desenvolvimento</option>
          <option value="Design">Design</option>
          <option value="Marketing">Marketing</option>
        </select>
        <label for="inputInterest">Área de Interesse</label>
      </div>
      <button type="submit" class="btn step-btn">Próximo</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['currentStep', 'phone', 'area'],
  methods: {
    prevStep() {
      this.$emit('prev', 2);
    },
    handleSubmit() {
      this.$emit('next', 2);
    },
  },
};
</script>
