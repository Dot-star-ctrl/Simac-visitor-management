<template>
    <div class="m-4">
        <div class="pb-4 border-b border-gray-200">
            <h1 class="text-xl lg:text-2xl text-center">Generate visitor reports from</h1>
            <div class="flex p-4 justify-center">
                <h2 class="text-xl m-1 pr-4">Last</h2>
                <select>
                    <option value="">48h</option>
                    <option value="">7 days</option>
                    <option value="">Month</option>
                    <option value="">6 months</option>
                    <option value="">Year</option>
                </select>
            </div>
            <h1 class="p-4 text-xl lg:text-2xl text-center">Or choose manually</h1>
            <div class="lg:flex lg:justify-center">
                <div class="p-2 lg:flex lg:text-xl">
                    <h2 class="lg:pr-4">From</h2>
                    <input type="datetime-local" name="" id="">
                </div>
                <div class="p-2 lg:flex lg:text-xl">
                    <h2 class="lg:pr-4">To</h2>
                    <input type="datetime-local" name="" id="">
                </div>
            </div>
        </div>
        <div class="pt-4 text-center">
            <button class="border border-red-700 bg-red-600 rounded text-white p-2 text-lg lg:text-xl">
                Generate
            </button>
        </div>
    </div>
</template>


