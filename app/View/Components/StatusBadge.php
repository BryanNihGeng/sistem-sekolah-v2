<?php
 
namespace App\View\Components;
 
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
 
class StatusBadge extends Component
{
    public string $status;
    public string $label;
    public string $color;
 
    public function __construct(string $status)
    {
        $this->status = $status;
 
        if ($status === 'Aktif') {
            $this->label = 'Aktif';
            $this->color = 'green';
        } else {
            $this->label = 'Tidak Aktif';
            $this->color = 'red';
        }
    }
 
    public function render(): View|Closure|string
    {
        return view('components.status-badge');
    }
}