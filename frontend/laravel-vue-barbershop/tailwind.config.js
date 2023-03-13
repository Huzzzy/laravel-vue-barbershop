/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {},
        fontFamily: {
            body: ['"Open Sans"'],
        },
    },
    plugins: [require("daisyui", "flowbite/plugin", "tw-elements/dist/plugin")],
};
