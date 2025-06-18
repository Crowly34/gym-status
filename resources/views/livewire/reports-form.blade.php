<div>
    <flux:modal.trigger name="add-status-report">
            <flux:navlist.item icon="cog-6-tooth" >Reportar un problema</flux:navlist.item>
    </flux:modal.trigger>

    <flux:modal name="add-status-report" class="md:w-96">
        <form wire:submit.prevent="submit" class="space-y-6">
            <div>
                <flux:heading size="lg">Nuevo reporte de estado</flux:heading>
                <flux:text class="mt-2">Informa sobre el estado actual del gym.</flux:text>
            </div>

            <div>
                <flux:label>Tipo de reporte</flux:label>
                <flux:select wire:model="type" required>
                    <flux:select.option value="">Qué estas reportando</flux:select.option>
                    <flux:select.option value="closed_gym">Gym cerrado</flux:select.option>
                    <flux:select.option value="dirty_toilet">Baños sucios</flux:select.option>
                    <flux:select.option value="broken_machine">Máquinas fuera de servicio</flux:select.option>
                    <flux:select.option value="other">Otro</flux:select.option>
                </flux:select>
                <flux:error name="type" />
            </div>

            <div>
                <flux:label>Nombre (opcional)</flux:label>
                <flux:input wire:model="name" placeholder="Tu nombre o apodo" />
                <flux:error name="name" />
            </div>

            <div>
                <flux:label>Descripción (opcional)</flux:label>
                <flux:error name="description" />
                <flux:textarea wire:model="description" placeholder="Agrega detalles (ej. hora, qué máquina, etc)"  rows="10"/>
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Enviar reporte</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
