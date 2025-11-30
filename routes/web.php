<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\TokenVerificationMiddleware;

// Route::get('/', function () {
//     return view('home');
// });
//Backend

//user Route
Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userlogin']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/send-otp', [UserController::class, 'sendOTP']);
Route::post('/verify-otp', [UserController::class, 'verifyOTP']);
Route::post('/reset-password', [UserController::class, 'resetPassword'])->middleware(TokenVerificationMiddleware::class);


//token=eyJpdiI6InlTS2Vvb1NrcjU0TUtBdU9QSmJURWc9PSIsInZhbHVlIjoibU1wUGR4dU1jblFqQnlkQ0dpSmgxcjdNS0NFYWZLcnFjRURzamhNZE9GeHFTYStNYlA0WURzdFpZcGJ4bXRSRVc3SUdXWVdsclVsR0M4NzlGRmxkRmRxOS9vRFY2bDEzK2tlWk5IWDM3V1RMc1JIRE9qeEkvc29TTUhXVXF4UHV6M2VQTTErS1ZxOTcxVGlNUVRSQXBYV3NEMjNZMzdsVUlRMjZ3dUM2Z1hGVjNOSkZkQjduZmNXMWcrSERQaHRPYWlSbGxWd243eVBJMTFaam5odER3UEFaN0FlVzBYbGhPN0hCSk51RjM1aGxPRmVGdlJuZHUxYkV3Z0tUMHRYUUlKY0tKOHlmUXFkZEgyVStCaFJjMkprcXk4Q1VyUy9lelkwSzh3OE5May9UVGRvaTZhNkcrN2pWL3ExRXRzZGUiLCJtYWMiOiI1MDI0OGRkZWUxNDQ5MTkwOWE5YzhkNTI5YWM3ZDY0ODVkMmRkN2Q0YTA2OWQxZTFmYTRkOWM3NzM4ZDAwYmNmIiwidGFnIjoiIn0%3D; Path=/; HttpOnly; Expires=Mon, 11 Dec 5380 19:18:07 GMT;

//token=eyJpdiI6IlhkZlFDMFY3QlJ3Q2o1LzBrdHVZY1E9PSIsInZhbHVlIjoianFqNHM3TmhFVitJbDVRa2NhOXRQNFRZL1RjeGVzT25lN0R4MVN2MkYzNGtTT2NwWmxlWUZtV3BLRjRiSzB0MTlkUXhTL3dQV1JPMkxXdlNvRGZUVUZnOVFDVnBzQWJSWGNkTmtaZnpJOUsxMmtYd3V2MWRFQnFnL0U0ZExMaFZxVkQ5TkdzSUdaMDRJOTJhTGorcVJkbGlTcDJMU0ZXYVlWWEhBSkNnaytxY3RoYWtrOXlCa3NDUXVTQ0RWNFIrRkFLN2V4di9wUStmRXB5OUFYaWNpcEN3MGVpRWsxeGozN0NHa1VhRjNDdjhZUXhLQW1zajQ3RHRrdG5hWnAza2Q5SHZsbW90K08veGhvdkNxZDB1cFY0KzhCRHhWbmQva1VET0wvNWFmSmNRY3FMcWZXc2RNMGNsVVluc3pCVUciLCJtYWMiOiIyNTcwMjJjODY2YzFmNDY2MWMzMTJkNDAzZmUwYTFmZjExOGNkNjM4ZjRjOWUzY2ZiNTkwYzgwY2ZiYzFlYzlhIiwidGFnIjoiIn0%3D; Path=/; HttpOnly; Expires=Tue, 12 Dec 5380 01:51:33 GMT;



// Route::get('/', [HomeController::class, 'homePage']);
// Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboardPage');
// Route::get('/categoryPage', [CategoryController::class, 'categoryPage'])->name('categoryPage');
// Route::get('/userRegistration', [UserController::class, 'userRegistrationPage']);
// Route::get('/userLogin', [UserController::class, 'userloginPage']);
// Route::get('/restPassword', [UserController::class, 'restPasswordPage']);
// Route::get('/sendOtp', [UserController::class, 'sendOtpPage']);
// Route::get('/verifyOtp', [UserController::class, 'verifyOtpPage']);
// Route::get('/verifyOtp', [UserController::class, 'verifyOtpPage']);
// Route::get('/userProfile', [UserController::class, 'profilePage']);
