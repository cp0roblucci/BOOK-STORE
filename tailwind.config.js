/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            "popins" : "Popins, sans-serif",
            sora: ["Sora"],
            pacifico: ["Pacifico"],
        },
        extend: {
            colors: {
                "blue-50": "rgb(237, 233, 254, 0.5)",
                "blue-100": "#0099ff",
                "blue-200": "#008fff",
                "blue-300": "#0085ff",
                "blue-400": "#007aff",
                "blue-500": "#0070ff",
                "blue-600": "#0066ff",
                "blue-700": "#005cff",
                "blue-800": "#0052ff",
                "blue-900": "#0047ff",
                "3f3f5a" :"#3f3f5a",
                "aliceblue" : "aliceblue",
            },
            fontSize: {
                10: "10px",
                12: "12px",
                14: "14px",
                16: "16px",
                18: "18px",
                20: "20px",
                24: "24px",
                26: "26px",
                32: "32px",
                36: "36px",
                48: "48px",
                56: "56px",
            },
            height: {
                400: "400px",
                500: "500px",
                593: "593px",
                600: "600px",
                650: "650px",
            },
            width: {
                600: "600px",
            },
            boxShadow: {
                md: "6px 6px 16px 0 rgba(0, 0, 0, 0.25), -4px -4px 12px 0 rgba(255, 255, 255, 0.3)",
                sm: "0 1px 1px rgb(0 0 0 / 12%)",
                cus: "29px 29px 58px #b8b8b8, -29px -29px 58px #ffffff",
            },
            animation: {
                fadeIn: "fadeIn 1s linear",
                fadeOut: "fadeOut 1s linear",
                line : "line 0.75s linear infinite",
            } ,
            keyframes: {
                fadeIn: {
                    "0%": { opacity: 0.1 },
                    "25%": { opacity: 0.3 },
                    "50%": { opacity: 0.6 },
                    "75%": { opacity: 0.9 },
                    "100%": { opacity: 1 },
                },
                fadeOut: {
                    "0%": { opacity: 1 },
                    "25%": { opacity: 0.9 },
                    "50%": { opacity: 0.6 },
                    "75%": { opacity: 0.3 },
                    "100%": { opacity: 0.1 },
                },
                line:{
                    "0%" :{
                        border: "1px solid #0099ff",
                        left: "32px",
                        width: "0",
                    },
                    "100%": {
                        border:" 1px solid #0047ff",
                        left: "32px",
                        width: "75%",

                    },
                }
            },
            spacing: {
                "4.5" : "18px",
                "25" : "100px",
            },
            width: {
                "30p" :"30%",
                "98p" : "98%",
                "90p" : "90%",
                "112.5" : "450px",
            },
            height: {
                "98p" : "98%",
                "95p" : "95%",
                "112.5" : "450px",
                "125" : "500px",
                "115" : "460px",
            },
            blur : {
                "10" : "10px",
            }
        },
    },
    plugins: [
        require('tailwind-scrollbar')({ nocompatible: true }),
    ],
}
