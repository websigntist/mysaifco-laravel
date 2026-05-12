<aside id="layout-menu" class="layout-menu menu-vertical menu" data-bs-theme="dark">
   <div class="app-brand demo">
      <a href="{{route('dashboard')}}" class="app-brand-link">
         <img src="{{asset('assets/backend/images/websigntist.svg')}}" width="30" alt="websigntist.com" title="websigntist.com">
         <span class="app-brand-text demo menu-text fw-medium text-uppercase ms-3">Admin Panel</span>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
         <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
         <i class="icon-base ti tabler-x d-block d-xl-none"></i>
      </a>
   </div>
   <div class="menu-inner-shadow"></div>
    {{--<ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item">
              <a href="{{route('dashboard')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{ route('modules') }}" class="menu-link"> <i class="menu-icon icon-base ti tabler-color-swatch"></i>
                <div data-i18n="Modules">Modules</div>
             </a>
          </li>
          <!-- User Management -->
          <li class="menu-header small">
             <span class="menu-header-text" data-i18n="User Management">User Management</span>
          </li>
          <li class="menu-item">
             <a href="{{route('users')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-user-square"></i>
                <div data-i18n="Users">Users</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('user-types')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-lock"></i>
                <div data-i18n="Roles & Permission">Roles & Permission</div>
             </a>
          </li>
          <!-- Content Management System -->
          <li class="menu-header small">
             <span class="menu-header-text" data-i18n="CMS">CMS</span>
          </li>
          <li class="menu-item">
             <a href="" class="menu-link"> <i class="menu-icon icon-base ti tabler-brand-google-home"></i>
                <div data-i18n="Home Page">Home Page</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('pages')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-file-description"></i>
                    <div data-i18n="CMS Pages">CMS Pages</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-file-description"></i>
                <div data-i18n="Blogs">CMS Pages</div>
             </a>
             <ul class="menu-sub">
                <li class="menu-item">
                   <a href="{{route('pages.create')}}" class="menu-link">
                      <div data-i18n="Add Post">Add Page</div>
                   </a>
                </li>
                <li class="menu-item">
                   <a href="{{route('pages')}}" class="menu-link">
                      <div data-i18n="All Pages">All Pages</div>
                   </a>
                </li>
             </ul>
          </li>
          <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-brand-booking"></i>
                <div data-i18n="Blogs">Blogs</div>
             </a>
             <ul class="menu-sub">
                <li class="menu-item">
                   <a href="{{route('blogs.create')}}" class="menu-link">
                      <div data-i18n="Add Post">Add Post</div>
                   </a>
                </li>
                <li class="menu-item">
                   <a href="{{route('blogs')}}" class="menu-link">
                      <div data-i18n="All Post">All Post</div>
                   </a>
                </li>
                <li class="menu-item">
                   <a href="{{route('blog-categories')}}" class="menu-link">
                      <div data-i18n="Categories">Categories</div>
                   </a>
                </li>
                <li class="menu-item">
                   <a href="{{route('blog-tags')}}" class="menu-link">
                      <div data-i18n="Tags">Tags</div>
                   </a>
                </li>

             </ul>
          </li>
          <!-- eCommerce -->
          <li class="menu-header small">
             <span class="menu-header-text" data-i18n="eCommerce">eCommerce</span>
          </li>
          <!-- e-commerce-app menu start -->
          <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-shopping-cart"></i>
                <div data-i18n="eCommerce">eCommerce</div>
             </a>
             <ul class="menu-sub">
                <li class="menu-item">
                         <a href="{{ route('brands') }}" class="menu-link"> <i class="menu-icon icon-base ti tabler-award"></i>
                            <div data-i18n="Brands">Brands</div>
                         </a>
                      </li>
                      <li class="menu-item">
                         <a href="{{ route('brands.create') }}" class="menu-link">
                            <div data-i18n="Add Brand">Add Brand</div>
                         </a>
                      </li>
                      <li class="menu-item">
                         <a href="{{ route('product-categories') }}" class="menu-link"> <i class="menu-icon icon-base ti tabler-category-plus"></i>
                            <div data-i18n="Categories">Categories</div>
                         </a>
                      </li>
                      <li class="menu-item">
                         <a href="{{ route('product-category.create') }}" class="menu-link">
                            <div data-i18n="Add Category">Add Category</div>
                         </a>
                      </li>
                      <li class="menu-item">
                         <a href="javascript:void(0);" class="menu-link"> <i class="menu-icon icon-base ti tabler-basket-plus"></i>
                            <div data-i18n="Orders">Orders</div>
                         </a>
                      </li>
                      <li class="menu-item">
                         <a href="javascript:void(0);" class="menu-link"> <i class="menu-icon icon-base ti tabler-users-group"></i>
                            <div data-i18n="Customers">Customers</div>
                         </a>
                      </li>
                      <li class="menu-item">
                         <a href="javascript:void(0);" class="menu-link"> <i class="menu-icon icon-base ti tabler-brand-hipchat"></i>
                            <div data-i18n="Product Reviews">Product Reviews</div>
                         </a>
                      </li>
                      <li class="menu-item">
                         <a href="javascript:void(0);" class="menu-link"> <i class="menu-icon icon-base ti tabler-settings"></i>
                            <div data-i18n="Shop Setting">Shop Setting</div>
                         </a>
                      </li>
             </ul>
          </li>
          <!-- e-commerce-app menu end -->

          <!-- IMS (Invoice Management System) -->
          <li class="menu-header small">
             <span class="menu-header-text" data-i18n="IMS">Management System</span>
          </li>
          <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-receipt"></i>
                <div data-i18n="Invoices">Invoices</div>
             </a>
             <ul class="menu-sub">
                <li class="menu-item">
                   <a href="{{route('invoices.create')}}" class="menu-link">
                      <div data-i18n="Create Invoice">Create Invoice</div>
                   </a>
                </li>
                <li class="menu-item">
                   <a href="{{route('invoices')}}" class="menu-link">
                      <div data-i18n="All Invoices">All Invoices</div>
                   </a>
                </li>
             </ul>
          </li>

          <!-- QMS (Quotation Management System) -->
          <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-file-text"></i>
                <div data-i18n="Quotations">Quotations</div>
             </a>
             <ul class="menu-sub">
                <li class="menu-item">
                   <a href="{{route('quotations.create')}}" class="menu-link">
                      <div data-i18n="Create Quotation">Create Quotation</div>
                   </a>
                </li>
                <li class="menu-item">
                   <a href="{{route('quotations')}}" class="menu-link">
                      <div data-i18n="All Quotations">All Quotations</div>
                   </a>
                </li>
             </ul>
          </li>

          <!-- Other Modules -->
          <li class="menu-header small">
             <span class="menu-header-text" data-i18n="Other Modules">Other Modules</span>
          </li>
          <li class="menu-item">
             <a href="{{route('sliders')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-slideshow"></i>
                <div data-i18n="Hero Slider">Hero Slider</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('static-blocks')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-apps"></i>
                <div data-i18n="Static Block">Static Block</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('testimonials')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-brand-hipchat"></i>
                <div data-i18n="Testimonials">Testimonials</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('faqs')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-message-question"></i>
                <div data-i18n="Testimonials">FAQs</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('email-templates')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-mail-code"></i>
                <div data-i18n="Email Template">Email Template</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('inquiries')}}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-message-circle-user"></i>
                <div data-i18n="Contact Iquiries">Contact Iquiries</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('settings')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-settings-check"></i>
                <div data-i18n="Settings">Settings</div>
             </a>
          </li>
          <!-- Contact & Support -->
          <li class="menu-header small">
             <span class="menu-header-text" data-i18n="Contact & Support">Contact & Support</span>
          </li>
          <li class="menu-item">
             <a href="https://websigntist.com/" target="_blank" class="menu-link"> <i class="menu-icon icon-base ti tabler-phone-call"></i>
                <div data-i18n="Portal Support">Portal Support</div>
             </a>
          </li>
          <li class="menu-item">
             <a href="{{route('logout')}}" class="menu-link"> <i class="menu-icon icon-base ti tabler-logout-2"></i>
                <div data-i18n="Logout">Logout</div>
             </a>
          </li>
       </ul>--}}

    @php
        $menu = getUserMenus();
        echo buildMenuHtml(0, $menu, true);
    @endphp

</aside>
<div class="menu-mobile-toggler d-xl-none rounded-1">
   <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
      <i class="ti tabler-menu icon-base"></i> <i class="ti tabler-chevron-right icon-base"></i> </a>
</div>
