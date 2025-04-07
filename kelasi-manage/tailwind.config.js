module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                'kelasi-primary': '#2563EB',
                'kelasi-secondary': '#3B82F6',
                'kelasi-dark': '#1E40AF',
                'kelasi-light': '#93C5FD',
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}