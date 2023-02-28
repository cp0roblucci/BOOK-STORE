/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
            },
            fontSize: {
                12: "12px",
                14: "14px",
                16: "16px",
                20: "20px",
                24: "24px",
                26: "26px",
                32: "32px",
                36: "36px",
                48: "48px",
            },
        },
    },
    plugins: [],
}
