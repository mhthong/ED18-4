



<div class="flexbox-annotated-section col-12">

    <div class="flexbox-annotated-section-annotation col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
        <div class="annotated-section-title pd-all-20">
            <h2>Gửi Email Kiểm Tra</h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note">Gửi Email kiểm tra cài đặt</p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 bg-ad-form p-3">
        <form class="mt-8 space-y-6 col-12" action="{{ route('compose-email-form') }}" method="POST">
            @csrf
            <div class="containerInput shadow-sm -space-y-px mb-4">
                <div>
                    <label for="emailAddress" class="sr-only">Email Address</label>
                    <input id="emailAddress" name="emailAddress" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email Address">
                </div>
            </div>

            <div class="containerInput shadow-sm -space-y-px mb-4">
                <div>
                    <label for="message" class="sr-only">Message</label>
                    <textarea id="message" name="message" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Message"></textarea>
                </div>
            </div>
            <button type="submit"  style="color: cadetblue;" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium  bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Compose Email</button>
        </form>
    </div>
</div>
