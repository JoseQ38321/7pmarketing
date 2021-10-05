<div class="py-24 mx-auto max-w-7xl space-y-3 border-b border-gray-600" :class="{ 'opacity-0' : contact }">
    <span class="uppercase font-semibold">7P Marketing</span>
    <h5 class="text-4xl font-semibold w-2/3">Siempre buscamos personas con talento, así que trabajemos juntos</h5>
    <a class="inline-block uppercase text-sm font-semibold" href="">Aplicar Ahora</a>
</div>
<div class="py-24 max-w-7xl mx-auto">
    <div class="max-w-7xl mx-auto grid grid-cols-3">
        <div class="flex gap-2">
            <img class="h-9 w-auto" src="{{ asset('images/identity/dark.svg') }}" alt="{{ config('app.name') }}">
            <span class="font-bold text-2xl">Marketing</span>
        </div>
        <div class="space-y-2">
            <h4 class="font-semibold">Ubicación</h4>
            <p>
                Studio Agensy <br>
                Kristiatik 15th Street, Floot 17 <br>
                Kiev, Ukraine 78692
            </p>
        </div>
        <div class="space-y-2">
            <h4 class="font-semibold">Contáctanos</h4>
            <p>
                hola@7p-marketing.com <br>
                +593 98 294 8086
            </p>
        </div>
    </div>
</div>
<div class="py-20 max-w-7xl mx-auto" :class="{ 'opacity-0' : contact }">
    <div class="flex items-center justify-between text-black text-sm">
        <div>
            <ul class="inline-flex gap-4">
                <li>
                    <a href="#">Términos & Condiciones</a>
                </li>
                <li>
                    <a href="#">Política de Privacidad</a>
                </li>
                <li>
                    <a href="#">Protección de Datos</a>
                </li>
            </ul>
        </div>
        <a href="#">© 2021 7P Marketing - Todos los derechos reservados.</a>
    </div>
</div>
