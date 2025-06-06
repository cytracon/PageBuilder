var config = {
    paths: {
        mgzNumberCounter: 'Cytracon_PageBuilder/js/number-counter',
        mgzFotorama: 'Cytracon_PageBuilder/vendor/fotorama/fotorama',
        mgzSlider: 'Cytracon_PageBuilder/js/slider',
        mgzOwlSlider: 'Cytracon_Builder/js/carousel'
    },
    shim: {
        'Cytracon_PageBuilder/vendor/fotorama/fotorama': {
            deps: ['jquery']
        },
        'mgzOwlSlider': {
            deps: ['jquery']
        },
        'mgzSlider': {
            deps: ['jquery']
        },
        'Cytracon_Builder/js/carousel': {
            deps: ['jquery']
        },
        'Cytracon_PageBuilder/js/common': {
            deps: ['jquery']
        },
        'Cytracon_PageBuilder/js/flickr': {
            deps: ['jquery']
        },
        'Cytracon_PageBuilder/js/gallery': {
            deps: ['jquery']
        },
        'Cytracon_PageBuilder/js/instagram': {
            deps: ['jquery']
        },
        'Cytracon_PageBuilder/js/number-counter': {
            deps: ['jquery']
        },
        'Cytracon_PageBuilder/js/photoswipe': {
            deps: ['jquery']
        },
        'Cytracon_PageBuilder/js/slider': {
            deps: ['jquery']
        }
    }
};