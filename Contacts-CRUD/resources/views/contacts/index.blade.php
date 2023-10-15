
@include('partials.header')

<x-nav />
<x-messages />

<header class="max-w-6xl mx-auto">
    <h1 class="text-4xl font-bold text-white dark:text-white text-center">Your Contacts</h1>
</header>

<section class="mt-10 mx-5">
    <div class="relative overflow-x-auto ">
        <table class="w-[65%] mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr class=" border-b dark:bg-gray-800 dark:border-gray-50 text-white">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                            {{ $contact->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $contact->phone_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->company }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->email }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

   

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@include('partials.footer')

