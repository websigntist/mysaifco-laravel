<aside id="layout-menu" class="layout-menu menu-vertical menu" data-bs-theme="dark">
   <div class="app-brand demo">
      <a href="<?php echo e(route('dashboard')); ?>" class="app-brand-link">
         <img src="<?php echo e(asset('assets/backend/images/websigntist.svg')); ?>" width="30" alt="websigntist.com" title="websigntist.com">
         <span class="app-brand-text demo menu-text fw-medium text-uppercase ms-3">Admin Panel</span>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
         <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
         <i class="icon-base ti tabler-x d-block d-xl-none"></i>
      </a>
   </div>
   <div class="menu-inner-shadow"></div>
    

    <?php
        $menu = getUserMenus();
        echo buildMenuHtml(0, $menu, true);
    ?>

</aside>
<div class="menu-mobile-toggler d-xl-none rounded-1">
   <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
      <i class="ti tabler-menu icon-base"></i> <i class="ti tabler-chevron-right icon-base"></i> </a>
</div>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/components/left_menu.blade.php ENDPATH**/ ?>