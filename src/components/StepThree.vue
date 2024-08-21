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
            :checked="termsAccepted"
            @change="$emit('update:termsAccepted', $event.target.checked)"
            class="custom-control-input"
            id="terms"
            required
          />
          <label class="custom-control-label" for="terms">Li e aceito os <a href="#">Termos e Condições</a></label>
        </div>
      </div>
      <button type="submit" class="btn" id="submitForm">Submeter</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['currentStep', 'message', 'termsAccepted'],
  methods: {
    prevStep() {
      this.$emit('prev', 3);
    },
    handleSubmit() {
      this.$emit('submit');
    },
  },
};
</script>
