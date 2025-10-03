<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    protected MediaService $mediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    /**
     * Получить все медиа файлы
     */
    public function index(Request $request): JsonResponse
    {
        $query = Media::query();

        // Фильтр по типу файла
        if ($request->has('type')) {
            $type = $request->get('type');
            if ($type === 'image') {
                $query->where('mime_type', 'like', 'image/%');
            } elseif ($type === 'pdf') {
                $query->where('mime_type', 'application/pdf');
            } elseif ($type === 'text') {
                $query->where('mime_type', 'like', 'text/%');
            }
        }

        // Поиск
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('original_name', 'like', "%{$search}%")
                  ->orWhere('alt_text', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $media = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json($media);
    }

    /**
     * Загрузить файл
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
            Log::error('Media upload error: ' . $e->getMessage(), [
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
     * Получить информацию о файле
     */
    public function show(Media $media): JsonResponse
    {
        return response()->json($media);
    }

    /**
     * Обновить информацию о файле
     */
    public function update(Request $request, Media $media): JsonResponse
    {
        $request->validate([
            'alt_text' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $media->update($request->only(['alt_text', 'description']));

        return response()->json([
            'success' => true,
            'data' => $media,
            'message' => 'Информация о файле обновлена'
        ]);
    }

    /**
     * Удалить файл
     */
    public function destroy(Media $media): JsonResponse
    {
        try {
            $this->mediaService->deleteFile($media);

            return response()->json([
                'success' => true,
                'message' => 'Файл успешно удален'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при удалении файла: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Получить статистику медиа библиотеки
     */
    public function stats(): JsonResponse
    {
        $stats = $this->mediaService->getStats();

        return response()->json($stats);
    }
}
