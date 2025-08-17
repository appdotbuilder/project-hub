import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';

interface Project {
    id: number;
    title: string;
    status: string;
    priority: string;
    client: {
        name: string;
    };
    project_manager: {
        name: string;
    } | null;
    expected_deadline: string;
    allocated_hours: number;
    used_hours: number;
}

interface Props {
    stats: {
        total_projects: number;
        active_projects: number;
        total_clients: number;
        subscription_types: number;
    };
    recent_projects: Project[];
    [key: string]: unknown;
}

export default function ProjectManagement({ stats, recent_projects }: Props) {
    const getStatusColor = (status: string) => {
        switch (status) {
            case 'pending': return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400';
            case 'in_progress': return 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400';
            case 'on_hold': return 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-400';
            case 'completed': return 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400';
            case 'cancelled': return 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400';
            default: return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
        }
    };

    const getPriorityColor = (priority: string) => {
        switch (priority) {
            case 'low': return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
            case 'medium': return 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400';
            case 'high': return 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-400';
            case 'urgent': return 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400';
            default: return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
        }
    };

    return (
        <AppShell>
            <Head title="🚀 ProjectFlow Dashboard" />
            
            <div className="p-6 space-y-6">
                {/* Header */}
                <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                            🚀 Project Management Dashboard
                        </h1>
                        <p className="mt-1 text-gray-600 dark:text-gray-400">
                            Manage projects, subscriptions, and team collaboration
                        </p>
                    </div>
                    <div className="mt-4 flex gap-3 sm:mt-0">
                        <Link
                            href="/projects/create"
                            className="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 transition-colors"
                        >
                            ➕ New Project
                        </Link>
                        <Link
                            href="/projects"
                            className="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700"
                        >
                            📋 All Projects
                        </Link>
                    </div>
                </div>

                {/* Stats Grid */}
                <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div className="rounded-lg bg-white p-6 shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center">
                            <div className="flex-shrink-0 text-3xl">📊</div>
                            <div className="ml-4">
                                <p className="text-2xl font-bold text-gray-900 dark:text-white">{stats.total_projects}</p>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Total Projects</p>
                            </div>
                        </div>
                    </div>

                    <div className="rounded-lg bg-white p-6 shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center">
                            <div className="flex-shrink-0 text-3xl">🔥</div>
                            <div className="ml-4">
                                <p className="text-2xl font-bold text-indigo-600 dark:text-indigo-400">{stats.active_projects}</p>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Active Projects</p>
                            </div>
                        </div>
                    </div>

                    <div className="rounded-lg bg-white p-6 shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center">
                            <div className="flex-shrink-0 text-3xl">👥</div>
                            <div className="ml-4">
                                <p className="text-2xl font-bold text-green-600 dark:text-green-400">{stats.total_clients}</p>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Active Clients</p>
                            </div>
                        </div>
                    </div>

                    <div className="rounded-lg bg-white p-6 shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                        <div className="flex items-center">
                            <div className="flex-shrink-0 text-3xl">💳</div>
                            <div className="ml-4">
                                <p className="text-2xl font-bold text-purple-600 dark:text-purple-400">{stats.subscription_types}</p>
                                <p className="text-sm text-gray-600 dark:text-gray-400">Subscription Plans</p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="rounded-lg bg-white p-6 shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                    <h2 className="mb-4 text-xl font-bold text-gray-900 dark:text-white">⚡ Quick Actions</h2>
                    <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        <Link
                            href="/projects/create"
                            className="flex items-center rounded-lg border border-indigo-300 bg-indigo-50 p-4 text-indigo-700 hover:bg-indigo-100 transition-colors dark:border-indigo-600 dark:bg-indigo-900/20 dark:text-indigo-300 dark:hover:bg-indigo-900/30"
                        >
                            <span className="text-2xl mr-3">🎯</span>
                            <div>
                                <p className="font-semibold">Create Project</p>
                                <p className="text-sm">Start a new project</p>
                            </div>
                        </Link>

                        <Link
                            href="/subscriptions/create"
                            className="flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-green-700 hover:bg-green-100 transition-colors dark:border-green-600 dark:bg-green-900/20 dark:text-green-300 dark:hover:bg-green-900/30"
                        >
                            <span className="text-2xl mr-3">📦</span>
                            <div>
                                <p className="font-semibold">New Subscription</p>
                                <p className="text-sm">Setup client billing</p>
                            </div>
                        </Link>

                        <Link
                            href="/tasks"
                            className="flex items-center rounded-lg border border-purple-300 bg-purple-50 p-4 text-purple-700 hover:bg-purple-100 transition-colors dark:border-purple-600 dark:bg-purple-900/20 dark:text-purple-300 dark:hover:bg-purple-900/30"
                        >
                            <span className="text-2xl mr-3">✅</span>
                            <div>
                                <p className="font-semibold">Manage Tasks</p>
                                <p className="text-sm">Assign & track work</p>
                            </div>
                        </Link>

                        <Link
                            href="/time-logs"
                            className="flex items-center rounded-lg border border-orange-300 bg-orange-50 p-4 text-orange-700 hover:bg-orange-100 transition-colors dark:border-orange-600 dark:bg-orange-900/20 dark:text-orange-300 dark:hover:bg-orange-900/30"
                        >
                            <span className="text-2xl mr-3">⏱️</span>
                            <div>
                                <p className="font-semibold">Time Tracking</p>
                                <p className="text-sm">Log work hours</p>
                            </div>
                        </Link>
                    </div>
                </div>

                {/* Recent Projects */}
                <div className="rounded-lg bg-white shadow-sm border dark:bg-gray-800 dark:border-gray-700">
                    <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                        <div className="flex items-center justify-between">
                            <h2 className="text-xl font-bold text-gray-900 dark:text-white">📈 Recent Projects</h2>
                            <Link
                                href="/projects"
                                className="text-indigo-600 hover:text-indigo-700 font-medium dark:text-indigo-400 dark:hover:text-indigo-300"
                            >
                                View All →
                            </Link>
                        </div>
                    </div>
                    <div className="p-6">
                        {recent_projects.length > 0 ? (
                            <div className="space-y-4">
                                {recent_projects.map((project) => (
                                    <div key={project.id} className="border rounded-lg p-4 hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-700/50 transition-colors">
                                        <div className="flex items-start justify-between">
                                            <div className="flex-1">
                                                <div className="flex items-center gap-3 mb-2">
                                                    <Link
                                                        href={`/projects/${project.id}`}
                                                        className="text-lg font-semibold text-gray-900 hover:text-indigo-600 dark:text-white dark:hover:text-indigo-400"
                                                    >
                                                        {project.title}
                                                    </Link>
                                                    <span className={`inline-flex items-center rounded-full px-2 py-1 text-xs font-medium ${getStatusColor(project.status)}`}>
                                                        {project.status.replace('_', ' ')}
                                                    </span>
                                                    <span className={`inline-flex items-center rounded-full px-2 py-1 text-xs font-medium ${getPriorityColor(project.priority)}`}>
                                                        {project.priority}
                                                    </span>
                                                </div>
                                                <div className="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400">
                                                    <span>👤 {project.client.name}</span>
                                                    {project.project_manager && (
                                                        <span>🎯 PM: {project.project_manager.name}</span>
                                                    )}
                                                    <span>📅 Due: {new Date(project.expected_deadline).toLocaleDateString()}</span>
                                                    <span>⏱️ {project.used_hours}/{project.allocated_hours} hrs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <div className="text-center py-12">
                                <div className="text-6xl mb-4">📋</div>
                                <h3 className="text-lg font-semibold text-gray-900 dark:text-white">No projects yet</h3>
                                <p className="text-gray-600 dark:text-gray-400">Create your first project to get started</p>
                                <Link
                                    href="/projects/create"
                                    className="mt-4 inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700"
                                >
                                    Create Project
                                </Link>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </AppShell>
    );
}