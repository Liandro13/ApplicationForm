<h1 align="center">📝 Job Application Form</h1>
<p align="center">
  Multi-step job application form with real-time validation
</p>
<p align="center">
  <img src="https://img.shields.io/badge/Vue.js-4FC08D?style=for-the-badge&logo=vuedotjs&logoColor=white"/>
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/Axios-5A29E4?style=for-the-badge&logo=axios&logoColor=white"/>
  <img src="https://img.shields.io/badge/Status-Completed-brightgreen?style=for-the-badge"/>
</p>

---

## 📋 About

**Job Application Form** is a full-stack application implementing a guided 3-step job application form with a progress bar and visual feedback. The Vue 3 frontend communicates with a Laravel REST API to submit applications.

## ✨ Features

- **Multi-step Form** — guided 3-step experience
- **Progress Bar** — visual indicator ("Step X of 3 completed")
- **Field Validation** — real-time input checking
- **Feedback Modal** — visual response after submission
- **REST API** — Laravel backend for data persistence

## 📋 Form Steps

| Step | Fields |
|---|---|
| 1️⃣ Personal Info | Full name + Email |
| 2️⃣ Contact | Phone number + Area of interest |
| 3️⃣ Application | Motivation message + Terms acceptance |

## 🛠️ Tech Stack

**Frontend**
- Vue 3 — reactive framework
- Axios — HTTP client
- jQuery Validation — form validation

**Backend**
- Laravel (PHP) — REST API
- MySQL — database

## 📂 Project Structure

```
ApplicationForm/
├── src/
│   ├── App.vue
│   ├── main.js
│   ├── axios.js
│   ├── global.css
│   └── components/
│       ├── JobApplicationForm.vue   # Form orchestrator
│       ├── StepOne.vue              # Name + email
│       ├── StepTwo.vue              # Phone + area
│       ├── StepThree.vue            # Message + terms
│       └── BaseModal.vue            # Reusable modal
└── Back/                            # Laravel API
```

## 🚀 Getting Started

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

Open `http://localhost:8080` in your browser.

## 🔗 API Endpoint

```
POST http://127.0.0.1:8000/api/candidaturas
```

```json
{
  "nome": "John Doe",
  "email": "john@example.com",
  "telefone": "912345678",
  "area": "Web Development",
  "mensagem": "I am interested in..."
}
```