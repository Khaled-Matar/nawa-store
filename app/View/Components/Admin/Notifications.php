<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Notifications extends Component
{
    /**
     * Notifications Collection
     */
    public $notifications;
    public $unread;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = Auth::user();
        $this->notifications = $user->notifications()->limit(5)->get();
        $this->unread = $user->unreadNotifications()->count();
        // $this->notifications = $user->readnotifications;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.notifications');
    }
}
