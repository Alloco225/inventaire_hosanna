<?php


namespace App\Http\Livewire;


trait ModalHandler
{
    public function reloadPage(): void
    {
        $this->dispatchBrowserEvent("reload-page");
    }

    public function closeModal(): void
    {
        $this->dispatchBrowserEvent("close-modal");
    }
}
