<div class='bg-white px-6 py-12 sm:p-12 w-full'>
    <form wire:submit.prevent='submitForm' method="POST" id="contactForm">
        @csrf
        @if ($successMessage)
        <div class="rounded-md bg-green-50 p-4 mt-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm leading-5 font-medium text-green-800">
                        {{ $successMessage }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" wire:click="$set('successMessage', null)"
                            class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                            aria-label="Dismiss">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="">

            <div class="flex flex-col justify-between h-full">
                <x-contact.form-field-input name="surface" label="Powierzchnia w m²" type="text" />
                <x-contact.form-field-input name="size" label="Grubość w cm" type="text" />

                <x-contact.form-field-input name="address" label="Lokalizacja" type="text" />
                <x-contact.form-field-input name="phone" label="Numer telefonu" type="tel" />
                <x-contact.form-field-input name="email" label="Adres email" type="email" />

                <x-contact.form-field-textarea name="content" label="Wiadomość" />

                <p class="text-black text-xs mb-1">Podane informacje będą wykorzystane jedynie do wstępnej wyceny
                    naszych usług.</p>
                <p class="text-black text-xs mb-6"> Ostateczna cena
                    zostanie podana na miejscu, po dokładnym pomiarze i ocenie wymagań klienta.</p>

            </div>


            <div class="flex justify-start lg:justify-end lg:col-span-2">


                <button  active data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback='handle'
                    data-action='submit' type="submit" wire.loading.attr="disabled" type='submit' aria-label="Wyślij"
                    class=' px-8 py-2.5 overflow-hidden relative group cursor-pointer border-2 font-semibold border-secondary-400 text-white bg-secondary-400 uppercase '>

                    <span
                        class='absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-white top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease'></span>
                    <span class='relative text-white transition duration-300 group-hover:text-secondary-400 ease'><svg
                            wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 24 24">
                            <circle class="opacity-40" cx="12" cy="12" r="10" stroke="#000000" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="#fff"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>{{__('global.contact.send')}}</span>
                </button>

            </div>


        </div>
    </form>
</div>
<script src="https://www.google.com/recaptcha/api.js?render={{ env('CAPTCHA_SITE_KEY') }}"></script>
<script>
    function handle(e) {
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ env('CAPTCHA_SITE_KEY') }}', {
                    action: 'submit'
                })
                .then(function(token) {
                    @this.set('captcha', token);
                });
        })
    }
</script>