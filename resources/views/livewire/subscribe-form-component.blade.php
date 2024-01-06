<div class="col-xl-5 col-lg-6">
    <form class="dzSubscribe style-1 row" action="" method="post" wire:submit.prevent="submit">
        <div class="form-group col-12">
            <div class="input-group  ">
                <x-form.input wire:model="username" name="username" class="bg-transparent text-white"
                              placeholder="Ваше имя"/>

            </div>
            @error('username')
                <x-form.alert error="true">{{ $message }}</x-form.alert>
            @enderror
        </div>
        <div class="form-group col-12">
            <div class="input-group  ">
                <x-form.input wire:model="email" name="email" type="email" class="bg-transparent text-white"
                              placeholder="Ваш Email"/>
            </div>

            @error('email')
                <x-form.alert error="true">{{ $message }}</x-form.alert>
            @enderror
        </div>
        <div class="input-group-addon">
            <x-button type="submit" class="btn-primary">
                Subscribe
            </x-button>
        </div>
        <div wire:ignore class="col-12">
            <x-form.alert class="gen mt-3 d-none js_message-notification">Сообщение
                отправлено</x-form.alert>
        </div>
    </form>
</div>
