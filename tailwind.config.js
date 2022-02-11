module.exports = {
  purge: ["**/*.html"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      screens: {
        xsm: "425px",
        // => @media (min-width: 425px)

        sm: "640px",
        // => @media (min-width: 640px) { ... }

        md: "768px",
        // => @media (min-width: 768px) { ... }

        lg: "1024px",
        // => @media (min-width: 1024px) { ... }

        xl: "1280px",
        // => @media (min-width: 1280px) { ... }

        "2xl": "1536px",
        // => @media (min-width: 1536px) { ... }
      },
      fontSize: {
        "10xl": "12.5rem",
      },

      spacing: {
        128: "32rem",
      },

      height: {
        he: "600px",
        he2: "710px",
        he3: "730px",
      },

      colors: {
        Vintage: {
          default: "#CEE5D0",
          1: "#F3F0D7",
          2: "#D8B384",
          3: "#5E454B",
          4: "#D9CDBA",
          5: "#F0E3D0",
          6: "#A28F71",
          7: "#716358",
          8: "#D3BD9A",
          9: "#FB4172",
          10: "#009690",
          11: "#F7DCAD",
        },
        red: {
          1000: "#810D24",
        },
        yellow: {
          1000: "#E6B635",
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
