<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>OOPLink - Professional Login</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#1d283a",
                        "background-light": "#f6f7f7",
                        "background-dark": "#16181c",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .tech-pattern {
            background-color: #f6f7f7;
            background-image: radial-gradient(#1d283a 0.5px, transparent 0.5px);
            background-size: 24px 24px;
            background-opacity: 0.05;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-primary">
    <!-- Main Container with Tech-inspired Background -->
    <div class="relative min-h-screen flex flex-col items-center justify-center p-4 tech-pattern overflow-hidden">
        <!-- Decorative subtle gradient blob -->
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
        <!-- Login Card Container -->
        <div class="w-full max-w-[440px] z-10">
            <!-- Logo Section -->
            <div class="flex flex-col items-center mb-8">
                <div class="flex items-center gap-3 text-primary mb-2">
                    <div class="size-10 flex items-center justify-center bg-primary text-white rounded-lg shadow-lg">
                        <svg class="size-6" fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M24 0.757355L47.2426 24L24 47.2426L0.757355 24L24 0.757355ZM21 35.7574V12.2426L9.24264 24L21 35.7574Z" fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold tracking-tight">OOPLink</h1>
                </div>
                <p class="text-primary/60 text-sm font-medium">The Object-Oriented Project Hub</p>
            </div>
            <!-- Card -->
            <div class="bg-white dark:bg-zinc-900 border border-primary/10 rounded-xl shadow-2xl p-8 md:p-10">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-primary dark:text-white">Welcome back</h2>
                    <p class="text-primary/60 dark:text-zinc-400 text-sm mt-1">Please enter your details to sign in.</p>
                </div>
                <form class="space-y-5">
                    <!-- Email Address -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-primary/80 dark:text-zinc-300" for="email">Email Address</label>
                        <div class="relative">
                            <input class="w-full px-4 py-3 bg-background-light dark:bg-zinc-800 border border-primary/10 dark:border-zinc-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-primary dark:text-white placeholder:text-primary/30" id="email" name="email" placeholder="name@company.com" required="" type="email" />
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-primary/80 dark:text-zinc-300" for="password">Password</label>
                        <div class="relative flex items-center">
                            <input class="w-full px-4 py-3 bg-background-light dark:bg-zinc-800 border border-primary/10 dark:border-zinc-700 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-primary dark:text-white placeholder:text-primary/30" id="password" name="password" placeholder="••••••••" required="" type="password" />
                            <button class="absolute right-3 text-primary/40 hover:text-primary dark:text-zinc-500 transition-colors" type="button">
                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                            </button>
                        </div>
                    </div>
                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between py-1">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input class="size-4 rounded border-primary/20 text-primary focus:ring-primary/20 cursor-pointer" type="checkbox" />
                            <span class="text-sm text-primary/70 dark:text-zinc-400 group-hover:text-primary transition-colors">Remember me</span>
                        </label>
                        <a class="text-sm font-semibold text-primary hover:underline decoration-2 underline-offset-4" href="#">Forgot password?</a>
                    </div>
                    <!-- Sign In Button -->
                    <button class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3.5 rounded-lg shadow-md transition-all transform active:scale-[0.98] mt-4" type="submit">
                        Sign In
                    </button>
                </form>
                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <span class="w-full border-t border-primary/10 dark:border-zinc-700"></span>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-white dark:bg-zinc-900 px-2 text-primary/40 dark:text-zinc-500">Or continue with</span>
                    </div>
                </div>
                <!-- Alternative Social Login -->
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-2 py-2.5 border border-primary/10 dark:border-zinc-700 rounded-lg hover:bg-background-light dark:hover:bg-zinc-800 transition-colors">
                        <img alt="Google" class="size-4" data-alt="Google company logo icon" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCU6D3AMtevUF81arBJoHvF_Cg_sKTL7ufX1PloATUVvz4cQhz5S9kAAiaWNPPeTaBgISfT0u8rlK_1hKpl0pxVWoKVBPWQP4DtNQ7mvPAGWXnn7CJshng8j-Mly1mjGOlGa-z3V-MuUvv5Rya6p6zfHGAC-VtDJKXRucjlNAIK8tO-t-uXnVzoIS6mqLhoJ_ze0bFkM4PWvPywbxC8C840y0EYw80OiAV2Bkx-xAwR6H1lLYUOt2JUW3yHwRrtX3bpzi7yY0jeLYI" />
                        <span class="text-sm font-medium text-primary/80 dark:text-zinc-300">Google</span>
                    </button>
                    <button class="flex items-center justify-center gap-2 py-2.5 border border-primary/10 dark:border-zinc-700 rounded-lg hover:bg-background-light dark:hover:bg-zinc-800 transition-colors">
                        <img alt="GitHub" class="size-4" data-alt="GitHub company logo icon" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBXzST7Aa4u_ErVt3cignC9Ek77_qxxkzvQMYmKpZuWRJ3x9j_yjspg10Z7Pb3rfZO-4RmexqTNsssKL5B6bDng72YzAy6nh86o9KbLhzcan-OgkH1dJSFJ9tpI5yj1e-P23jUuBIMNh341XupNppMVBp6B6gKVDHeF7h8QSy0eAdDXN_UZeRR08f41zMmA1R5DJu1VVrUUh9oZYAKN9SJ2LxWyEFHlE3WhH2OsSPLdAt7lW_RKcOz61NHGbpJNAYOYRXFDntOK9T4" />
                        <span class="text-sm font-medium text-primary/80 dark:text-zinc-300">GitHub</span>
                    </button>
                </div>
            </div>
            <!-- Footer Link -->
            <p class="text-center mt-8 text-primary/60 dark:text-zinc-400 text-sm">
                Don't have an account?
                <a class="font-bold text-primary hover:underline decoration-2 underline-offset-4" href="#">Sign up for a new account</a>
            </p>
            <!-- Legal Links -->
            <div class="flex justify-center gap-6 mt-12 text-xs text-primary/40 dark:text-zinc-600">
                <a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
                <a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
                <a class="hover:text-primary transition-colors" href="#">Contact Support</a>
            </div>
        </div>
    </div>



    <div class="testing">
        
    </div>
</body>

</html>