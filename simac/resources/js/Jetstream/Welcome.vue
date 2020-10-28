<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="text-2xl">
				Hello, <span class="text-red-700">{{ $page.user.name }}</span>!
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25">
            <div class="p-6">
                <div class="flex items-center">
                    <img src="images/icons/report.svg" class="h-8">
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Reports</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
						Generate check in and evacuation reports.
                    </div>

                    <a href="/reports">
                        <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                                <div>To reports overview</div>

                                <div class="ml-1 text-red-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <img src="images/icons/callendar.svg" class="h-8">
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Your appointments</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
						Here you can create, see and edit your past, future and pending meetings. 
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
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Add new user</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
						Add new user to the system
                    </div>

                	<a href="/register">
                	    <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
                	            <div>To user creation</div>
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
        components: {
            JetApplicationLogo,
        },
    }
</script>
