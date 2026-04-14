<footer class="bg-white dark:bg-[#050505] py-24 border-t border-gray-100 dark:border-white/5">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <div class="col-span-1 lg:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 mb-6">
                    <div class="w-6 h-6 bg-indigo-600 rounded flex items-center justify-center">
                        <i data-lucide="zap" class="w-3.5 h-3.5 text-white"></i>
                    </div>
                    <span class="text-lg font-bold text-gray-900 dark:text-white tracking-tight">
                        Course<span class="text-indigo-600">Easy</span>
                    </span>
                </a>
                <p class="text-sm text-gray-500 dark:text-gray-400 max-w-xs leading-relaxed mb-6">
                    The architecture of high-fidelity technical education. Built for the next generation of digital architects.
                </p>
                <div class="flex gap-3">
                    @foreach(['twitter', 'github', 'linkedin'] as $icon)
                        <a href="#" class="w-10 h-10 rounded-lg bg-gray-50 dark:bg-white/5 flex items-center justify-center text-gray-400 hover:text-indigo-600 transition-colors">
                            <i data-lucide="{{ $icon }}" class="w-4 h-4"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-6">Platform</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('courses') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Course Catalog</a></li>
                    <li><a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Learning Path</a></li>
                    <li><a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Resources</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-6">Company</h4>
                <ul class="space-y-4">
                    <li><a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">About Us</a></li>
                    <li><a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Privacy</a></li>
                    <li><a href="#" class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Terms</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-gray-100 dark:border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-xs text-gray-400">
                &copy; {{ date('Y') }} CourseEasy Academy. All rights reserved.
            </p>
            <div class="flex items-center gap-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                    Systems Operational
                </span>
            </div>
        </div>
    </div>
</footer>
