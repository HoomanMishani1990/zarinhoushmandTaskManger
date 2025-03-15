<?php
namespace App\Services;

use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks()
    {
        return $this->taskRepository->all();
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

    public function updateTask(array $data, $id)
    {
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
}