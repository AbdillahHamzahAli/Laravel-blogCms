/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/newblog/*.blade.php",
        "./resources/views/layouts/_newblog/*.blade.php",
        "./resources/views/layouts/newblog.blade.php",
    ],
    theme: {
        extend: {
            container: {
                center: true,
                padding: "16px",
            },
        },
    },
    plugins: [],
};
