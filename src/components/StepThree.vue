<template>
  <div class="form-steps" :class="{ active: currentStep === 3 }" id="step3">
    <a href="#" class="prev" @click.prevent="prevStep(3)"><i class="las la-arrow-left"></i>Passo Anterior</a>
    <h3>Passo 3: Mensagem e Termos</h3>
    <form @submit.prevent="handleSubmit" class="job-application-form" id="commentForm3">
      <div class="form-group">
        <textarea
          class="form-control"
          :value="message"
          @input="$emit('update:message', $event.target.value)"
          id="inputMessage"
        ></textarea>
        <label for="inputMessage">Mensagem Opcional</label>
      </div>
      <div class="form-group check-group">
        <div class="custom-checkbox">
          <input
            type="checkbox"
            :checked="localTermsAccepted"
            @change="handleTermsChange"
            class="custom-control-input"
            id="terms"
            required
          />
          <label class="custom-control-label" for="terms">Li e aceito os <a href="#">Termos e Condições</a></label>
          <div v-if="termsError" class="error-message">{{ termsError }}</div>
        </div>
      </div>
      <button type="submit" class="btn" id="submitForm">Submeter</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['currentStep', 'message', 'termsAccepted'],
  data() {
    return {
      localTermsAccepted: this.termsAccepted,
      termsError: '', // For storing the error message related to terms acceptance
    };
  },
  methods: {
    prevStep() {
      this.$emit('prev', 3);
    },
    handleTermsChange(event) {
      this.localTermsAccepted = event.target.checked;
      this.$emit('update:termsAccepted', this.localTermsAccepted);
    },
    handleSubmit() {
      // Validate that the terms and conditions are accepted
      if (!this.localTermsAccepted) {
        this.termsError = 'Você deve aceitar os Termos e Condições antes de submeter o formulário.';
        return;
      } else {
        this.termsError = '';
      }

      // If validation passes, emit the submit event to the parent component
      this.$emit('submit');
    },
  },
};
</script>
