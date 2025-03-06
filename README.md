# Nebula - WordPress Boilerplate

Nebula is a modern, lightweight, and flexible **WordPress boilerplate** designed to streamline theme development. It follows best practices, keeps code organized, and enhances development efficiency.

## 🚀 Features
- **Lightweight & Fast** – Optimized for performance.
- **Tailwind CSS Integration** – Utility-first styling for rapid development.
- **Modular File Structure** – Organized code for easy maintenance.
- **Security Best Practices** – Hardened against common vulnerabilities.
- **Custom ACF Blocks** – Preconfigured for efficient block-based development.
- **SCSS & JavaScript Setup** – Ready for styling and interactivity.

## 📁 File Structure
```
nebula/
├── acf/                   # ACF Block Definitions
├── assets/
│   ├── css/               # Stylesheets (SCSS & Tailwind Config)
│   ├── js/                # JavaScript Files
├── inc/                   # Theme Includes (Setup, Security, Scripts, etc.)
├── template-parts/        # Reusable Theme Components
├── tailwind.config.js     # Tailwind CSS Configuration
├── postcss.config.js      # PostCSS Configuration for Tailwind
├── index.php              # Main Theme File
├── functions.php          # Core Theme Functions
├── style.css              # Theme Stylesheet
├── README.md              # Documentation (This File)
```

## 📌 Installation
### 1️⃣ **Clone the Repository**
```sh
git clone https://github.com/mayhembliz/nebula.git
```
### 2️⃣ **Move Into the Theme Directory**
```sh
cd nebula
```
### 3️⃣ **Install Dependencies (For Tailwind)**
If you're using **Tailwind CSS**, install dependencies:
```sh
npm install
```

### 4️⃣ **Build Tailwind (Development Mode)**
```sh
npm run dev
```
For production builds:
```sh
npm run build
```

### 5️⃣ **Activate the Theme**
- Upload the theme to `/wp-content/themes/`
- Activate it in **WordPress Admin → Appearance → Themes**

## ⚡ Usage
### 🔹 Custom ACF Blocks
Nebula includes an **ACF block system** for building flexible layouts. Blocks are stored in:
```
/acf/acf_blocks.php
```
To register a new block, add it to `acf_blocks.php` and create a template in `/template-parts/blocks/`.

### 🔹 Enqueueing Scripts & Styles
Nebula enqueues scripts in:
```
/inc/scripts.php
```
Modify this file to add your own **CSS and JavaScript**.

### 🔹 Tailwind CSS
Nebula is fully integrated with **Tailwind CSS** for fast, utility-first styling.  
- Tailwind configuration is in `tailwind.config.js`.
- Run `npm run dev` to watch and compile Tailwind changes.

### 🔹 Security Enhancements
Basic security features are handled in:
```
/inc/security.php
```
Includes WordPress **hardening** techniques to improve security.

## 🎨 Customization
Modify:
- **Global settings** in `/inc/setup.php`
- **Styles** in `/assets/css/`
- **Tailwind Config** in `tailwind.config.js`
- **JavaScript** in `/assets/js/`
- **Custom Templates** in `/template-parts/`

## 📜 License
Nebula is open-source and released under the **MIT License**. See the [`LICENSE`](LICENSE) file for more details.

## ✨ Author
**Sean Palmer**  
[Website](https://seanp.co.uk) | [GitHub](https://github.com/mayhembliz)

## 🌟 Contributing
Pull requests and improvements are welcome! If you find any issues or have feature suggestions, please open an issue in the repository.

---

🚀 **Nebula is built to make WordPress development easier, faster, and more secure with Tailwind CSS. Happy coding!** 🎉
