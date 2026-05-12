import 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js';

import $ from "jquery";

window.$ = $;
window.jQuery = $;

import lightGallery from 'lightgallery';

// Plugins (optional but recommended)
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';

// Initialize inside DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    const galleries = document.querySelectorAll('.lightgallery');
    galleries.forEach(gallery => {
        lightGallery(gallery, {
            plugins: [lgThumbnail, lgZoom], speed: 500,
        });
    });
});
