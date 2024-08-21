<template>
  <div class="ugf-wrapper">
    <div class="logo">
      <a href="../index.html">
        <img src="assets/images/logo.png" class="img-fluid logo-white" alt="logo">
        <img src="assets/images/logo-dark.png" class="img-fluid logo-black" alt="logo">
      </a>
    </div>
    <div class="ugf-content-block">
      <div class="content-block">
        <h1>Junte-se a Nós!</h1>
        <p>Preencha o formulário de candidatura para se juntar à nossa equipa.</p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-5 offset-lg-7 p-sm-0">
          <div class="ufg-job-application-wrapper pt150">
            <div class="progress">
              <div class="progress-bar" :style="{ width: progressWidth + '%' }" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <span class="step-text"><span class="current-step">{{ currentStep }}</span> de <span class="total-step">3</span> concluído</span>
              </div>
            </div>
    <StepOne
      v-if="currentStep === 1"
      :currentStep="currentStep"
      :name="name"
      :email="email"
      @update:name="name = $event"
      @update:email="email = $event"
      @next="nextStep"
    />
    <StepTwo
      v-if="currentStep === 2"
      :currentStep="currentStep"
      :phone="phone"
      :area="area"
      @update:phone="phone = $event"
      @update:area="area = $event"
      @prev="prevStep"
      @next="nextStep"
    />
    <StepThree
      v-if="currentStep === 3"
      :currentStep="currentStep"
      :message="message"
      :termsAccepted="termsAccepted"
      @update:message="message = $event"
      @update:termsAccepted="termsAccepted = $event"
      @prev="prevStep"
      @submit="submitForm"
    />
  </div>
</div>
</div>
</div>
</div>
</template>

<script>
import StepOne from './StepOne.vue';
import StepTwo from './StepTwo.vue';
import StepThree from './StepThree.vue';

export default {
  components: {
    StepOne,
    StepTwo,
    StepThree,
  },
  data() {
    return {
      currentStep: 1,
      name: '',
      email: '',
      phone: '',
      area: '',
      message: '',
      termsAccepted: false,
    };
  },
  methods: {
    nextStep() {
      this.currentStep++;
    },
    prevStep() {
      this.currentStep--;
    },
    submitForm() {
      alert('Formulário submetido com sucesso!');
      this.resetForm();
    },
    resetForm() {
      this.currentStep = 1;
      this.name = '';
      this.email = '';
      this.phone = '';
      this.area = '';
      this.message = '';
      this.termsAccepted = false;
    },
  },
};
</script>



