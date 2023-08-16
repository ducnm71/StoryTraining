<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogErrors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            return $next($request);
        } catch (\Exception $e) {
            // Ghi log lỗi vào tệp log
            Log::error($e->getMessage(), ['exception' => $e]);
            // Nếu bạn muốn xử lý lỗi một cách cụ thể khác, hãy thay thế dòng trên bằng mã tương ứng.

            // Nếu bạn muốn tiếp tục ném lỗi để xử lý ở các lớp middleware khác hoặc xử lý ở nơi khác, bạn có thể thêm dòng sau:
            throw $e;

            // Hoặc nếu bạn muốn trả về một phản hồi cụ thể cho người dùng:
            return response()->json(['error' => 'Có lỗi xảy ra'], 500);
        }
    }
}
