<button id="theme-toggle" type="button"
  class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
  x-data="{ theme: localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : 'light' }" x-init="document.documentElement.classList[theme == 'dark' ? 'add' : 'remove']('dark')">
  <x-icons.theme-toggle-dark id="theme-toggle-dark-icon" class="w-5 h-5" ::class="theme != 'dark' && 'hidden'"
    @click="
    theme = 'light';
    localStorage.setItem('color-theme', 'light');
    document.documentElement.classList.remove('dark');
  " />
  <x-icons.theme-toggle-light id="theme-toggle-light-icon" class="w-5 h-5" ::class="theme != 'light' && 'hidden'"
    @click="
    theme = 'dark';
    localStorage.setItem('color-theme', 'dark');
    document.documentElement.classList.add('dark');
  " />
</button>
