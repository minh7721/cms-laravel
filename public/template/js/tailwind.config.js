tailwind.config = {
    theme: {
      extend: {
        colors: {
          xanhLaDam: '#007882',
          mauChu: '#3B4144',
          mauDo: '#D93C23',
        },
      },
      borderRadius: {
          '36px' : '36px',
          '24px' : '24px',
          'none': '0',
          'sm': '0.125rem',
          DEFAULT: '0.25rem',
          DEFAULT: '4px',
          'md': '0.375rem',
          'lg': '0.5rem',
          'full': '9999px',
          'large': '12px',
        },
        screens: {
          'sm': {'max': '767px'},
          // => @media (min-width: 375px and max-width: 767px) { ... }
    
          'md': '768px',
        // => @media (min-width: 768px) { ... }
  
        'lg': '1024px',
        // => @media (min-width: 1024px) { ... }
  
        'xl': '1280px',
        // => @media (min-width: 1280px) { ... }
  
        '2xl': '1536px',
        // => @media (min-width: 1536px) { ... }
        },
        letterSpacing: {
          tight1: '-0.01em',
          tightest: '-.075em',
          tighter: '-.05em',
          tight: '-.025em',
          normal: '0',
          wide: '.025em',
          wider: '.05em',
          widest: '.1em',
          widest: '.25em',
          spaceChu: '0.0015em',
        }
    },
  };
  