<!-- Search Bar Modal -->
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-11/12 max-w-md p-6 rounded-lg shadow-lg relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 text-2xl font-bold">
            &times;
        </button>

        <h2 class="text-xl font-semibold mb-4 text-center">Search</h2>

        <div class="flex items-center border border-gray-300 rounded overflow-hidden mb-4">
            <span class="px-3 text-gray-500">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" name="query" class="w-full px-3 py-2 focus:outline-none"
                   placeholder="Type to search..." autofocus>
        </div>

        <div class="flex justify-end gap-2">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">
                Close
            </button>
            <button type="submit" form="searchForm" class="px-4 py-2 bg-red-600 text-white rounded">
                Search
            </button>
        </div>
    </div>
</div>
