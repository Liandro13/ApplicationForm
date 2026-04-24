<h1 align="center">📝 Application Form</h1>
<p align="center">
  Formulário de candidatura a emprego multi-etapas
</p>
<p align="center">
  <img src="https://img.shields.io/badge/Vue.js-4FC08D?style=for-the-badge&logo=vuedotjs&logoColor=white"/>
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/Axios-5A29E4?style=for-the-badge&logo=axios&logoColor=white"/>
  <img src="https://img.shields.io/badge/estado-Concluído-brightgreen?style=for-the-badge"/>
</p>

---

## 📋 Sobre o Projeto

O **Application Form** é uma aplicação full-stack que implementa um formulário de candidatura a emprego em 3 etapas, com barra de progresso e feedback visual. O frontend em Vue 3 comunica com uma API Laravel para submeter as candidaturas.

## ✨ Funcionalidades

- **Formulário Multi-Etapas** — experiência guiada em 3 passos
- **Barra de Progresso** — indicador visual ("X de 3 concluído")
- **Validação de Campos** — verificação em tempo real
- **Modal de Feedback** — resposta visual ao utilizador após submissão
- **API REST** — backend Laravel para persistência

## 📋 Etapas do Formulário

| Etapa | Campos |
|---|---|
| 1️⃣ Dados Pessoais | Nome completo + Email |
| 2️⃣ Contacto | Telefone + Área de interesse |
| 3️⃣ Candidatura | Mensagem de motivação + Aceitação de termos |

## 🛠️ Tecnologias

**Frontend**
- Vue 3 — framework reativo
- Axios — cliente HTTP
- jQuery Validation — validação de formulários

**Backend**
- Laravel (PHP) — API REST
- MySQL — base de dados

## 📂 Estrutura do Projeto

```
ApplicationForm/
├── src/
│   ├── App.vue                   # Componente raiz
│   ├── main.js                   # Ponto de entrada Vue
│   ├── axios.js                  # Configuração HTTP
│   ├── global.css                # Estilos globais
│   └── components/
│       ├── JobApplicationForm.vue # Orquestrador do formulário
│       ├── StepOne.vue           # Etapa 1: nome + email
│       ├── StepTwo.vue           # Etapa 2: telefone + área
│       ├── StepThree.vue         # Etapa 3: mensagem + termos
│       └── BaseModal.vue         # Modal reutilizável
└── Back/                         # Laravel API
```

## 🚀 Como Executar

**Backend (Laravel)**

```bash
cd Back
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

**Frontend (Vue 3)**

```bash
npm install
npm run serve
```

Acede a `http://localhost:8080` no browser.

## 🔗 Endpoint da API

```
POST http://127.0.0.1:8000/api/candidaturas
```

```json
{
  "nome": "João Silva",
  "email": "joao@example.com",
  "telefone": "912345678",
  "area": "Desenvolvimento Web",
  "mensagem": "Tenho interesse em..."
}
```
