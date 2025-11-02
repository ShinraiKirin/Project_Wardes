<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4 text-white">Admin Dashboard</h1>

        <p class="text-white">Selamat datang Admin!</p>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <x-primary-button class="bg-white text-black hover:bg-gray-200">Logout</x-primary-button>
        </form>
    </div>
</x-app-layout>
