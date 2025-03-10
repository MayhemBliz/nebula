# Nebula - WordPress Boilerplate

Nebula is a modern, lightweight, and flexible **WordPress boilerplate** designed to streamline theme development. It follows best practices, keeps code organised, and enhances development efficiency.

## 🚀 Features
- **Lightweight & Fast** – Optimised for performance.
- **Tailwind CSS Integration** – Utility-first styling for rapid development.
- **Modular File Structure** – Organised code for easy maintenance.
- **Security Best Practices** – Hardened against common vulnerabilities.
- **Custom ACF Blocks** – Preconfigured for efficient block-based development.
- **JavaScript Setup** – Ready for interactivity.

## 📁 File & Folder Structure
```
blocks/
├── button/
│   ├── block.json
│   ├── button.php
├── faqs/
│   ├── block.json
│   ├── faqs.php
├── hero/
│   ├── block.json
│   ├── hero.php
├── logos/
│   ├── block.json
│   ├── logos.php
├── quotes/
│   ├── block.json
│   ├── quotes.php
├── section/
│   ├── block.json
│   ├── section.php
images/
inc/
├── acf.php
├── scripts.php
├── security.php
├── setup.php
js/
├── main.js
template-parts/
├── insights.php
404.php
footer.php
functions.php
header.php
home.php
index.php
package.json
page-home.php
page-maintenance.php
page.php
search.php
single.php
style.css
tailwind.config.js
tailwind.css
theme-header.css
theme.json
```

## 📌 Installation
### 1️⃣ **Set Up Local Development**
Nebula works best with **Local** (by Flywheel). If you’re using another environment, you may need to modify the `package.json` dev script to reference your local port.

### 2️⃣ **Navigate to the Themes Folder**
```sh
cd wp-content/themes
```

### 3️⃣ **Create Your Project**
You can either clone the repository or use `npx`:
```sh
git clone https://github.com/mayhembliz/nebula.git my-project
```
Or, using `npx`:
```sh
npx create-nebula my-project
```

### 4️⃣ **Move Into Your Project Directory**
```sh
cd my-project
```

### 5️⃣ **Install Dependencies (For Tailwind)**
```sh
npm install
```

### 6️⃣ **Build Tailwind (Development Mode)**
```sh
npm run dev
```
For production builds:
```sh
npm run build
```

### 7️⃣ **Activate the Theme**
- Activate it in **WordPress Admin → Appearance → Themes**

## ⚡ Usage
### 🔹 Custom ACF Blocks
Nebula includes an **ACF block system** for building flexible layouts. Blocks are stored in:
```
/blocks/
```
To register a new block, add a folder inside `/blocks/` and define `block.json` and a template file.

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
Nebula follows **WordPress hardening** techniques to improve security, including:
- Disabling XML-RPC
- Restricting REST API access
- Disabling theme and plugin file editing
- Enforcing content security policies
- Secure script enqueuing
- Sanitizing and validating inputs

## 🎨 Customization
Modify:
- **Global settings** in `/inc/setup.php`
- **Styles** in `/tailwind.css`
- **Tailwind Config** in `tailwind.config.js`
- **JavaScript** in `/js/main.js`
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
