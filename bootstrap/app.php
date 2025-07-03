<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Log tất cả exceptions khi ở môi trường development
        $exceptions->reportable(function (\Throwable $e) {
            if (config('app.debug')) {
                Log::error('Exception occurred: ' . $e->getMessage(), [
                    'exception' => get_class($e),
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTraceAsString(),
                    'url' => request()->fullUrl(),
                    'method' => request()->method(),
                    'ip' => request()->ip(),
                    'user_agent' => request()->header('User-Agent'),
                    'user_id' => auth('api')->check() ? auth('api')->id() : null,
                ]);
            }
        });

        // Xử lý lỗi 401 - Authentication
        $exceptions->render(function (AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                Log::warning('API Authentication failed', [
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'ip' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Token không hợp lệ hoặc đã hết hạn',
                    'data' => null
                ], 401);
            }
        });

        // Xử lý lỗi 404 - Not Found
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                Log::info('API endpoint not found', [
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Endpoint không tồn tại',
                    'data' => null
                ], 404);
            }
        });

        // Xử lý lỗi 405 - Method Not Allowed
        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            if ($request->is('api/*')) {
                Log::warning('API method not allowed', [
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'allowed_methods' => $e->getHeaders()['Allow'] ?? 'Unknown',
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Phương thức HTTP không được hỗ trợ',
                    'data' => null
                ], 405);
            }
        });

        // Xử lý lỗi Model Not Found
        $exceptions->render(function (ModelNotFoundException $e, $request) {
            if ($request->is('api/*')) {
                Log::warning('API model not found', [
                    'model' => $e->getModel(),
                    'ids' => $e->getIds(),
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy dữ liệu',
                    'data' => null
                ], 404);
            }
        });

        // Xử lý lỗi 500 - Internal Server Error cho API
        $exceptions->render(function (\Throwable $e, $request) {
            if ($request->is('api/*') && !$e instanceof AuthenticationException
                && !$e instanceof NotFoundHttpException
                && !$e instanceof MethodNotAllowedHttpException
                && !$e instanceof ModelNotFoundException) {

                Log::error('API Internal Server Error', [
                    'exception' => get_class($e),
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'ip' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                    'user_id' => auth('api')->check() ? auth('api')->id() : null,
                    'request_data' => $request->all(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => config('app.debug')
                        ? $e->getMessage()
                        : 'Đã xảy ra lỗi hệ thống. Vui lòng thử lại sau.',
                    'data' => null,
                    'debug_info' => config('app.debug') ? [
                        'exception' => get_class($e),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                    ] : null
                ], 500);
            }
        });
    })->create();
