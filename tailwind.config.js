/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                customNavy: '#004A87',
                customGreen1: '#042323',
                customGreen2: '#085049',
                customGreen3: '#309b7d',
                customGreen4: '#aacb73',
                customGreen5: '#5ab9a1',
                signatureGreen: '#0bb288',
                customGray: '#060606',
                customWhite: '#f4f4f4',
                customBlue: '#345FF6',
                customGunmetal: '#253347',
                customBorders: '#D8E2E7',
                customPlaceholder: '#c8ccd1',
                customDarkElectricBlue: '#5E6E85',
                customTeal: 'rgb(222, 252, 246)'
            },
            gridTemplateColumns: {
                customCards: 'repeat(2, 365px)'
            },
            screens: {
                customXS: '320px',
                customMd: '768px',
                customXl: '1160px'
            },
            fontFamily: {
                customSans: ['Inter', 'sans-serif']
            },
            fontSize: {
                customFontXl: '4rem', // 64px
                customFontL: '3rem', // 48px
                customFontM: '1.5rem', // 24px
                customFontS: '1.25rem', // 20px,
                customBodyM: '1rem', // 16px
                customBodyS: '0.875rem' // 14px
            },
            lineHeight: {
                customHeading: '1.1',
                customBody: '1.5'
            },
            letterSpacing: {
                customXl: '-3px',
                customL: '-2.5px',
                customM: '-1px',
                customS: '-0.75px'
            },
            backgroundImage: {
                customGradient: 'linear-gradient(315deg, #d6e6fe 0%, rgba(214, 250, 254, 0.07) 92.71%, rgba(214, 252, 254, 0) 100%)',
                customResultGradient: 'linear-gradient(90deg, #345FF6 0%, #587DFF 100%)',
                customGradientCards: 'linear-gradient(315deg, rgba(214, 230, 254, 0.25) 0%, rgba(214, 252, 254, 0.00) 100%)',
                customPatternLineLeft: 'url("/pattern-curved-line-left.svg")',
                customPatternLineRight: 'url("/pattern-curved-line-right.svg")'
            },
            borderRadius: {
                customMd: '12px',
                customDefault: '16px',
                customHeader: '0 0 35px 35px',
                customResult: '16px 100px 100px 16px',
                customFull: '50%'
            },
            boxShadow: {
                custom_shadow1: '0 7px 9px rgba(34, 139, 34, 0.1), 0 5px 7px rgba(34, 139, 34, 0.06)'
            },
        },
    },
    plugins: [],
}
