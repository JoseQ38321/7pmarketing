<x-app-layout>
    <section class="md:max-w-3xl lg:max-w-7xl mx-auto mt-0 md:mt-12 mb-6 md:mb-24 px-4 md:px-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <h1 class="w-full text-gray-800 font-bold text-5xl sm:text-6xl md:text-8xl lg:text-9xl md:leading-150 text-center md:text-left">
            Contáctanos
        </h1>
        <span class="block w-full text-xl md:text-3xl text-center md:text-left">7P Marketing, agencia de marketing digital</span>
    </section>
    <section>
        <iframe src="https://snazzymaps.com/embed/343514" width="100%" height="600px" style="border:none;"></iframe>
    </section>
    <section class="py-10 px-4 lg:px-0 md:py-36 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <h3 class="font-semibold text-xl mb-3 uppercase">Dirección</h3>
                <span class="block">Quito - Ecuador</span>
                 <span>Polonia 26, Quito 170519</span>
            </div>
            <div>
                <h3 class="font-semibold text-xl mb-3 uppercase">Llámanos</h3>
                <span class="block">WhatsApp: 098 765 4321</span>
                <span>Teléfono: 098 765 4321</span>
            </div>
            <div class="md:mt-10">
                <h3 class="font-semibold text-xl mb-3 uppercase">Trabajemos juntos</h3>
                <span class=" block">Nos caracterizamos por trabajar con grandes empresas, ¡Que estás esperando!</span>
                 <a class="underline block" href="mailto:info@7p-marketing.com">info@7p-marketing.com</a>
                 <span class=" block">Para un primer acercamiento <a href="https://docs.google.com/forms/d/e/1FAIpQLSdtcmoSLBWJ0Y_-n5v8toLey9QPnVSZVUEnDGQYJzB1RpvWZA/viewform" class="underline">LLena el siguiente formulario</a></span>
            </div>
        </div>
    </section>
    <section class="py-10 px-4 lg:px-0 md:py-16 max-w-7xl mx-auto">
        <div class="w-full md:w-1/2">
            <h3 class="font-semibold text-xl mb-3 uppercase">Formulario de contacto</h3>
            <form action="">
                <div class="mb-3">
                    <label for="name" class="text-lg">Nombre (Requerido)</label>
                    <input class="mt-2 block w-full py-2 px-4 border border-gray-300 focus:ring-0 focus:border-gray-300" type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="text-lg">Email (Requerido)</label>
                    <input class="mt-2 block w-full py-2 px-4 border border-gray-300 focus:ring-0 focus:border-gray-300" type="email" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="subject" class="text-lg">Asunto</label>
                    <input class="mt-2 block w-full py-2 px-4 border border-gray-300 focus:ring-0 focus:border-gray-300" type="text" name="subject" id="subject">
                </div>
                <div class="mb-3">
                    <label for="message" class="text-lg">Mensaje (Requerido)</label>
                    <textarea class="mt-2 block w-full py-2 px-4 border border-gray-300 focus:ring-0 focus:border-gray-300" name="message" id="message" rows="8"></textarea>
                </div>
                <div>
                    <button class="bg-gray-900 py-4 px-10 uppercase text-white font-semibold text-sm" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
