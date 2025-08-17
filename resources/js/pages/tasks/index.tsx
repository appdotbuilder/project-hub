import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';

export default function TasksIndex() {
    return (
        <AppShell>
            <Head title="✅ Task Management" />
            
            <div className="p-6">
                <div className="flex items-center justify-between mb-6">
                    <div>
                        <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                            ✅ Task Management
                        </h1>
                        <p className="text-gray-600 dark:text-gray-400">
                            Assign and track project tasks
                        </p>
                    </div>
                    <Link
                        href="/tasks/create"
                        className="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 transition-colors"
                    >
                        ➕ Create Task
                    </Link>
                </div>

                <div className="rounded-lg bg-white shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                    <div className="text-center py-12">
                        <div className="text-6xl mb-4">✅</div>
                        <h3 className="text-lg font-semibold text-gray-900 dark:text-white">Task Management Coming Soon</h3>
                        <p className="text-gray-600 dark:text-gray-400 mb-4">
                            This feature will allow you to create, assign, and track project tasks with time logging capabilities.
                        </p>
                        <div className="space-y-2 text-sm text-gray-500 dark:text-gray-400">
                            <p>🎯 Create and assign tasks to team members</p>
                            <p>⏱️ Track time spent on each task</p>
                            <p>📊 Monitor task progress and completion</p>
                            <p>🔄 Set task priorities and due dates</p>
                        </div>
                        <Link
                            href="/dashboard"
                            className="mt-6 inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
                        >
                            ← Back to Dashboard
                        </Link>
                    </div>
                </div>
            </div>
        </AppShell>
    );
}