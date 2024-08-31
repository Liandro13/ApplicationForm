<template>
  <div class="form-steps" :class="{ active: currentStep === 2 }" id="step2">
    <a href="#" class="prev" @click.prevent="prevStep"><i class="las la-arrow-left"></i>Passo Anterior</a>
    <h3>Passo 2: Detalhes de Contato e Interesse</h3>
    <form @submit.prevent="handleSubmit" class="job-application-form" id="commentForm2">
      <div class="form-group">
        <input
          type="text"
          v-model="localPhone"
          class="form-control"
          id="input-phone"
          required
        />
        <label for="input-phone">Número de Telefone</label>
        <div v-if="phoneError" class="error-message">{{ phoneError }}</div>
      </div>
      <div class="form-group">
        <select
          v-model="localArea"
          class="form-control"
          id="inputInterest"
          required
          style="color: black; font-size: 16px;"
        >
          <option value="" disabled>Selecione uma opção</option>
          <option value="Desenvolvimento">Desenvolvimento</option>
          <option value="Design">Design</option>
          <option value="Marketing">Marketing</option>
        </select>
        <label for="inputInterest">Área de Interesse</label>
        <div v-if="areaError" class="error-message">{{ areaError }}</div>
      </div>
      <p>Selected area: {{ localArea }}</p> <!-- Exibir valor selecionado -->
      <button type="submit" class="btn step-btn">Próximo</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['currentStep', 'phone', 'area'],
  data() {
    return {
      localPhone: this.phone,
      localArea: this.area,
      phoneError: '', // For storing error messages related to the phone field
      areaError: '',  // For storing error messages related to the area field
    };
  },
  watch: {
    phone(newPhone) {
      this.localPhone = newPhone;
    },
    area(newArea) {
      this.localArea = newArea;
    }
  },
  methods: {
    prevStep() {
      this.$emit('prev', 2);
    },
    handleSubmit() {
      // Validate the phone number (must be exactly 9 digits)
      const phonePattern = /^[0-9]{9}$/;
      if (!phonePattern.test(this.localPhone)) {
        this.phoneError = 'O número de telefone deve ter 9 dígitos.';
        return;
      } else {
        this.phoneError = '';
      }

      // Validate the area of interest (must be selected)
      if (!this.localArea) {
        this.areaError = 'Por favor, selecione uma área de interesse.';
        return;
      } else {
        this.areaError = '';
      }

      // If validations pass, update the parent component and proceed to the next step
      this.$emit('update:phone', this.localPhone);
      this.$emit('update:area', this.localArea);
      this.$emit('next', 2);
    }
  }
};
</script>
