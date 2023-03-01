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
                "blue-100": "#0099ff",
                "blue-200": "#008fff",
                "blue-300": "#0085ff",
                "blue-400": "#007aff",
                "blue-500": "#0070ff",
                "blue-600": "#0066ff",
                "blue-700": "#005cff",
                "blue-800": "#0052ff",
                "blue-900": "#0047ff",
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
