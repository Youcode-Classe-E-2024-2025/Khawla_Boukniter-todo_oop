<?php
// include_once __DIR__ . "/../config/session.php";
include_once __DIR__ . "/../controllers/signupcontr.php";
// include_once __DIR__ . "../config/connexion.php";
// include "controllers/login.php";
// include "controllers/signup.php";

// Récupérer l'erreur de session
$signupError = $_SESSION['signup_error'] ?? '';
// Effacer l'erreur de session après l'avoir récupérée
unset($_SESSION['signup_error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translatey(0px);
            }

            50% {
                transform: translatey(-20px);
            }

            100% {
                transform: translatey(0px);
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div id="particles-js" class="absolute inset-0"></div>
    <div class="glass w-full max-w-4xl flex rounded-xl overflow-hidden">
        <div class="w-1/2 bg-white p-12 flex flex-col justify-center">
            <h2 class="text-4xl font-bold mb-6 text-gray-800">Create Your Account</h2>
            
            <?php if (!empty($signupError)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur : </strong>
                    <span class="block sm:inline"><?= htmlspecialchars($signupError) ?></span>
                </div>
            <?php endif; ?>
            
            <p class="text-gray-600 mb-8">Elevate your productivity to new heights.</p>
            <form method="post" action="index.php?action=signupcontr">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            
            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div class="form-group">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div class="form-group">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div class="form-group">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div class="form-group">
                <label for="role" class="block text-sm font-medium text-gray-700">Rôle</label>
                <select name="role" id="role" required class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <?php foreach (Role::getAllRoles() as $roleValue => $roleLabel): ?>
                        <option value="<?= $roleValue ?>" <?= $roleValue == Role::USER ? 'selected' : '' ?>>
                            <?= htmlspecialchars($roleLabel) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign Up
                </button>
            </div>
        </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Already have an account?
                <a href="index.php?page=login" id="switchToSignup" class="font-medium text-indigo-600 hover:text-indigo-500">log in</a>
            </p>
        </div>
        <div class="w-1/2 p-12 flex flex-col justify-center items-center text-white">
            <div class="animate-float">
                <svg class="w-48 h-48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.5 5.5L5 7L7.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3.5 11.5L5 13L7.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3.5 17.5L5 19L7.5 16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11 6H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11 12H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11 18H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            testing
            <h3 class="text-2xl font-bold mt-8 mb-4">Organize. Prioritize. Succeed.</h3>
            <p class="text-center">Experience task management like never before with our cutting-edge platform.</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="../assets/script.js"></script>
</body>

</html>