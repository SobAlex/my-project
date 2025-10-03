<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TestMediaController extends Controller
{
    protected MediaService $mediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    /**
     * Загрузить файл (без CSRF защиты для тестирования)
     */
    public function upload(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'file' => 'required|file|max:10240', // 10MB
                'alt_text' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:1000',
            ]);

            $media = $this->mediaService->uploadFile(
                $request->file('file'),
                $request->get('alt_text'),
                $request->get('description')
            );

            return response()->json([
                'success' => true,
                'data' => $media,
                'message' => 'Файл успешно загружен'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка валидации: ' . implode(', ', $e->errors()['file'] ?? ['Неизвестная ошибка валидации']),
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Test media upload error: ' . $e->getMessage(), [
                'file' => $request->file('file')?->getClientOriginalName(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ошибка при загрузке файла: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Получить статистику
     */
    public function stats(): JsonResponse
    {
        $stats = $this->mediaService->getStats();
        return response()->json($stats);
    }
}
