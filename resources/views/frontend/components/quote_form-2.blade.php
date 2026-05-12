<form class="quote-form max-w-lg mx-auto bg-[linear-gradient(to_bottom_left,#03354D_70%,#05293A_50%)]
hover:bg-[linear-gradient(to_bottom_left,#05293A_70%,#03354D_50%)] transition-all duration-100 ease-in-out
--bg-std-300 p-16 rounded-2xl outline-white outline-dashed outline-1
outline-offset-[-25px] [color-scheme:dark]">
    <h2 class="text-white text-center text-2xl font-bold uppercase mb-4 border-b-1 border-b-std-100">Get free quote</h2>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="width" id="width" class="text-white block py-2 px-0 w-full text-sm
          text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
            <label for="width" class="text-white absolute text-sm text-body duration-300 transform -translate-y-6
          scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand
          peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
          peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Width</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="height" id="height" class="text-white block py-2 px-0 w-full text-sm
          text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
            <label for="height" class="text-white absolute text-sm text-body duration-300 transform -translate-y-6
          scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand
          peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
          peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Height</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <select name="patch_type" id="patch_type" class="text-white block py-2 px-0 w-full text-sm
                      appearance-none focus:outline-none focus:ring-0 focus:border-brand peer">
                <option value="">Select Patch Type</option>
                <option value="test">test</option>
            </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select name="backing" id="backing" class="text-white block py-2 px-0 w-full text-sm
                      appearance-none focus:outline-none focus:ring-0 focus:border-brand peer">
                <option value="">Select Backing</option>
                <option value="test">test</option>
            </select>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <select name="edges" id="edges" class="text-white block py-2 px-0 w-full text-sm
                      appearance-none focus:outline-none focus:ring-0 focus:border-brand peer">
                <option value="">Select Edges Type</option>
                <option value="test">test</option>
            </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="date" id="date" class="text-white block py-2 px-0 w-full text-sm text-heading
                  bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
            <label for="date" class="text-white absolute text-sm text-body duration-300 transform
                        -translate-y-6
                  scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100
                  peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6
                  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Enter Date</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="qty" id="qty" class="text-white block py-2 px-0 w-full text-sm text-heading
      bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
            <label for="qty" class="text-white absolute text-sm text-body duration-300 transform -translate-y-6
      scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100
      peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6
      rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Quantity</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="full_name" id="full_name" class="text-white block py-2 px-0 w-full text-sm
      text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
            <label for="full_name" class="text-white absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3
      -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100
      peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6
      rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Full Name</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="text-white block
        py-2 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
            <label for="floating_phone" class="text-white absolute text-sm text-body duration-300 transform -translate-y-6 scale-75
        top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100
        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6
        rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Contact number</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="email" id="email" class="text-white block py-2 px-0 w-full text-sm text-heading
        bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
            <label for="email" class="text-white absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3
        -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100
        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6
        rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Contact Eamil</label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <select name="how_did_you_hear" id="how_did_you_hear" class="text-white block py-2 px-0 w-full text-sm
                      focus:outline-none focus:ring-0 focus:border-brand peer">
                <option value="">How did you hear</option>
                <option value="test">test</option>
            </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="file" id="file" class="text-white block py-2 px-0 w-full text-sm text-heading
        bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required/>
        </div>
    </div>
    <div class="relative z-0 w-full mb-5 group mt-2">
        <textarea name="message" id="message" class="text-white block py-2 px-0 w-full text-sm text-heading
        bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0
        focus:border-brand peer" rows="2"></textarea> <label for="floating_email" class="text-white absolute text-sm text-body duration-300 transform -translate-y-6
          scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand
          peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
          peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Message (optional)</label>
    </div>
    <button type="submit" class="text-white bg-gradient-to-br rounded-full from-std to-std-300 w-full uppercase
                            hover:bg-gradient-to-bl  font-medium rounded-base text-sm px-4 py-3 text-center leading-5 outline-white outline-dashed outline-1
                                                                                                                outline-offset-[-5px]">
        Submit Now
    </button>
</form>
