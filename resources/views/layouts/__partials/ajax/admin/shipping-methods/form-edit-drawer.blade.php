  @if ($method)
      <form action="{{ route('admin.sales-strategies.shipping-methods.update', $method->id) }}"
          class="flex flex-col gap-4" method="POST" id="formEditMehtod">
          @csrf
          @method('PUT')
          <div class="w-full">
              <input type="hidden" name="method" value="UPDATE">
              <x-input type="text" name="name" id="name_method" required placeholder="Ingresa el nombre del método"
                  label="Nombre" value="{{ $method->name }}" />
          </div>
          <div class="w-full">
              <x-input type="text" name="time" id="time" required placeholder="3 - 5 días hábiles"
                  label="Tiempo de entrega" value="{{ $method->time }}" />
          </div>
          <div class="w-full">
              <x-input type="textarea" name="description" id="description_method" required
                  placeholder="Ingresa la descripción del método" label="Descripción"
                  value="{{ $method->description }}" />
          </div>
          <div class="w-full">
              <input type="checkbox" value="0" name="is_active" id="is_active_edit"
                  class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600"
                  {{ $method->is_active === 1 ? 'checked' : '' }}>
              <label for="is_active" class="text-sm text-zinc-500 dark:text-zinc-400">Activo</label>
          </div>
          <div class="flex gap-4">
              <div class="flex-1">
                  <x-input type="number" step="0.01" name="min_weight" id="min_weight" required placeholder="KG"
                      icon="weight-scale" label="Peso mínimo" value="{{ $method->min_weight }}" />
              </div>
              <div class="flex-1">
                  <x-input type="number" step="0.01" name="max_weight" id="max_weight" required icon="weight-scale"
                      placeholder="KG" label="Peso máximo" value="{{ $method->max_weight }}" />
              </div>
          </div>
          <div>
              <div class="flex-1">
                  <x-input type="text" name="location" id="location" required icon="location" label="Locación"
                      value="{{ $method->location }}" />
              </div>
          </div>
          <div>
              <div class="flex-1">
                  <x-input type="number" step="0.01" name="cost" id="cost" required icon="dollar"
                      placeholder="0.00" label="Costo" value="{{ $method->cost }}" />
              </div>
          </div>
          <div class="flex items-center justify-center gap-2">
              <x-button type="submit" text="Editar método" icon="edit" typeButton="primary" />
              <x-button type="button" data-drawer="#drawer-edit-method" class="close-drawer" text="Cancelar"
                  typeButton="secondary" icon="cancel" />
          </div>
      </form>
  @endif
