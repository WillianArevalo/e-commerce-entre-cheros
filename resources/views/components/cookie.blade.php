<section
    class="cookies fixed bottom-16 left-12 z-50 mx-auto hidden max-w-md rounded-2xl border border-zinc-400 bg-white p-4">
    <h2 class="text-lg font-semibold text-secondary">
        Cookies
    </h2>
    <p class="mt-2 text-xs text-zinc-600">
        Hola, este sitio web utiliza cookies esenciales para garantizar su correcto funcionamiento
        Cookies de funcionamiento y seguimiento para comprender cómo interactúa con él. Este último se establecerá solo
        después de consentimiento.
        <a href="#" class="font-medium text-zinc-700 underline transition-colors duration-300 hover:text-blue-600">
            Política de cookies
        </a>.
    </p>
    <p class="mt-3 text-xs text-zinc-600">
        Al cerrar esta configuración modal, se guardará la configuración predeterminada.
    </p>
    <div class="mt-4 grid shrink-0 grid-cols-2 gap-4">
        <x-button-store type="button" typeButton="secondary" text="Preferencias" class="text-xs" />
        <x-button-store type="button" typeButton="primary" text="Aceptar todas" class="text-xs" />
    </div>
    <button class="close-cookies absolute right-0 top-0 m-4">
        <x-icon icon="x" class="h-4 w-4 text-zinc-600" />
    </button>
</section>
