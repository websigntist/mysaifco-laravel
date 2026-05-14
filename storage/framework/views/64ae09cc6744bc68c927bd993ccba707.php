<?php $__env->startSection('content'); ?>
    <div class="flex justify-center items-center">
        <div
            class="px-4 hero_section relative flex md:min-h-[86vh] 2xl:min-h-[90vh] w-full items-center justify-center
            overflow-hidden">
            <div class="absolute inset-0 scale-105 bg-cover bg-center bg-no-repeat blur-[3px]"
                 style="background-image: url('<?php echo e(asset('assets/images/sliders/banner1.webp')); ?>')"
                 aria-hidden="true"></div>
            <div class="absolute inset-0 bg-gray-950/80" aria-hidden="true"></div>
            <div class="relative z-10 w-full py-10 md:py-14">
                <div class="container mx-auto w-full">
                    <div class="grid w-full grid-cols-1 md:grid-cols-2 items-center gap-5">
                        <div class="flex flex-col justify-center space-y-3">
                            <h1 class="text-4xl text-center md:text-left md:text-6xl font-bold text-white uppercase">
                                About us</h1>
                            <p class="text-md text-white text-center md:text-left leading-7">
                                Welcome to Standard Patches – your go-to for custom embroidered patches and logo
                                marketing. From team unity to brand awareness, we craft durable, high-quality patches
                                for jackets, caps, bags, and uniforms. Trust us to bring your vision to life with
                                precision and style. Quality patches, made to impress!
                            </p>
                            
                            <div class="mt-10 flex items-center justify-between md:flex md:items-center
                            md:justify-between w-full md:w-96 gap-5">
                                <a href="" class="text-white bg-gradient-to-br rounded-full from-std to-std-300 w-full uppercase
                                                    hover:bg-gradient-to-bl font-medium rounded-base text-sm px-4 py-3
                                                    text-center leading-5 outline-white outline-dashed outline-1
                                                                                                                                        outline-offset-[-5px]">Get
                                                                                                                                                               a
                                                                                                                                                               Quote</a>
                                <a href="" class="text-white bg-gradient-to-br rounded-full from-std to-std-300 w-full uppercase
                            hover:bg-gradient-to-bl font-medium rounded-base text-sm px-4 py-3 text-center leading-5 outline-white outline-dashed outline-1
                                                                                                                outline-offset-[-5px]">
                                    view gallery</a>
                                
                            </div>
                        </div>
                        <div class="">
                            <?php echo $__env->make('frontend.components.quote_form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('frontend.components.marquee', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <section class="product_categories flex justify-center items-center bg-gray-50 py-20 px-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-4 leading-6">
                    <h6 class="font-semibold text-sm bg-gray-100 inline-block px-2 py3 rounded-full text-gray-900 uppercase
                                       shadow-sm shadow-gray-300 mb-3">
                        standard custom patches
                    </h6>
                    <h1 class="capitalize font-bold text-5xl text-gray-900">Where Every Patch Has a Tale</h1>
                    <p class="text-justify">In 2014, Alan Meck founded Standard Patches with a dream as simple as a
                                            blank fabric—a dream to create meaningful, high-quality patches that tell
                                            stories and forge identities. What began as a humble endeavor to provide
                                            digitizing and vectorization services quickly grew into something
                                            extraordinary, thanks to Alan’s unwavering focus on customer satisfaction,
                                            durability, and affordability.</p>
                    <p class="text-justify">The story of Standard Patches truly began with what we lovingly call our
                                            “baby patch.” It was a small, vibrant design created for a local scout
                                            group’s jackets. Simple yet striking, this patch quickly became a symbol of
                                            unity and pride among the scouts. As word spread, more groups and businesses
                                            sought their own unique patches. Each new request added a thread to our
                                            story, weaving a tapestry of creativity, trust, and excellence.</p>
                    <p class="text-justify">People fell in love with the craftsmanship, the vibrant colors, and the way
                                            our patches seemed to perfectly embody their values and identities. Orders
                                            grew, and so did our team. We expanded our offerings to include PVC patches,
                                            leather patches, and woven logos, always pushing the boundaries of quality
                                            and innovation. From sports teams to corporate logos, from motorcycle clubs
                                            to martial arts groups, our patches began making their mark far and
                                            wide.</p>
                    <p class="text-justify">Today, Standard Patches stands as one of the finest providers of custom
                                            patches in the USA. Our journey is rooted in the belief that every patch is
                                            more than just a piece of fabric—it’s a symbol of belonging, a story waiting
                                            to be told. With state-of-the-art technology and a passion for perfection,
                                            we’ve transformed countless ideas into stunning designs that last a
                                            lifetime.</p>
                    <p class="text-justify">Whether you need a custom logo for your brand, a patch for your team’s
                                            jackets, or a stylish addition to your collection, we’re here to make it
                                            happen. Join us in continuing this journey, and let’s create something
                                            unforgettable together.</p>
                </div>
                <div class="flex flex-col items-center justify-center gap-5">
                    <img src="<?php echo e(asset('assets/images/sliders/p1.webp')); ?>"
                         class="mx-auto rounded-2xl mt-10 mix-blend-multiply transition-transform duration-500
                         hover:scale-101"
                         alt="01">
                </div>
            </div>
        </div>
    </section>

    
    <section class="flex justify-center items-center">
        <div class="hero_section relative flex py-10 px-4 w-full items-center justify-center overflow-hidden">
            <div class="absolute inset-0 scale-105 bg-cover bg-center bg-no-repeat blur-[0]"
                 style="background-image: url('<?php echo e(asset('assets/images/background/bg1.webp')); ?>')" aria-hidden="true"></div>
            <div class="absolute inset-0 bg-gray-950/60" aria-hidden="true"></div>
            <div class="relative z-10 w-full">
                <div class="container mx-auto w-full">
                    <div class="grid w-full grid-cols-1 md:grid-cols-2 items-center gap-5">
                        <div class="flex flex-col justify-center space-y-5">
                            <h4 class="text-lg font-semibold text-white capitalize">our vision</h4>
                            <h1 class="text-4xl leading-10 md:text-5xl md:leading-12 font-bold text-white capitalize">
                                At Standard Patches you come first our cherished customers
                            </h1>
                            <p class="text-md text-white leading-7 text-justify">
                                We recognize that your tastes and needs are distinct, so we take the time to collaborate
                                with you and craft a personalized patch design tailored to your vision.
                            </p>
                            <p class="text-md text-white leading-7 text-justify">
                                Our approach is built on honesty, clear communication, and adaptability, ensuring we
                                remain aligned with you throughout the entire journey. With each order, we dedicate
                                genuine effort and care to deliver something meaningful. Choosing Quality Patches means
                                choosing reliability and passion. You can be confident that your project is being
                                handled with dedication and expertise.
                            </p>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-5">
                            <img src="<?php echo e(asset('assets/images/sliders/p5.webp')); ?>"
                                 class="mx-auto mix-blend-multiply transition-transform duration-500 hover:scale-101"
                                 alt="01">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('frontend.components.inspiration', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/frontend/pages/about-us.blade.php ENDPATH**/ ?>