<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- component -->
        <div class="fle p-4 w-5/12 mx-auto rounded-md bg-white items-center justify-centerbg-white shadow-md">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="mx-auto w-full max-w-[550px]">
                <form action="{{route('adminInfo.update', $info->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="city" class="mb-3 block text-base font-medium text-[#07074D]">
                            City
                        </label>
                        <input type="text" name="city" id="city" value="{{$info->city}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-3">
                        <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
                            Address
                        </label>
                        <input type="text" name="address" id="address" value="{{$info->address}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="mb-3 block text-base font-medium text-[#07074D]">
                            Phone number
                        </label>
                        <input type="text" name="phone_number" id="phone_number" value="{{$info->phone_number}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Email Address
                        </label>
                        <input type="email" name="email" id="email" value="{{$info->email}}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div>
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-2 px-4 text-base font-semibold text-white outline-none">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
