@extends('Dashboards.student.dashboard')

@section('Sdash')
   <section class="flex-1 p-6 sm:p-8 bg-secondary-dark rounded-2xl shadow-xl border border-gray-700 overflow-auto">
            <h2 class="text-3xl font-bold mb-8 text-white flex items-center gap-3">
                <i data-lucide="book-open" class="w-7 h-7 text-accent-gold"></i> My Courses
            </h2>

            <!-- Course Grid (Fully Responsive) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">

                <!-- 1. Course Card: Full Stack Web Development -->
                <div class="bg-tertiary-dark rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition duration-300 border border-gray-700 overflow-hidden cursor-pointer">
                    <img src="https://source.unsplash.com/600x400/?webdevelopment,code" alt="Course Thumbnail"
                        class="rounded-t-xl w-full h-40 object-cover opacity-80 hover:opacity-100 transition duration-300">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-1 truncate" title="Full Stack Web Development">Full Stack Web Development</h3>
                        <p class="text-gray-400 text-sm mb-4">12 Modules | 40 Hours</p>
                        
                        <div class="w-full bg-gray-700 h-2 rounded-full mb-3">
                            <div class="bg-accent-blue h-2 rounded-full" style="width: 65%;"></div>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-accent-gold font-medium">Progress: 65%</span>
                            <a href="#"
                                class="text-accent-blue text-sm font-bold hover:underline hover:text-blue-400 transition">Continue <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- 2. Course Card: UI/UX Design Essentials -->
                <div class="bg-tertiary-dark rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition duration-300 border border-gray-700 overflow-hidden cursor-pointer">
                    <img src="https://source.unsplash.com/600x400/?design,mockup" alt="Course Thumbnail"
                        class="rounded-t-xl w-full h-40 object-cover opacity-80 hover:opacity-100 transition duration-300">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-1 truncate" title="UI/UX Design Essentials">UI/UX Design Essentials</h3>
                        <p class="text-gray-400 text-sm mb-4">8 Modules | 30 Hours</p>
                        
                        <div class="w-full bg-gray-700 h-2 rounded-full mb-3">
                            <div class="bg-accent-blue h-2 rounded-full" style="width: 20%;"></div>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-accent-gold font-medium">Progress: 20%</span>
                            <a href="#"
                                class="text-accent-blue text-sm font-bold hover:underline hover:text-blue-400 transition">Continue <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- 3. Course Card: Data Science with Python (Completed) -->
                <div class="bg-tertiary-dark rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition duration-300 border border-gray-700 overflow-hidden cursor-pointer">
                    <img src="https://source.unsplash.com/600x400/?graph,machinelearning" alt="Course Thumbnail"
                        class="rounded-t-xl w-full h-40 object-cover opacity-80 hover:opacity-100 transition duration-300">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-1 truncate" title="Data Science with Python">Data Science with Python</h3>
                        <p class="text-gray-400 text-sm mb-4">15 Modules | 60 Hours</p>
                        
                        <div class="w-full bg-gray-700 h-2 rounded-full mb-3">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 100%;"></div>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-green-400 font-bold">Completed!</span>
                            <a href="#"
                                class="text-green-400 text-sm font-bold hover:underline hover:text-green-300 transition flex items-center">
                                Review <i data-lucide="check-circle" class="w-4 h-4 inline ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. Course Card: Cloud Computing Fundamentals -->
                <div class="bg-tertiary-dark rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition duration-300 border border-gray-700 overflow-hidden cursor-pointer">
                    <img src="https://source.unsplash.com/600x400/?network,datacenter" alt="Course Thumbnail"
                        class="rounded-t-xl w-full h-40 object-cover opacity-80 hover:opacity-100 transition duration-300">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-1 truncate" title="Cloud Computing Fundamentals">Cloud Computing Fundamentals</h3>
                        <p class="text-gray-400 text-sm mb-4">6 Modules | 25 Hours</p>
                        
                        <div class="w-full bg-gray-700 h-2 rounded-full mb-3">
                            <div class="bg-accent-blue h-2 rounded-full" style="width: 90%;"></div>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-accent-gold font-medium">Progress: 90%</span>
                            <a href="#"
                                class="text-accent-blue text-sm font-bold hover:underline hover:text-blue-400 transition">Continue <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- 5. Course Card: Advanced Algorithms -->
                <div class="bg-tertiary-dark rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition duration-300 border border-gray-700 overflow-hidden cursor-pointer">
                    <img src="https://source.unsplash.com/600x400/?math,algorithm" alt="Course Thumbnail"
                        class="rounded-t-xl w-full h-40 object-cover opacity-80 hover:opacity-100 transition duration-300">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-1 truncate" title="Advanced Algorithms">Advanced Algorithms</h3>
                        <p class="text-gray-400 text-sm mb-4">10 Modules | 50 Hours</p>
                        
                        <div class="w-full bg-gray-700 h-2 rounded-full mb-3">
                            <div class="bg-accent-blue h-2 rounded-full" style="width: 5%;"></div>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-accent-gold font-medium">Progress: 5%</span>
                            <a href="#"
                                class="text-accent-blue text-sm font-bold hover:underline hover:text-blue-400 transition">Start Course <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
@endsection


