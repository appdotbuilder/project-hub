import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="ProjectFlow - Professional Project Management">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-gradient-to-br from-blue-50 to-indigo-100 p-6 text-gray-900 lg:justify-center lg:p-8 dark:from-gray-900 dark:to-indigo-950 dark:text-white">
                <header className="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-6xl">
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="inline-block rounded-lg bg-indigo-600 px-6 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition-colors"
                            >
                                Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="inline-block rounded-lg border border-indigo-300 px-5 py-2 text-sm font-medium text-indigo-700 hover:bg-indigo-50 transition-colors dark:border-indigo-400 dark:text-indigo-300 dark:hover:bg-indigo-900"
                                >
                                    Log in
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="inline-block rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition-colors"
                                >
                                    Get Started
                                </Link>
                            </>
                        )}
                    </nav>
                </header>

                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
                    <main className="flex w-full max-w-6xl flex-col lg:flex-row lg:items-center lg:gap-12">
                        {/* Hero Content */}
                        <div className="flex-1 text-center lg:text-left">
                            <div className="mb-6">
                                <h1 className="mb-4 text-4xl font-bold text-gray-900 lg:text-6xl dark:text-white">
                                    🚀 <span className="text-indigo-600 dark:text-indigo-400">ProjectFlow</span>
                                </h1>
                                <p className="text-xl text-gray-600 lg:text-2xl dark:text-gray-300">
                                    Professional Project Management Platform
                                </p>
                            </div>

                            <div className="mb-8">
                                <p className="mb-6 text-lg text-gray-700 dark:text-gray-300">
                                    Streamline your project workflows with subscription-based man-hour management, 
                                    task tracking, and comprehensive project lifecycle oversight.
                                </p>
                                
                                {/* Feature Highlights */}
                                <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
                                    <div className="flex items-center gap-3 text-left">
                                        <div className="rounded-full bg-green-100 p-2 dark:bg-green-900">
                                            <span className="text-xl">📊</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Project Tracking</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Real-time status monitoring</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-center gap-3 text-left">
                                        <div className="rounded-full bg-blue-100 p-2 dark:bg-blue-900">
                                            <span className="text-xl">⏱️</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Time Management</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Hour allocation & tracking</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-center gap-3 text-left">
                                        <div className="rounded-full bg-purple-100 p-2 dark:bg-purple-900">
                                            <span className="text-xl">👥</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Team Collaboration</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Multi-role management</p>
                                        </div>
                                    </div>
                                    
                                    <div className="flex items-center gap-3 text-left">
                                        <div className="rounded-full bg-orange-100 p-2 dark:bg-orange-900">
                                            <span className="text-xl">💳</span>
                                        </div>
                                        <div>
                                            <h3 className="font-semibold text-gray-900 dark:text-white">Subscription Billing</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Flexible pricing models</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {/* Call to Action */}
                            {!auth.user && (
                                <div className="flex flex-col gap-4 sm:flex-row sm:justify-center lg:justify-start">
                                    <Link
                                        href={route('register')}
                                        className="inline-block rounded-lg bg-indigo-600 px-8 py-3 text-lg font-semibold text-white hover:bg-indigo-700 transition-colors shadow-lg hover:shadow-xl"
                                    >
                                        Start Your Free Trial 🎯
                                    </Link>
                                    <Link
                                        href={route('login')}
                                        className="inline-block rounded-lg border border-indigo-300 px-8 py-3 text-lg font-semibold text-indigo-700 hover:bg-indigo-50 transition-colors dark:border-indigo-400 dark:text-indigo-300 dark:hover:bg-indigo-900"
                                    >
                                        Sign In
                                    </Link>
                                </div>
                            )}
                        </div>

                        {/* Hero Visual */}
                        <div className="flex-1 mt-12 lg:mt-0">
                            <div className="rounded-2xl bg-white p-8 shadow-2xl dark:bg-gray-800">
                                <h3 className="mb-6 text-2xl font-bold text-gray-900 text-center dark:text-white">
                                    🎯 Key Features
                                </h3>
                                
                                <div className="space-y-6">
                                    <div className="border-l-4 border-indigo-500 bg-indigo-50 p-4 dark:bg-indigo-900/20">
                                        <h4 className="font-semibold text-indigo-900 dark:text-indigo-300">Client Management</h4>
                                        <p className="text-indigo-700 dark:text-indigo-400">Subscription-based hour packages and project initiation</p>
                                    </div>
                                    
                                    <div className="border-l-4 border-green-500 bg-green-50 p-4 dark:bg-green-900/20">
                                        <h4 className="font-semibold text-green-900 dark:text-green-300">Project Lifecycle</h4>
                                        <p className="text-green-700 dark:text-green-400">From initiation to completion with milestone tracking</p>
                                    </div>
                                    
                                    <div className="border-l-4 border-purple-500 bg-purple-50 p-4 dark:bg-purple-900/20">
                                        <h4 className="font-semibold text-purple-900 dark:text-purple-300">Role-Based Access</h4>
                                        <p className="text-purple-700 dark:text-purple-400">Clients, Account Managers, Project Managers, Finance & Talent</p>
                                    </div>
                                    
                                    <div className="border-l-4 border-orange-500 bg-orange-50 p-4 dark:bg-orange-900/20">
                                        <h4 className="font-semibold text-orange-900 dark:text-orange-300">Financial Tracking</h4>
                                        <p className="text-orange-700 dark:text-orange-400">Transaction management and billing automation</p>
                                    </div>
                                </div>
                                
                                {auth.user && (
                                    <div className="mt-8 text-center">
                                        <Link
                                            href={route('dashboard')}
                                            className="inline-block rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-3 text-lg font-semibold text-white hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl"
                                        >
                                            Go to Dashboard 📈
                                        </Link>
                                    </div>
                                )}
                            </div>
                        </div>
                    </main>
                </div>

                <footer className="mt-12 text-center text-sm text-gray-600 dark:text-gray-400">
                    <p>
                        Built with ❤️ by{" "}
                        <a 
                            href="https://app.build" 
                            target="_blank" 
                            className="font-medium text-indigo-600 hover:underline dark:text-indigo-400"
                        >
                            app.build
                        </a>
                        {" "}• Empowering teams to deliver exceptional projects
                    </p>
                </footer>
                <div className="hidden h-14.5 lg:block"></div>
            </div>
        </>
    );
}