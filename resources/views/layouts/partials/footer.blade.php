<div class="" :class="{ 'opacity-0' : contact }">
    <div class="py-10 md:py-24 px-4 lg:px-0 mx-auto max-w-7xl space-y-5 border-b border-gray-300">
        <span class="uppercase font-semibold">7P Marketing</span>
        <h5 class="text-2xl md:text-4xl lg:text-6xl font-bold md:w-4/5 block">Siempre buscamos personas con talento, así que trabajemos juntos</h5>
        <a class="block uppercase text-sm font-semibold" href="">Aplicar Ahora</a>
    </div>
    <div class="py-6 md:py-24 px-4 lg:px-0 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex gap-2">
                <img class="h-9 w-auto" src="{{ asset('images/identity/dark.svg') }}" alt="{{ config('app.name') }}">
                <span class="font-bold text-2xl">Marketing</span>
            </div>
            <div class="space-y-2">
                <h4 class="font-semibold">Ubicación</h4>
                <p>
                    7P Marketing <br>
                    Polonia 26, Quito 170519 <br>
                    Ecuador
                </p>
            </div>
            <div class="space-y-2">
                <h4 class="font-semibold">Contáctanos</h4>
                <p>
                    <a class="block" href="mailto:hola@7p-marketing.com">hola@7p-marketing.com</a>
                    <a class="block" href="https://api.whatsapp.com/send?phone=593983151780&text=Hola," target="_blank">T: +593 98 315 1780</a>
                </p>
            </div>
        </div>
    </div>
    <div class="pb-8 md:py-20 px-4 lg:px-0 max-w-7xl mx-auto" :class="{ 'opacity-0' : contact }">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between text-black text-sm">
            <div class="mb-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="#">Términos & Condiciones</a>
                    <a href="#">Política de Privacidad</a>
                    <a href="#">Protección de Datos</a>
                </div>
            </div>
            <a class="text-center md:text-right" href="#">© 2021 7P Marketing - Todos los derechos reservados.</a>
        </div>
    </div>
</div>
