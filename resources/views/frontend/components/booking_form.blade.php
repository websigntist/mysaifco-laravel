<div class="booking_form bg-gray-50 border border-gray-300 rounded-3xl p-6 md:p-6">
    <h3 class="font-heading italic text-2xl md:text-3xl font-bold mb-6">
        Book this <span class="text-mst">Tour</span>
    </h3>
    <form id="tour-booking-form" class="space-y-4">
        <!-- Date & Time Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Tour Date Card -->
            <div class="border border-gray-300 rounded-xl p-4 flex flex-col justify-between">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/images/icons/3dcalender.svg') }}" alt="date icon">
                    <span class="font-heading font-bold">Tour Date</span>
                </div>
                <!-- Date Picker -->
                <div class="relative flex items-center justify-between mt-2 cursor-pointer booking-date-wrapper">
                    <span id="booking-date-display" class="font-bold text-[16px]">Select Date</span>
                    <input type="date" id="booking-date" name="booking_date" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                    <img src="{{ asset('assets/images/icons/3dcalender.svg') }}" class="pointer-events-none" alt="calendar">
                </div>
            </div>
            <!-- Starting Time Card -->
            <div class="border border-gray-300 rounded-xl p-4 flex flex-col justify-between">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/images/icons/3dclock.svg') }}" alt="time icon">
                    <span class="font-heading font-bold">Starting Time</span>
                </div>
                <!-- Time choices -->
                <div class="flex items-center gap-4 text-xs md:text-sm font-bold mt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="starting_time" value="09:00 AM" class="w-4 h-4 text-mst border-gray-300 focus:ring-mst focus:ring-2 cursor-pointer" checked>
                        <span class="font-bold text-[16px]">09:00 AM</span> </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="starting_time" value="10:00 AM" class="w-4 h-4 text-mst border-gray-300 focus:ring-mst focus:ring-2 cursor-pointer">
                        <span class="font-bold text-[16px]">10:00 AM</span> </label>
                </div>
            </div>
        </div>
        <!-- Tickets Card Box -->
        <div class="border border-gray-300 rounded-xl p-4 md:p-4">
            <div class="flex items-center gap-2 mb-4">
                <img src="{{ asset('assets/images/icons/ticket.svg') }}" alt="tickets">
                <span class="font-heading font-semibold">Tickets</span>
            </div>
            <div class="space-y-4">
                <!-- Adult Row -->
                <div class="flex items-center justify-between">
                    <div class="flex flex-col text-left">
                        <span class="font-bold text-sm md:text-md">Adult (11 - 99 years)</span>
                        <span class="mt-1 font-bold  text-xs md:text-ms">AED<strong class="adult-price-value text-mst font-bold">150</strong> per head</span>
                    </div>
                    <!-- Dropdown select wrapper -->
                    <div class="relative w-25 md:w-64">
                        <select id="adult-count" name="adult_count" class="w-full appearance-none bg-[#F5F5F5]
                                                border-0 rounded-lg px-3 py-3 text-xs md:text-sm font-bold focus:outline-none cursor-pointer">
                            <option value="0">00</option>
                            <option value="1">01</option>
                            <option value="2" selected>02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                        </select>
                        <!-- Dropdown arrow SVG -->
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Child Row -->
                <div class="flex items-center justify-between">
                    <div class="flex flex-col text-left">
                        <span class="font-bold text-sm md:text-md">Child (02 - 10 years)</span>
                        <span class="mt-1 font-bold  text-xs md:text-ms">AED <strong class="adult-price-value text-mst font-bold">150</strong> per head</span>
                    </div>
                    <!-- Dropdown select wrapper -->
                    <div class="relative w-25 md:w-64">
                        <select id="child-count" name="child_count" class="w-full appearance-none bg-[#F5F5F5]
                                                border-0 rounded-lg px-3 py-3 text-xs md:text-sm font-bold focus:outline-none cursor-pointer">
                            <option value="0" selected>00</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Infant Row -->
                <div class="flex items-center justify-between">
                    <div class="flex flex-col text-left">
                        <span class="font-bold text-sm md:text-md">Infant (0 - 01 years)</span>
                        <span class="mt-1 font-bold  text-xs md:text-ms">AED <strong class="adult-price-value text-mst font-bold">0</strong> per head</span>
                    </div>
                    <!-- Dropdown select wrapper -->
                    <div class="relative w-25 md:w-64">
                        <select id="infant-count" name="infant_count" class="w-full appearance-none bg-[#F5F5F5]
                        border-0 rounded-lg px-3 py-3 text-xs md:text-sm font-bold focus:outline-none cursor-pointer">
                            <option value="0" selected>00</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing Summary Bar -->
        <div class="bg-gray-100 rounded-xl px-5 py-4 flex items-center justify-between">
            <span class="font-heading italic text-lg md:text-xl font-bold">Pricing</span>
            <span id="booking-total-price" class="font-heading font-extrabold text-lg md:text-xl">
                                AED 300.00
                            </span>
        </div>
        <!-- Book Now Button -->
        <div class="flex justify-center">
            <button type="submit" class="flex items-center justify-center w-fit text-white text-lg px-8 pt-3 pb-3
            rounded-full mx-auto
                    bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                     hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                     transition duration-300 font-heading italic">
                <span>Book Now</span>
                <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-5 h-5 ms-2 text-white" alt="arrow">
            </button>
        </div>
    </form>
</div>
