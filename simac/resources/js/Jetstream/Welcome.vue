<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="text-2xl">
                Hello, <span class="text-red-700">{{ username }}</span>!
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 border-b border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <img src="images/icons/report.svg" class="h-8">
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Reports</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
						Generate check in and evacuation reports.
                    </div>

                    <a :href="route('reports')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                            <div>To reports overview</div>

                            <div class="ml-1 text-red-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <img src="images/icons/callendar.svg" class="h-8">
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Pending appointments</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Send meeting requests to respective hosts
                    </div>

                    <a href="/meetings">
                        <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                            <div>To meetings overview</div>

                            <div class="ml-1 text-red-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <img src="images/icons/user.svg" class="h-8">
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        Users</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Create new user
                    </div>

                	<a :href="route('users')">
                	    <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                	            <div>To user management</div>
                	            <div class="ml-1 text-red-500">
                	                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                	            </div>
                	    </div>
                	</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        props: ['username'],
        components: {
            JetApplicationLogo,
        },
    }
</script>
