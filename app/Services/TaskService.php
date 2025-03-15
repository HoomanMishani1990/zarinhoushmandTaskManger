<?php
namespace App\Services;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class TaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getProjectsForTaskCreation()
    {
        return $this->taskRepository->getProjectsForTaskCreation();
    }

    public function getAvailableUsers()
    {
        return $this->taskRepository->getAvailableUsers();
    }

    public function getTaskPriorities()
    {
        return [
            'low' => __('tasks.priority_low'),
            'medium' => __('tasks.priority_medium'),
            'high' => __('tasks.priority_high')
        ];
    }


    public function createTask(array $data)
    {
        // Handle file uploads if present
        if (isset($data['attachments'])) {
            $data['attachments'] = $this->handleAttachments($data['attachments']);
        }

        return $this->taskRepository->create($data);
    }

    public function updateTask(int $id, array $data)
    {
        $task = $this->taskRepository->find($id);

        // Handle file removals if any
        if (!empty($data['remove_attachments'])) {
            $this->removeAttachments($task, $data['remove_attachments']);
            unset($data['remove_attachments']);
        }

        // Handle new file uploads if any
        if (isset($data['attachments'])) {
            $newAttachments = $this->handleAttachments($data['attachments']);
            $data['attachments'] = array_merge($task->attachments ?? [], $newAttachments);
        }

        return $this->taskRepository->update($data, $id);
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->delete($id);
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->find($id);
    }

    public function getTasksByProject($projectId)
    {
        return $this->taskRepository->getTasksByProject($projectId);
    }

    public function findTask(int $id)
    {
        return $this->taskRepository->find($id);
    }

    private function handleAttachments(array $files)
    {
        $attachments = [];
        foreach ($files as $file) {
            $path = $file->store('task-attachments', 'public');
            $attachments[] = [
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'size' => $file->getSize(),
                'type' => $file->getMimeType()
            ];
        }
        return $attachments;
    }

    private function removeAttachments($task, array $pathsToRemove)
    {
        // Remove files from storage
        foreach ($pathsToRemove as $path) {
            Storage::disk('public')->delete($path);
        }

        // Update task attachments array
        $remainingAttachments = array_filter($task->attachments ?? [], function($attachment) use ($pathsToRemove) {
            return !in_array($attachment['path'], $pathsToRemove);
        });

        $task->attachments = array_values($remainingAttachments);
        $task->save();
    }
}