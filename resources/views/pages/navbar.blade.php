  <header id="header"
      class="bg-white dark:bg-gray-800 shadow-xl sticky top-0 z-50 transition-colors duration-300 rounded-b-xl">
      <nav class="container mx-auto px-6 py-4 flex justify-between items-center relative">
          <!-- Logo -->
          <a href="{{ route('home') }}"
              class="text-3xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-transparent bg-clip-text tracking-tight hover:opacity-90 transition-opacity duration-300">
              Course<span class="text-gray-900 dark:text-white">Easy</span>
          </a>

          <!-- Desktop Links -->
          <div class="hidden md:flex items-center space-x-6">
              <!-- Note: Laravel route placeholders replaced with # for static file compilation -->
              <a href="{{ route('home') }}"
                  class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-300 font-medium">Home</a>
              <a href="{{ route('courses') }}"
                  class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-300 font-medium">Courses</a>
              <a href="#about"
                  class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-300 font-medium">About</a>
              <a href="#contact"
                  class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-300 font-medium">Contact</a>

              <button id="openLoginModalBtn"
                  class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition-colors duration-300 font-semibold focus:outline-none">
                  Login
              </button>

              <button id="openSignupModalBtn"
                  class="bg-indigo-600 text-white px-5 py-2 rounded-xl font-bold hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-md shadow-indigo-500/30 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                  Sign Up
              </button>
          </div>

          <!-- Mobile Menu Toggle Button (Visible on screens smaller than md) -->
          <div class="md:hidden">
              <button id="mobile-menu-button"
                  class="text-gray-600 dark:text-gray-300 text-2xl hover:text-indigo-600 dark:hover:text-indigo-400 p-2 rounded-lg transition-colors duration-300 focus:outline-none">
                  <i data-lucide="menu" id="mobile-menu-icon" class="w-7 h-7"></i>
              </button>
          </div>
      </nav>

      <!-- Overlay + Modal -->
      <div id="loginModal"
          class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50 transition-opacity duration-300 ease-in-out backdrop-blur-sm">

          <div id="loginContent"
              class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl shadow-indigo-500/30 dark:shadow-indigo-800/30 w-11/12 max-w-md p-8 relative transform transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)] scale-90 opacity-0">

              <!-- Close Button -->
              <button id="closeLoginModal"
                  class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 dark:text-gray-500 dark:hover:text-gray-300 text-3xl font-light leading-none transition-colors duration-200 focus:outline-none">&times;</button>

              <!-- Modal Header -->
              <h2 class="text-3xl font-extrabold text-indigo-700 dark:text-indigo-400 text-center mb-2">Welcome Back
              </h2>
              <p class="text-center text-gray-500 dark:text-gray-400 mb-8">Securely access your personalized
                  dashboard.</p>

              <!-- Login Form -->
              <form action="#" method="POST" class="space-y-6">
                  <div>
                      <label for="login-email"
                          class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email</label>
                      <input type="email" id="login-email" name="email" required
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-5 py-3 text-gray-800 dark:text-white bg-white dark:bg-gray-700 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-500 outline-none transition duration-200"
                          placeholder="you@example.com">
                  </div>

                  <div>
                      <label for="login-password"
                          class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Password</label>
                      <input type="password" id="login-password" name="password" required
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-5 py-3 text-gray-800 dark:text-white bg-white dark:bg-gray-700 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-500 outline-none transition duration-200"
                          placeholder="••••••••">
                  </div>

                  <div class="flex justify-between items-center text-sm">
                      <label class="flex items-center text-gray-600 dark:text-gray-400 cursor-pointer">
                          <input type="checkbox"
                              class="mr-2 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 rounded focus:ring-indigo-500 dark:bg-gray-700">
                          Remember
                          me
                      </label>
                      <a href="#"
                          class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium transition duration-200">Forgot
                          password?</a>
                  </div>

                  <button type="submit"
                      class="w-full bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 transition duration-300 ease-in-out transform shadow-lg shadow-indigo-500/20">
                      Login
                  </button>
              </form>

              <!-- Footer -->
              <p class="text-sm text-gray-500 dark:text-gray-400 text-center mt-6">
                  Don’t have an account?
                  <a href="#" id="switchToSignup"
                      class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-bold transition duration-200">Sign
                      Up</a>
              </p>
          </div>
      </div>

      <!-- Overlay + Modal -->
      <div id="signupModal"
          class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50 transition-opacity duration-300 ease-in-out backdrop-blur-sm">

          <div id="signupContent"
              class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl shadow-indigo-500/30 dark:shadow-indigo-800/30 w-11/12 max-w-md p-8 relative transform transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)] scale-90 opacity-0">

              <!-- Close Button -->
              <button id="closeSignupModal"
                  class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 dark:text-gray-500 dark:hover:text-gray-300 text-3xl font-light leading-none transition-colors duration-200 focus:outline-none">&times;</button>

              <!-- Modal Header -->
              <h2 class="text-3xl font-extrabold text-indigo-700 dark:text-indigo-400 text-center mb-2">Create Your
                  Account</h2>
              <p class="text-center text-gray-500 dark:text-gray-400 mb-8">Get started with a new account in
                  seconds.</p>

              <!-- Sign Up Form -->
              <form action="#" method="POST" class="space-y-6">
                  <div>
                      <label for="signup-name"
                          class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Full
                          Name</label>
                      <input type="text" id="signup-name" name="name" required
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-5 py-3 text-gray-800 dark:text-white bg-white dark:bg-gray-700 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-500 outline-none transition duration-200"
                          placeholder="John Doe">
                  </div>

                  <div>
                      <label for="signup-email"
                          class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email</label>
                      <input type="email" id="signup-email" name="email" required
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-5 py-3 text-gray-800 dark:text-white bg-white dark:bg-gray-700 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-500 outline-none transition duration-200"
                          placeholder="you@example.com">
                  </div>

                  <div>
                      <label for="signup-password"
                          class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Password</label>
                      <input type="password" id="signup-password" name="password" required
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-xl px-5 py-3 text-gray-800 dark:text-white bg-white dark:bg-gray-700 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-500 outline-none transition duration-200"
                          placeholder="Minimum 8 characters">
                  </div>

                  <button type="submit"
                      class="w-full bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 transition duration-300 ease-in-out transform shadow-lg shadow-indigo-500/20">
                      Sign Up
                  </button>
              </form>

              <!-- Footer -->
              <p class="text-sm text-gray-500 dark:text-gray-400 text-center mt-6">
                  Already have an account?
                  <a href="#" id="switchToLogin"
                      class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-bold transition duration-200">Login</a>
              </p>
          </div>
      </div>
  </header>
  <!-- === MOBILE MENU OVERLAY === -->
  <div id="mobile-menu-overlay"
      class="fixed inset-0 bg-gray-900/95 z-40 hidden transition-opacity duration-300 opacity-0 md:hidden backdrop-blur-sm">
      <div class="w-full h-full bg-white dark:bg-gray-900 p-8 pt-24 space-y-6 flex flex-col">

          <!-- Mobile Links -->
          <!-- Note: Laravel route placeholders replaced with # for static file compilation -->
          <a href="{{ route('home') }}"
              class="mobile-link text-xl font-semibold text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 p-3 rounded-xl bg-gray-50 dark:bg-gray-800 transition-colors duration-200">Home</a>
          <a href="{{ route('courses') }}"
              class="mobile-link text-xl font-semibold text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 p-3 rounded-xl bg-gray-50 dark:bg-gray-800 transition-colors duration-200">Courses</a>
          <a href="#about"
              class="mobile-link text-xl font-semibold text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 p-3 rounded-xl bg-gray-50 dark:bg-gray-800 transition-colors duration-200">About</a>
          <a href="#contact"
              class="mobile-link text-xl font-semibold text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 p-3 rounded-xl bg-gray-50 dark:bg-gray-800 transition-colors duration-200">Contact</a>

          <div class="pt-8 border-t border-gray-100 dark:border-gray-700 flex flex-col space-y-4">
              <button id="mobile-login-btn"
                  class="w-full text-indigo-600 dark:text-indigo-400 border-2 border-indigo-600 dark:border-indigo-400 font-bold py-3 rounded-xl hover:bg-indigo-50 dark:hover:bg-gray-800 transition duration-300">Login</button>
              <button id="mobile-signup-btn"
                  class="w-full bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 transition duration-300 ease-in-out shadow-lg shadow-indigo-500/20">Sign
                  Up</button>
          </div>
      </div>
  </div>
  <script>
    lucide.createIcons();
      // ===== MODAL ELEMENTS =====

      document.addEventListener('DOMContentLoaded', () => {
          const modals = {
              login: {
                  modal: document.getElementById('loginModal'),
                  content: document.getElementById('loginContent'),
                  openBtns: document.querySelectorAll('#openLoginModalBtn, .open-login-modal'),
                  closeBtn: document.getElementById('closeLoginModal'),
              },
              signup: {
                  modal: document.getElementById('signupModal'),
                  content: document.getElementById('signupContent'),
                  openBtns: document.querySelectorAll('#openSignupModalBtn, .open-signup-modal'),
                  closeBtn: document.getElementById('closeSignupModal'),
              },
          };

          // ===== OPEN / CLOSE / SWITCH FUNCTIONS =====
          function openModal(modal, content) {
              modal.classList.remove('hidden');
              setTimeout(() => {
                  modal.classList.replace('opacity-0', 'opacity-100');
                  content.classList.replace('scale-90', 'scale-100');
                  content.classList.replace('opacity-0', 'opacity-100');
                  content.classList.replace('translate-y-4', 'translate-y-0');

              }, 10);
          }

          function closeModal(modal, content) {
              modal.classList.replace('opacity-100', 'opacity-0');
              content.classList.replace('scale-100', 'scale-90');
              content.classList.replace('opacity-100', 'opacity-0');
              content.classList.replace('translate-y-0', 'translate-y-4');

              setTimeout(() => modal.classList.add('hidden'), 300);
          }

          function switchModal(fromModal, fromContent, toModal, toContent) {
              closeModal(fromModal, fromContent);
              setTimeout(() => openModal(toModal, toContent), 300);
          }

          // ===== EVENT LISTENERS =====
          // Open Login
          modals.login.openBtns.forEach(btn => {
              if (btn) btn.addEventListener('click', (e) => {
                  e.preventDefault();
                  closeModal(modals.signup.modal, modals.signup.content);
                  openModal(modals.login.modal, modals.login.content);
              });
          });

          // Open Signup
          modals.signup.openBtns.forEach(btn => {
              if (btn) btn.addEventListener('click', (e) => {
                  e.preventDefault();
                  closeModal(modals.login.modal, modals.login.content);
                  openModal(modals.signup.modal, modals.signup.content);
              });
          });

          // Close Buttons
          Object.values(modals).forEach(({
              modal,
              content,
              closeBtn
          }) => {
              if (closeBtn) closeBtn.addEventListener('click', () => closeModal(modal, content));
              modal.addEventListener('click', (e) => {
                  if (e.target === modal) closeModal(modal, content);
              });
          });

          // Switch Links
          const switchToSignup = document.getElementById('switchToSignup');
          const switchToLogin = document.getElementById('switchToLogin');

          if (switchToSignup)
              switchToSignup.addEventListener('click', (e) => {
                  e.preventDefault();
                  switchModal(modals.login.modal, modals.login.content, modals.signup.modal, modals.signup
                      .content);
              });

          if (switchToLogin)
              switchToLogin.addEventListener('click', (e) => {
                  e.preventDefault();
                  switchModal(modals.signup.modal, modals.signup.content, modals.login.modal, modals.login
                      .content);
              });

          // ESC key close
          window.addEventListener('keydown', (e) => {
              if (e.key === 'Escape') {
                  Object.values(modals).forEach(({
                      modal,
                      content
                  }) => {
                      if (!modal.classList.contains('hidden')) closeModal(modal, content);
                  });
              }
          });

          // Mock form submission
          document.querySelectorAll('#loginModal form, #signupModal form').forEach(form => {
              form.addEventListener('submit', (e) => {
                  e.preventDefault();
                  console.log(`Form submitted: ${form.id || 'unnamed'}`);
                  Object.values(modals).forEach(({
                      modal,
                      content
                  }) => closeModal(modal, content));
              });
          });

          // --- Mobile Menu Logic ---
          const mobileMenuButton = document.getElementById('mobile-menu-button');
          const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
          const mobileMenuIcon = document.getElementById('mobile-menu-icon');
          const mobileLoginBtn = document.getElementById('mobile-login-btn');
          const mobileSignupBtn = document.getElementById('mobile-signup-btn');
          const mobileLinks = document.querySelectorAll('.mobile-link');

          function toggleMobileMenu() {
              const isHidden = mobileMenuOverlay.classList.contains('hidden');

              if (isHidden) {
                  // Open menu
                  mobileMenuOverlay.classList.remove('hidden');
                  setTimeout(() => {
                      mobileMenuOverlay.classList.remove('opacity-0');
                      mobileMenuOverlay.classList.add('opacity-100');
                  }, 10);
                  mobileMenuIcon.setAttribute('data-lucide', 'x');
                  lucide.createIcons();
              } else {
                  // Close menu
                  mobileMenuOverlay.classList.remove('opacity-100');
                  mobileMenuOverlay.classList.add('opacity-0');
                  setTimeout(() => {
                      mobileMenuOverlay.classList.add('hidden');
                  }, 300);
                  mobileMenuIcon.setAttribute('data-lucide', 'menu');
                  lucide.createIcons();
              }
          }

          if (mobileMenuButton) {
              mobileMenuButton.addEventListener('click', toggleMobileMenu);
          }

          // Close menu when a link is clicked
          mobileLinks.forEach(link => {
              link.addEventListener('click', toggleMobileMenu);
          });


      });
  </script>
