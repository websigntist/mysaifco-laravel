(() => {
  function initDropzones() {
    if (typeof Dropzone === 'undefined') {
      return;
    }

    Dropzone.autoDiscover = false;

    const previewTemplate = `<div class="dz-preview dz-file-preview">
  <div class="dz-details">
    <div class="dz-thumbnail">
      <img data-dz-thumbnail>
      <span class="dz-nopreview">No preview</span>
      <div class="dz-success-mark"></div>
      <div class="dz-error-mark"></div>
      <div class="dz-error-message"><span data-dz-errormessage></span></div>
      <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-primary" style="width:0%" data-dz-uploadprogress></div>
      </div>
    </div>
    <div class="dz-filename"><span data-dz-name></span></div>
    <div class="dz-size"><span data-dz-size></span></div>
  </div>
</div>`;

    function optionsFor(el) {
      const dataUrl = el.getAttribute('data-upload-url');
      const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
      const base = {
        previewTemplate,
        parallelUploads: 1,
        maxFilesize: 5,
        addRemoveLinks: true,
        paramName: 'file',
        acceptedFiles: 'image/jpeg,image/png,image/webp,image/gif',
      };
      if (dataUrl && dataUrl.trim() !== '') {
        const headers = {};
        if (csrf) {
          headers['X-CSRF-TOKEN'] = csrf;
        }
        headers.Accept = 'application/json';
        return {
          ...base,
          url: dataUrl,
          autoProcessQueue: true,
          headers,
        };
      }
      return {
        ...base,
        url: '/',
        autoProcessQueue: false,
      };
    }

    /** Dropzone passes different 2nd/3rd args by version; file.xhr.responseText is the reliable source. */
    function parseProductGalleryPath(file, arg2, arg3) {
      if (file && file.xhr && typeof file.xhr.responseText === 'string' && file.xhr.responseText.trim() !== '') {
        try {
          const d = JSON.parse(file.xhr.responseText);
          if (d && d.path) {
            return String(d.path);
          }
        } catch (e) {
          /* fall through */
        }
      }
      let data = null;
      if (arg2 && typeof arg2 === 'object' && typeof arg2.responseText === 'string') {
        try {
          data = JSON.parse(arg2.responseText);
        } catch (e) {
          data = null;
        }
      }
      if (!data && arg2 && typeof arg2 === 'object' && arg2.path) {
        data = arg2;
      }
      if (!data && typeof arg2 === 'string') {
        try {
          data = JSON.parse(arg2);
        } catch (e) {
          data = null;
        }
      }
      if (!data && arg3 && typeof arg3 === 'object' && arg3.path) {
        data = arg3;
      }
      if (!data && typeof arg3 === 'string') {
        try {
          data = JSON.parse(arg3);
        } catch (e) {
          data = null;
        }
      }
      return data && data.path ? String(data.path) : null;
    }

    function escapeAttr(s) {
      return String(s).replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;');
    }

    function addGalleryHiddenToProductForm(path) {
      const form = document.getElementById('wizard-validation-form');
      if (!form || !path) {
        return;
      }
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'gallery_images[]';
      input.value = path;
      input.setAttribute('data-gallery-dz', '1');
      form.appendChild(input);
    }

    function removeGalleryHiddenFromProductForm(path) {
      const form = document.getElementById('wizard-validation-form');
      if (!form) {
        return;
      }
      form.querySelectorAll('input[name="gallery_images[]"][data-gallery-dz="1"]').forEach(inp => {
        if (inp.value === path) {
          inp.remove();
        }
      });
    }

    function appendProductGalleryThumb(path) {
      const wrap = document.getElementById('product-gallery-thumbs');
      if (!wrap || !path) {
        return null;
      }
      addGalleryHiddenToProductForm(path);

      const prefix = wrap.getAttribute('data-gallery-url-prefix') || '';
      const col = document.createElement('div');
      col.className = 'col-6 col-md-3 product-gallery-thumb';
      col.setAttribute('data-gallery-path', path);
      col.setAttribute('data-gallery-from-dropzone', '1');
      col.innerHTML =
        '<div class="position-relative border rounded overflow-hidden bg-label-secondary bg-opacity-10">' +
        '<img class="img-fluid w-100 d-block" style="max-height: 140px; object-fit: cover;" src="' +
        escapeAttr(prefix + path) +
        '" alt="">' +
        '<button type="button" class="btn btn-sm btn-icon btn-danger position-absolute top-0 end-0 m-1 btn-remove-gallery-thumb" title="Remove from gallery" aria-label="Remove">' +
        '<i class="icon-base ti tabler-x"></i></button></div>';
      wrap.appendChild(col);
      return col;
    }

    function bindProductGalleryThumbRemove() {
      const wrap = document.getElementById('product-gallery-thumbs');
      if (!wrap || wrap._productGalleryRemoveBound) {
        return;
      }
      wrap._productGalleryRemoveBound = true;
      wrap.addEventListener('click', e => {
        const btn = e.target.closest('.btn-remove-gallery-thumb');
        if (!btn || !wrap.contains(btn)) {
          return;
        }
        const col = btn.closest('.product-gallery-thumb');
        if (!col) {
          return;
        }
        const path = col.getAttribute('data-gallery-path') || '';
        if (col.getAttribute('data-gallery-from-dropzone') === '1') {
          removeGalleryHiddenFromProductForm(path);
        }
        col.remove();
      });
    }

    let el = document.querySelector('#dropzone-basic');
    if (el) {
      if (el.dropzone) {
        el.dropzone.destroy();
      }
      new Dropzone(el, { ...optionsFor(el), maxFiles: 1 });
    }

    el = document.querySelector('#dropzone-multi.dropzone');
    if (el) {
      if (el.dropzone) {
        el.dropzone.destroy();
      }
      const opts = optionsFor(el);
      opts.init = function () {
        bindProductGalleryThumbRemove();
        this.on('success', (file, arg2, arg3) => {
          const run = attempt => {
            if (file._galleryPath) {
              return;
            }
            const path = parseProductGalleryPath(file, arg2, arg3);
            if (path) {
              file._galleryPath = path;
              file._galleryThumbCol = appendProductGalleryThumb(path);
              return;
            }
            if (attempt === 0) {
              requestAnimationFrame(() => run(1));
            } else if (attempt === 1) {
              setTimeout(() => run(2), 10);
            }
          };
          run(0);
        });
        this.on('error', (file, message) => {
          if (typeof console !== 'undefined' && console.warn) {
            console.warn('Product gallery Dropzone error:', message, file);
          }
        });
        this.on('removedfile', file => {
          if (file._galleryPath) {
            removeGalleryHiddenFromProductForm(file._galleryPath);
          }
          if (file._galleryThumbCol && file._galleryThumbCol.parentNode) {
            file._galleryThumbCol.remove();
            return;
          }
          if (!file._galleryPath) {
            return;
          }
          const wrap = document.getElementById('product-gallery-thumbs');
          if (!wrap) {
            return;
          }
          wrap.querySelectorAll('.product-gallery-thumb').forEach(col => {
            if (col.getAttribute('data-gallery-path') === file._galleryPath) {
              col.remove();
            }
          });
        });
      };
      new Dropzone(el, opts);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initDropzones);
  } else {
    initDropzones();
  }
})();
