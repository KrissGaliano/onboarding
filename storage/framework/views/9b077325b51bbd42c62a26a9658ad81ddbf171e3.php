<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="px-8 py-12 mb-8 bg-slate-200">
        <div class="container grid grid-cols-2 gap-10 lg:grid-cols-2">
            <figure>
                <?php if($course->image): ?>
                <img class="h-80 w-120" src="<?php echo e(Storage::url($course->image->url)); ?>" alt="">
                <?php else: ?>
                    <img class="h-80 w-120" src="https://images.pexels.com/photos/5905709/pexels-photo-5905709.jpeg?cs=srgb&dl=pexels-katerina-holmes-5905709.jpg&fm=jpg">
                    <?php endif; ?>
            </figure>
            <div class="py-2 text-black">
                <h1 class="text-4xl font-bold"><?php echo e($course->title); ?></h1>
                <!--<h2 class="mb-3 text-xl"><?php echo e($course->subtitle); ?></h2>-->
                <!--<p class="mb-2 "> <i class="fas fa-chart-line"></i>  Nivel:<?php echo e($course->level->name); ?></p>-->
                <p class="mb-2 text-lg "> <i class="py-4 fas fa-file-alt"></i>  Categoria: <?php echo e($course->category->name); ?></p>
                <p class="mb-2 text-lg"> <i class="fas fa-users"></i>  Usuarios: <?php echo e($course->students_count); ?></p>
                <!--<p> <i class="far fa-star"></i> Calificacion:<?php echo e($course->rating); ?></p>-->
            </div>

        </div>
    </section>
    <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">


        <?php if(session('info')): ?>
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                    <strong class="font-bold">Ocurrió un error!</strong>
                    <span class="block sm:inline"><?php echo e((session('info'))); ?></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg  x-on:click="open=false" class="w-6 h-6 text-red-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
            </div>
        <?php endif; ?>



        <div class="order-2 lg:col-span-2 lg-order-1">
            
            <section class="mb-12 card">
                <div class="card-body">
                    <h1 class="mb-2 text-2xl font-bold">Loque aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6">

                        <?php $__empty_1 = true; $__currentLoopData = $course->goals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="text-base text-gray-700"><i class="mr-2 text-gray-600 fas fa-check"></i><?php echo e($item->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="text-base text-gray-700">Este curso no tiene asignado ninguna meta</li>
                        <?php endif; ?>

                    </ul>
                </div>
            </section>

        
            <section>
                <h1 class="mb-2 text-3xl font-bold">Temario</h1>
                <?php $__empty_1 = true; $__currentLoopData = $course -> sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="mb-4 shadow"
                    <?php if($loop->first): ?>
                        x-data="{open:true}"
                        <?php else: ?>
                        x-data="{open:false}"

                    <?php endif; ?>


                        <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer" x-on:click="open = !open">
                            <h1 class="text-lg font-bold text-gray-600"> <?php echo e($section -> name); ?> </h1>
                        </header>
                        <div class="px-4 py-2 bg-white" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">

                                <?php $__currentLoopData = $section->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="text-base text-gray-700 "> <i class="mr-2 text-gray-600 fas fa-play-circle"> </i> <?php echo e($lesson->name); ?> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>

                        </div>
                    </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <article class="card">
                            <div class="card-body">
                                Este curso no tiene ninguna sección asignada
                            </div>
                    <?php endif; ?>

            </section>

            
            <section class="mb-8">
                <h1 class="text-3xl font-bold">Requisitos</h1>
                    <ul class="list-disc list-inside">
                        <?php $__empty_1 = true; $__currentLoopData = $course->requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="text-base text-gray-700">
                                <?php echo e($requirement->name); ?>

                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="text-base text-gray-700">
                                Este curso no tiene ningún requerimiento
                            </li>

                        <?php endif; ?>
                    </ul>

                </h1>
            </section>

            
            <section class="">
                <h1 class="text-3xl font-bold">Description</h1>
                <div class="pb-8 text-gray-700">
                    <?php echo $course->description; ?>

                </div>
            </section>


        </div>

        <div class="order-1 lg:order-2">
            <section class="mb-4 card">
                <div class="card-body">
                    <!--<div class="flex items-center">
                        <img class="object-cover w-12 h-12 rounded-full shadow-lg"" src="<?php echo e($course->teacher->profile_photo_url); ?>" alt="<?php echo e($course->teacher->name); ?>">
                        <div class="ml-4">
                            <h1 class="text-lg font-bold text-gray-500">Prof.<?php echo e($course->teacher->name); ?></h1>
                            <a class="text-sm font-bold text-blue-400" href=""><?php echo e('@'.Str::slug($course->teacher->name,'')); ?></a>
                        </div
                    </div>-->

                    <form action="<?php echo e(route('admin.courses.approved',$course)); ?>" class="mt-4" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full btn btn-danger"> Aprobar curso </button>
                    </form>


                </div>
            </section>



        </div>

    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\Trend\platform\resources\views/admin/courses/show.blade.php ENDPATH**/ ?>