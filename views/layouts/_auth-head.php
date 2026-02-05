<script>
    tailwind.config = {
        theme: {
            extend: {
                animation: {
                    float: "float 3s ease-in-out infinite",
                    fadeIn: "fadeIn 0.5s ease-in forwards",
                },
                keyframes: {
                    float: {
                        "0%, 100%": { transform: "translateY(0px)" },
                        "50%": { transform: "translateY(-10px)" },
                    },
                    fadeIn: {
                        from: { opacity: 0, transform: "translateY(10px)" },
                        to: { opacity: 1, transform: "translateY(0)" },
                    },
                },
            },
        },
    };
</script>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap");
    body {
        font-family: "Inter", sans-serif;
        overflow-x: hidden;
    }
    .glass {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    .input-focus:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }
</style>